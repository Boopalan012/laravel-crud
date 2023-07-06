<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Providers\modelserviceprovider;
use App\Providers\studentsserviceprovider;
use Illuminate\Http\Request;

class studentscontroller extends Controller
{
    
    //index or view all method
    public function index(Request $request)
    {
        //creating object
        //$students = students::all();


        //creating object
        //$students = students::all();
        // $query = $request->input('query');
        // if ($query == '') {
        # code...
        // $students=students::paginate(10);
        //   
        // $students=app(students::class)->all();
        // } else {
        //     # code...
        //     $students = students::where('name', 'like', '%' . $query . '%')->get();
        $students = students::all();

        return view('index', ['students' => $students]);
    }

    //


    public function create()
    {
        //
    }

    //insert method forr add student
    public function store(Request $request)
    {
        //validation
        $validated = $request->validate([
            'name' => ['required', 'string', 'regex:/^[a-zA-Z]+$/'],
            'email' => 'required|string|email|max:30|unique:students,email',
            'password' => ['required', 'string', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'],
            'phonenumber' => ['required', 'regex:/^[0-9]{10}$/', 'unique:students,phonenumber'],
            'city' => 'required|string'
        ]);
        //storing
        $students = app(students::class);
        $students->name = $request->get('name');
        $students->password = $request->get('password');
        $students->email = $request->get('email');
        $students->phonenumber = $request->get('phonenumber');
        $students->city = $request->get('city');
        $students->save();
        return redirect()->route('students.index');
    }

    public function show($id)
    {
        //
    }

    //update method came with id and return with full object
    public function edit($id)
    {
        //
        $students = app(students::class)::find($id);
        return view('create', ['students' => $students]);
    }

    // update method 
    public function update(Request $request, $id)
    {
        //validating
        $validate = $request->validate([
            'name' => ['required', 'string', 'regex:/^[a-zA-Z]+$/'],
            'email' => 'required|string|email|max:30|',
            'password' => ['required', 'string', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'],
            'city' => 'required|string',
            'phonenumber' => ['required', 'regex:/^[0-9]{10}$/'],
        ]);
        //updating
        $students = app(students::class)::find($id);
        $students->name = $request->get('name');
        $students->email = $request->get('email');
        $students->password = $request->get('password');
        $students->phonenumber = $request->get('phonenumber');
        $students->city = $request->get('city');
        $students->save();
        return redirect()->route('students.index');
    }
    //delete method
    public function destroy($id)
    { {
            $students = app(students::class)::find($id);
            $students->delete();
            $messege = "student deleted";
            return redirect()->route('students.index');
        }
    }
}
