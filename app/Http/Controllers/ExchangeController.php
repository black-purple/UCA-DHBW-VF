<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf; 

class Exchangecontroller extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'universite' => 'required|string',
            'student_ids' => 'required|array',
            'student_ids.*' => 'exists:students,id',
        ]);

        $exchange = Exchange::create([
            'date_start' => $request->input('date_start'),
            'date_end' => $request->input('date_end'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'universite' => $request->input('universite'),
        ]);

        $studentIds = $request->input('student_ids');
        $pivotData = [];
        $timestamp = now();

        foreach ($studentIds as $studentId) {
            $pivotData[$studentId] = [
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }

        $exchange->students()->attach($pivotData);

        return redirect()->back()->with('success', 'Exchange added successfully and students associated.');
    }
    public function destroy(Exchange $exchange)
    {
        $exchange->delete();
        return back()->with('success', 'Exchange deleted successfully.');
    }
    public function update(Request $request, Exchange $exchange)
    {
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'universite' => 'required|string',
        ]);
        $exchange->date_start = $request->input('date_start');
        $exchange->date_end = $request->input('date_end');
        $exchange->type = $request->input('type');
        $exchange->description = $request->input('description');
        $exchange->universite = $request->input('universite');
        $exchange->save();
        return redirect()->back()->with('success', 'Exchange updated successfully');
    }
    public function filterByUniversity(Request $request)
    {
        $request->validate([
            'universite' => 'required|string',
        ]);

        // Fetch exchanges for the specified university
        $universite = $request->input('universite');
        $exchangesFiltered = Exchange::where('universite', $universite)->paginate(5);
        if ($request->ajax()) {
            $html = view('front.exchange_students.exchange_students', compact('exchangesFiltered', 'universite'))->render();
            return response()->json(['html' => $html]);
        }
        return view('front.exchange_students.exchange_students', compact('exchangesFiltered', 'universite'));
    }

    public function filterExchangesByYear(Request $request)
    {
        $exchanges = Exchange::all();

        $yearsStart = Exchange::selectRaw('YEAR(date_start) as year')->distinct()->pluck('year');
        $yearsEnd = Exchange::selectRaw('YEAR(date_end) as year')->distinct()->pluck('year');

        $years = $yearsStart->merge($yearsEnd)->unique()->sort();
        $filteredExchanges = null;
        $year = $request->input('year');
        if ($year) {
            $filteredExchanges = Exchange::whereYear('date_start', $year)
                ->orWhereYear('date_end', $year)
                ->paginate(3);
        }
        // dd($request->all(), $request->query(), $request->input('year'));
        if ($request->ajax()) {
            $html = view('front.exchange_students.exchange_students', compact('exchanges', 'years', 'filteredExchanges', 'year'))->render();
            return response()->json(['html' => $html]);
        }
        return view('front.exchange_students.exchange_students', compact('exchanges', 'years', 'filteredExchanges', 'year'));
    }

    public function showExchangeForm($exchangeId)
    {
        $exchange = Exchange::find($exchangeId);
        $students = Student::all();
        $selectedStudents = $exchange->students->pluck('id')->toArray();

        dd(compact('students', 'exchange', 'selectedStudents'));
        return view('back.exchanges', compact('students', 'exchange', 'selectedStudents'));
    }
    public function downloadPDF($id)
    {
        // Récupérer l'exchange avec les étudiants associés
        $exchange = Exchange::with('students')->findOrFail($id);

        // Charger la vue PDF et y passer les données
        $pdf = Pdf::loadView('pdf.exchange', compact('exchange'));

        // Télécharger le fichier PDF
        return $pdf->download('exchange_' . $exchange->id . '.pdf');
    }

    public function viewMore(Request $request)
    {
        // Validate the exchangeId parameter
        $request->validate([
            'exchangeId' => 'required|integer|exists:exchanges,id',
        ]);

        // Get the exchangeId from the query string
        $exchangeId = $request->query('exchangeId');

        // Retrieve the exchange information using the ID
        $exchange = Exchange::findOrFail($exchangeId);

        // Retrieve the students associated with the exchange
        $students = $exchange->students;  // This gets the related students via the many-to-many relationship

        // Return a view with exchange and student information
        return view('front.exchange_students.view_more', [
            'exchange' => $exchange,
            'students' => $students,  // Pass the students to the view
        ]);
    }


    public function showAllExchangesWithStudents()
    {
        $exchanges = Exchange::with('students')->get();

        return view('front.exchange_students.all_exchanges', compact('exchanges'));
    }








}
