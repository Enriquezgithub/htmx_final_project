<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $stud = Student::orderBy('id');
        return view('template._student-list', compact('stud'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'address' => 'required'
        ]);


        $stud = Student::create($request->all());

        return view('template._student-list', compact('stud'));
    }

    public function find($id)
    {

        $stud = Student::find($id);


        return view('template._single-student-list', ['stud' => $stud]);
    }

    public function show($id)
    {
        $stud = Student::find($id);
        $acc = $stud->accounts;

        // dd($stud);
        return view('student.show', compact('stud', 'acc'));
    }

    public function edit($id)
    {
        $stud = Student::find($id);
        // dd($stud);

        return view('student.edit', compact('stud'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'address' => 'required|string|max:255',
        ]);

        $stud = Student::findOrFail($id);

        // dd($stud);

        $stud->first_name = $request->first_name;
        $stud->last_name = $request->last_name;
        $stud->birth_date = $request->birth_date;
        $stud->address = $request->address;

        $stud->save();

        $stud = Student::orderBy('id');

        return view('template._student-list', compact('stud'));
    }
}
