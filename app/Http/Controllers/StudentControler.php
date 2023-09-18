<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class StudentControler extends Controller
{
    public function index(){
        return Inertia::render('student/index',[
            'student'=> student::all()->map(function($student){
                return[
                    'id'=>$student->id,
                    'name'=>$student->name,
                    'age'=>$student->age,
                    'status'=>$student->status,
                    'image'=>asset('storage/'. $student->image)


                ];
            })
        ]);
    }

    public function register(){
        return Inertia::render('student/register');
    }
    public function back(){
        return Inertia::render('student/index');
    }

    public function store(Request $request){
        $image=Request::file('image')->store('student','public');
        Student::create([
            'name'=>$request->name,
            'age'=>$request->age,
            'status'=>$request->status,
            'image'=>$request->image
            

        ]);

        return Redirect::route('student.index');

    }

    public function edit(student $name,$age,$status) {
        return Inertia::render('student/edit',[
            'name' => $name,
            'image' => asset('storage/'. $name->image),
            'age' => $age,
            'status' => $status


        ]);
    }

    public function update(Student $name){

        $image = $name->image;
        if(Request::file('image')){
            Storage::delete('public/'.$name->image);
            $image = Request::file('image')->store('students','public');
        }
        $name->update([
            'name'=>Request::input('name'),
            'image'=> $image,
            'age'=>Request::input('age'),
            'status'=>Request::input('status'),

        ]);

        return Redirect::route('student.index');

    }

    public function distroy(Student $name,$age,$status){
        Storage::delete('public/'.$name->image);
        $name->delete();
        $age->delete();
        $status->delete();

    }

}
