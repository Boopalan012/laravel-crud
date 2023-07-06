<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Providers\DatabaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class studentsapicontroller extends Controller
{

    protected $databaseservice;

    //constructor for database class
    public function __construct(DatabaseService $databaseService)
    {
        $this->databaseservice = $databaseService;
    }

    //show all students or get 
    public function index()
    {
        $students = $this->databaseservice->showAllStudents();
        return response()->json(["student"=>$students]);
    }

    //insert students
    public function store(Request $request)
    {
        //validating
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'regex:/^[a-zA-Z]+$/'],
            'email' => 'required|string|email|max:30|unique:students,email',
            'password' => ['required', 'string', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'],
            'phonenumber' => ['required', 'regex:/^[0-9]{10}$/', 'unique:students,phonenumber'],
            'city' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['message=>validation error', 'error' => $validator->errors(), 422]);
        }
        //storing
        $students = $this->databaseservice->insertStudents($request);
        return response()->json(["message=> Student details added", $students, 200]);
    }
    //show by id 
    public function show($id)
    {
        //
        $students = $this->databaseservice->showById($id);
        return response()->json($students, 200);
    }
    //update
    public function update(Request $request, $id)
    {

        //validation
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'regex:/^[a-zA-Z]+$/'],
            'email' => 'required|string|email|max:30|',
            'password' => ['required', 'string', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'],
            'city' => 'required|string',
            'phonenumber' => ['required', 'regex:/^[0-9]{10}$/'],
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 422]);
        }
        //
        $students = $this->databaseservice->updateStudentById($id, $request);
        return response()->json(['message=>student detail updated succesfully', $students, 200]);
    }
    //delete 
    public function destroy($id)
    {
        $students = $this->databaseservice->deleteStudentsById($id);
        return response()->json(['message=>student detail deleted succesfully', $students, 200]);
    }
    //storing address
    public function storeAddress(Request $request, $id)
    {
        $this->databaseservice->insertAddressByStudentId($request, $id);
        return response()->json('message=> address saved', 200);
    }
    //view all address
        public function viewalladdress(){
        $data = $this->databaseservice->showAllAdd();
        return response()->json($data);

    }

    //deleting address
    public function deleteStudentAddressById($id){
        $address=$this->databaseservice->deleteStudentAddressById($id);
        return response()->json(['message=>address deleted',$address,200]);
    }

    //updating address
    public function updateStudentAddressById($id,Request $request){
         //
         $address = $this->databaseservice->updateAddressById($id, $request);
         return response()->json(['message=>address detail updated succesfully', $address, 200]);

    }
}
