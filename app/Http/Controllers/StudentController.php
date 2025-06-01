<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $students = StudentModel::all();
        // return view('Students.index')->with('students',$students);
        return view('Students.index');
    }
    public function showData()
    {
        $students = StudentModel::all();
        return view('Students.read')->with('students',$students);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:500',
        'rollno' => 'required|integer',
        'dob' => 'required|date|before:today',
        'expiry_date' => 'required|date|after:dob',
    ]);


        //
        // dd($request->all());
       $image = $request->photo->store('StudentsImg');
       StudentModel::create([
   
        'photo' => $image,
        'name' => $request->name,
        'address' => $request->address,
        'rollno' => $request->rollno,
        'dob' => $request->dob,
        'expiry_date' => $request->expiry_date,

       ]);
       session()->flash('success','data inserted successfully');
       return redirect('/index');
    }
    public function show(StudentModel $studentModel)
    {
        //dd($studentModel->id);
        return view('students.show')->with('student',$studentModel);
    }    
    public function destroy(StudentModel $studentModel)
    {
       Storage::delete($studentModel->photo);
       $studentModel->delete();
       session()->flash('delete','User removed successfully');
       return redirect('/index');
        
    }

    /**
     * Display the specified resource.
     */
    public function read(string $id)
    {
        //
        return view('Students.read');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

}
