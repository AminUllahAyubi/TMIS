<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    // student model related function
    public function student(){
        $students=Student::all();
        return view('admin.admin_student.student',compact('students'));
    }
    public function addStudent(Request $request){
            $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|max:80|unique:students,email',
        ]);
        Student::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email
        ]);
        return redirect()->route('admin.student')->with('success','succesfully added');
    }
    public function deleteStudent($id){
        Student::where('id',$id)->delete();
        return redirect()->route('admin.student')->with('delete','successfully removed');
    }

}
