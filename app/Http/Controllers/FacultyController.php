<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::orderBy('id', 'Desc')->paginate(9);
        return view('backend.faculties.index', compact('faculties'));
    }
    public function create()
    {
        return view('backend.faculties.create');
    }
    public function save(Request $request)
    {
        $request->validate([
            'faculty_name' => 'required|unique:faculties,faculty_name',
            'code' => 'required|unique:faculties,code',
            'description' => 'required',
            'image' => 'required|image:png,jpeg,jpg'
        ]);

        $faculty = new Faculty();
        $faculty->faculty_name = $request['faculty_name'];
        $faculty->code = $request['code'];
        $faculty->description = $request['description'];
        $image = time() . "faculty." . $request->file('image')->getClientOriginalExtension();
        $faculty->image =  $request->file('image')->storeAs('uploads/faculties', $image);

        $faculty->save();
        Alert::success('Faculty created successfully');
        return redirect()->route('faculty.index');
    }
    public function edit(Request $request, $id)
    {
        $faculty = Faculty::find($id);
        return view('backend.faculties.edit', compact('faculty'));
    }
    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'faculty_name' => 'required',
            'code' => 'required',
            'description' => 'required',
            'image' => 'required|image:png,jpeg,jpg'
        ]);
        $faculty = Faculty::find($id);
        $faculty->faculty_name = $request['faculty_name'];
        $faculty->code  = $request['code'];
        $faculty->description  = $request['description'];


        if ($request->hasFile('image')) {
            if (Storage::exists($faculty->image)) {
                Storage::delete($faculty->image);
            } else {
                Alert::warning('image cannot delete');
                return redirect()->back();
            }
            $image = time() . "updatedfaculty." . $request->file('image')->getClientOriginalExtension();
            $faculty->image =  $request->file('image')->storeAs('uploads/faculties', $image);
        }
        $faculty->update();
        Alert::success('Faculty updated successfully');
        return redirect()->route('faculty.index');
    }
    public function delete(Faculty $faculty)
    // public function delete($id)
    //we can use it delete id wise
    {
        // $faculty = Faculty::find($id);
        Storage::delete($faculty->image);
        $faculty->delete();
        Alert::success('Faculty deleted successfully');
        return redirect()->route('faculty.index');
    }
    
}
