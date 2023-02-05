<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Faculty;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Grade::with('faculty')->orderBy('id', 'Asc')->paginate(9);

        return view('backend.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        //send faculties to create view of classes
        return view('backend.classes.create', compact('faculties'));
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
            'class_name' => 'required',
            'code' => 'required|unique:grades,code',
            'description' => 'required',
            'faculty_id' => 'required',
            'image' => 'required|image:png,jpg,jpeg'
        ]);
        //method 1

        // $grade= new Grade();
        // $grade->class_name = $request['class_name'];
        // $grade->code = $request['code'];
        // $grade->faculty_id = $request['faculty_id'];
        // $grade->description = $request['description'];

        $image = time() . "class." . $request->file('image')->getClientOriginalExtension();
        //method 2
        $data['image'] =  $request->file('image')->storeAs('uploads/classes', $image);
        Grade::create($data);

        // $grade->save();
        Alert::success('Class created successfully');
        return redirect()->route('classes.index');
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
        $class = Grade::find($id);

        $faculties = Faculty::all();
        return view('backend.classes.edit', compact('faculties','class'));
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
        // return $request;
        $class=Grade::find($id);

        Storage::delete($class->image);

        $request->validate([
            'class_name' => 'required',
            'code' => 'required',
            'description' => 'required',
            'faculty_id' => 'required',
            'image' => 'required|image:png,jpg,jpeg'
        ]);
        //method 1
//in the function update we cannot create object with new keyword
//when we create object the other
        $class->class_name = $request['class_name'];
        $class->code = $request['code'];
        $class->faculty_id = $request['faculty_id'];
        $class->description = $request['description'];
        $image = time() . "classupdated." . $request->file('image')->getClientOriginalExtension();
        $class->image =  $request->file('image')->storeAs('uploads/classes', $image);
        $class->update();


        Alert::success('Class updated successfully');
        return redirect()->route('classes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $class)
    {
        // $class = Faculty::find($id);
        Storage::delete($class->image);

        $class->delete();
        Alert::success('Class deleted successfully');
        return redirect()->route('classes.index');
    }
}
