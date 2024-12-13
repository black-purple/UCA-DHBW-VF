<?php

namespace App\Http\Controllers;
// App\Http\Controllers\YourController.php

use App\Models\Exchange;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Exchangecontroller extends Controller
{
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'date_start' => 'required|date',
    //         'date_end' => 'required|date',
    //         'type' => 'required|string|max:255',
    //         'description' => 'required|string',
    //     ]);
    //     $exchange = new Exchange();
    //     $exchange->date_start=$request->input('date_start');
    //     $exchange->date_end=$request->input('date_end');
    //     $exchange->type=$request->input('type');
    //     $exchange->description=$request->input('description');
    //     $exchange->save();
    //     return redirect()->back()->with('success', 'Exchange added successfully');
    // }


    public function store(Request $request)
    {
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'universite' => 'required|string',
            'student_ids' => 'required|array', // Liste des IDs d'étudiants
            'student_ids.*' => 'exists:students,id', // Vérifie l'existence des étudiants
        ]);

        // Création de l'Exchange
        $exchange = Exchange::create([
            'date_start' => $request->input('date_start'),
            'date_end' => $request->input('date_end'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'universite' => $request->input('universite')
        ]);

        // Préparer les données pour la table pivot
        $studentIds = $request->input('student_ids');
        $pivotData = [];
        $timestamp = now();

        foreach ($studentIds as $studentId) {
            $pivotData[$studentId] = [
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }

        // Associer les étudiants à l'Exchange avec les timestamps
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
        $exchange->date_start=$request->input('date_start');
        $exchange->date_end=$request->input('date_end');
        $exchange->type=$request->input('type');
        $exchange->description=$request->input('description');
        $exchange->universite=$request->input('universite');
        $exchange->save();
        return redirect()->back()->with('success', 'Exchange updated successfully');
    }


    public function filterByUniversity(Request $request)
    {
        $request->validate([
            'universite' => 'required|string', // Validation de l'université
        ]);

        // Récupérer les échanges correspondant à l'université donnée
        $exchanges = Exchange::where('universite', $request->input('universite'))->get();

        return view('front.exchange_students.exchange_students', compact('exchanges')); // Vue pour afficher les résultats
    }


    public function filterExchangesByYear(Request $request)
    {
        // Récupérer tous les échanges
        $exchanges = Exchange::all();

        // Obtenir les années uniques des colonnes `date_start` et `date_end`
        $yearsStart = Exchange::selectRaw('YEAR(date_start) as year')->distinct()->pluck('year');
        $yearsEnd = Exchange::selectRaw('YEAR(date_end) as year')->distinct()->pluck('year');

        // Fusionner et trier les années uniques
        $years = $yearsStart->merge($yearsEnd)->unique()->sort();

        // Initialiser les échanges filtrés
        $filteredExchanges = null;
        $year = $request->input('year');

        // Filtrer si une année est spécifiée
        if ($year) {
            $filteredExchanges = Exchange::whereYear('date_start', $year)
                ->orWhereYear('date_end', $year)
                ->paginate(3);
        }

        // Retourner une réponse JSON pour les requêtes AJAX
        if ($request->ajax()) {
            $html = view('front.exchanges.home_exchanges', compact('exchanges', 'years', 'filteredExchanges', 'year'))->render();
            return response()->json(['html' => $html]);
        }

        // Passer les données à la vue
        return view('front.exchanges.home_exchanges', compact('exchanges', 'years', 'filteredExchanges', 'year'));
    }

}
