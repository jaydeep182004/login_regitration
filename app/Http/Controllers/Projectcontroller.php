<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class Projectcontroller extends Controller
{
    public function form(){
        return view('project/form');
    }

    public function formregister(request $request){
        $data = new Student();
        $data->fname=$request['first-name'];
        $data->lname=$request['last-name'];
        $data->dob=$request['dob'];
        $data->email=$request['email'];
        $data->mobile=$request['mobile'];
        $data->gender=$request['gender'];
        $data->stander=$request['std'];
        $data->address=$request['address'];
        $data->city=$request['city'];
        $data->board=$request['board'];
        $data->percentage=$request['percentage'];
        $data->YEAR=$request['year'];
        $data->save();
        return redirect('showtable');

        
    }

    public function showtable(request $request){
        $std = $request->input('std', ''); // Get the value of 'std' from the request
        $gender = $request->input('gender', ''); // Get the value of 'gender' from the request
    
        $query = Student::query();
    
        if ($std != "") {
            $query->where('stander', 'LIKE', "%$std");
        }
    
        if ($gender != "") {
            $query->where('gender', $gender);
        }
    
        $data = $query->get();
        

        return view('project.show', compact('data', 'std', 'gender'));
    }

    public function delete($id) {
        Student::destroy($id);
        return back();
    }
    
    public function editdata($id) {
        $data = Student::find($id);
        return view('project.form', compact('data'));
    }

    public function update(request $request,$id){
        $data = Student::find($id);
        $data->fname=$request['first-name'];
        $data->lname=$request['last-name'];
        $data->dob=$request['dob'];
        $data->email=$request['email'];
        $data->mobile=$request['mobile'];
        $data->gender=$request['gender'];
        $data->stander=$request['std'];
        $data->address=$request['address'];
        $data->city=$request['city'];
        $data->board=$request['board'];
        $data->percentage=$request['percentage'];
        $data->YEAR=$request['year'];
        $data->save();

        return redirect('showtable');
    }
    // result coding
    
}

