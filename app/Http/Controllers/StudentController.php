<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('id', 'Desc')->paginate(9);
        return view('backend.students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        $classes = Grade::all();
        return view('backend.students.create', compact('faculties', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'student_name' => 'required',
            'student_id' => 'required|regex:/^\S*$/u|unique:students,student_id',
            'email' => 'email|required|regex:/^\S*$/u',
            'image' => 'sometimes|image:png,jpg,jpeg',
            'roll_number' => 'required|regex:/^\S*$/u|unique:students,roll_number',
            'reg_number' => 'required|unique:students,roll_number|regex:/^\S*$/u',
            'faculty_id' => 'required',
            'class_id' => 'required',
            'dob' => 'required',
            'contact_number' => 'required',
            'parents_email' => 'nullable|email|regex:/^\S*$/u',
            'parents_contact_number' => 'regex:/^\S*$/u|required',
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'mothers_occupation' => 'nullable',
            'fathers_occupation' => 'nullable',
            'gender' => 'required',
            'province' => 'required',
            'district' => 'required',
            'local_area' => 'required',
            'address' => 'required'
        ]);
        // return $data;
        if ($request->hasFile('image')) {
            $image = time() . "$request->student_name." . $request->file('image')->getClientOriginalExtension();
            $data['image'] =  $request->file('image')->storeAs('uploads/students', $image);
        }
        else{

        // Alert::warning('Please upload image');
        return redirect()->back()->withInput();
        }
        Student::create($data);
        Alert::success('Student created successfully.');
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $classes = Grade::all();
        $faculties = Faculty::all();
        return view('backend.students.edit', compact('student', 'classes', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $data = $request->validate([
            'student_name' => 'required',
            'student_id' => 'required|regex:/^\S*$/u|exists:students,student_id',
            'email' => 'email|required|regex:/^\S*$/u',
            'image' => 'image:png,jpg,jpeg|required',
            'roll_number' => 'required|regex:/^\S*$/u|exists:students,roll_number',
            'reg_number' => 'required|exists:students,roll_number|regex:/^\S*$/u',
            'faculty_id' => 'required',
            'class_id' => 'required',
            'dob' => 'required',
            'contact_number' => 'required',
            'parents_email' => 'nullable|email|regex:/^\S*$/u',
            'parents_contact_number' => 'regex:/^\S*$/u|required',
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'mothers_occupation' => 'nullable',
            'fathers_occupation' => 'nullable',
            'gender' => 'required',
            'province' => 'required',
            'district' => 'required',
            'local_area' => 'required',
            'address' => 'required'
        ]);
        // return $data;

        if ($request->hasFile('image')) {
            Storage::delete($student->image);
            $image = time() . "upStudentimage." . $request->file('image')->getClientOriginalExtension();
            $data[$image] = $request->file('image')->storeAs('uploads/students', $image);
        }
        $student->update($data);
        Alert::success('Student updated successfully.');
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        Storage::delete($student->image);
        $student->delete();
        Alert::success('Student deleted Successfully.');
        return redirect()->route('students.index');
    }
}
