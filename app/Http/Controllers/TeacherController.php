<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::with('faculty')->orderBy('id', 'Desc')->paginate(9);
        return view('backend.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('backend.teachers.create', compact('faculties'));
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
            'name' => 'required|max:50',
            'email' => 'email|required',
            'academic_post' => 'required',
            'image' => 'sometimes|image:jpg,png,jpeg|required',
            'teacher_id' => 'required|unique:teachers,teacher_id',
            'contact_number' => 'required|numeric',
            'faculty_id' => 'required',
            'qualification' => 'required'

        ]);
        $image = time() . "$request->name." . $request->file('image')->getClientOriginalExtension();
        //method 2
        $data['image'] =  $request->file('image')->storeAs('uploads/teachers', $image);


        Teacher::create($data);

        // $grade->save();
        Alert::success('Teacher created successfully');
        return redirect()->route('teachers.index');
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
        $teacher = Teacher::find($id);
        $faculties = Faculty::all();
        return view('backend.teachers.edit', compact('faculties', 'teacher'));
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
        $teacher = Teacher::find($id);

        Storage::delete($teacher->image);
        $data = $request->validate([
            'name' => 'required|max:50',
            'email' => 'email|required',
            'academic_post' => 'required',
            'image' => 'sometimes|image:jpg,png,jpeg|required',
            'teacher_id' => 'required|exists:teachers,teacher_id',
            'contact_number' => 'required|numeric',
            'faculty_id' => 'required',
            'qualification' => 'required'

        ]);
        if ($request->hasFile('image')) {


            $image = time() . "updated.$request->name." . $request->file('image')->getClientOriginalExtension();
            //method 2
            $data['image'] =  $request->file('image')->storeAs('uploads/teachers', $image);
        }
        $teacher->update($data);
        Alert::success('Teacher updated successfully');
        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::Find($id);
        Storage::delete($teacher->image);
        $teacher->delete();
        Alert::success('Teacher Deleted Successfully.');
        return redirect()->route('teachers.index');
    }
}
