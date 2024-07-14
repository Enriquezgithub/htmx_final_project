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
        // dd('gana');
        $stud = Student::find($id);
        // dd($stud);

        return view('template._single-student-list', ['stud' => $stud]);
    }
}
