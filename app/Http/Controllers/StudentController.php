<?php

// App\Http\Controllers\YourController.php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'nationnality' => 'required|string|max:255',
            'university' => 'required|string|in:UCA,DHBW',
            'email_student' => 'required|email|max:255|unique:students,email_student',
            'date_birth' => 'required|date',
            'phone_number' => 'required|string|max:255',
            'exchanges_id' => 'nullable|numeric',
            'internship_id' => 'nullable|numeric',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);        
        $photo = $request->file('photo');
        $filename = time() . '_' . $photo->getClientOriginalName();
        $photo->storeAs('public/students/', $filename);
        $student = new Student();
        $student->firstname = $request->input('firstname');
        $student->lastname = $request->input('lastname');
        $student->nationnality = $request->input('nationnality');
        $student->university = $request->input('university');
        $student->date_birth = $request->input('date_birth');
        $student->email_student = $request->input('email_student');
        $student->phone_number = $request->input('phone_number');
        $student->internship_id = $request->input('internship_id');
        $student->exchanges_id = $request->input('exchanges_id');
        $student->photo = $filename;
        $student->save();
        return redirect()->back()->with('success', 'student added successfully');
    }


    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with('success', 'Student deleted successfully.');
    }
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'nationnality' => 'required|string|max:255',
            'email_student' => 'required|email|max:255|unique:students,email_student,' . $student->id,
            'phone_number' => 'required|string|max:255',
            'date_birth' => 'required|date',
            'exchanges_id' => 'nullable|numeric',
            'internship_id' => 'nullable|numeric',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        // Update the student information
        $student->firstname = $request->input('firstname');
        $student->lastname = $request->input('lastname');
        $student->nationnality = $request->input('nationnality');
        $student->email_student = $request->input('email_student');
        $student->phone_number = $request->input('phone_number');
        $student->date_birth = $request->input('date_birth');
        $student->exchanges_id = $request->input('exchanges_id');
        $student->internship_id = $request->input('internship_id');

        // Check if a new photo is present in the request
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('public/students/', $filename);
            $student->photo = $filename;
        }

        $student->save();

        return redirect()->back()->with('success', 'Student information updated successfully');
    }
    public function filterStudents(Request $request)
    {
        // Get all students
        $students = Student::all();

        // Get unique universities
        $universities = Student::select('university')->distinct()->pluck('university');

        // If the university parameter is provided, filter students
        $university = $request->input('university');
        $filteredStudents = null;

        if ($university) {
            $filteredStudents = Student::where('university', $university)->get();
        }

        // Return a JSON response for AJAX requests
        if ($request->ajax()) {
            $html = view('front.exchange_students.students_profiles', compact('students', 'universities', 'filteredStudents', 'university'))->render();
            return response()->json(['html' => $html]);
        }

        // For non-AJAX requests, render the view as usual
        return view('front.exchange_students.students_profiles', compact('students', 'universities', 'filteredStudents', 'university'));
    }
}