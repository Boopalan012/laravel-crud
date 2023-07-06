<?php

namespace App\Providers;

use App\Models\address;
use App\Models\students;
use Illuminate\Support\Facades\DB;

class DatabaseService
{
    //show student-
    public function showAllStudents()
    {
        // $students = new students();
        //     $students = DB::table('students')
        //     ->leftJoin('address', 'students.id', '=', 'address.id')
        //     ->get([
        //         'students.id', 'students.name', 'students.email', 'students.password',
        //         'address.doorno', 'address.street', 'address.district', 'address.state'
        //]);
        $students=students::with('address')->get();
        return $students;
    }

    //insert student
    public function insertStudents($request)
    {
        $students = new students();
        $students->name = $request->get('name');
        $students->password = $request->get('password');
        $students->email = $request->get('email');
        $students->phonenumber = $request->get('phonenumber');
        $students->city = $request->get('city');
        $students->save();
        return $students;
    }

    //show one student by id
    public function showById($id)
    {
        $students = new students();
        $students = $students->find($id);
        return $students;
    }

    //delete student by id
    public function deleteStudentsById($id)
    {
        $students = new students();
        $students = $students->find($id);
        $students->delete();
        return $students;
    }
    //update student by id
    public function updateStudentById($id, $request)
    {
        $students = new students();
        $students = $students->find($id);
        $students->name = $request->get('name');
        $students->password = $request->get('password');
        $students->email = $request->get('email');
        $students->phonenumber = $request->get('phonenumber');
        $students->city = $request->get('city');
        $students->save();
        return $students;
    }

    //insert student address
    public function insertAddressByStudentId($request, $id)
    {
        $address = new address();
        $address->id = $id;
        $address->doorno = $request->get('doorno');
        $address->street = $request->get('street');
        $address->district = $request->get('district');
        $address->state = $request->get('state');
        $address->save();
        return $address;
    }

    //show all address
    public function showAllAdd()
    {
        $address = new address();
        return $address->all();
    }

    //delete student address
    public function deleteStudentAddressById($id)
    {
        $address = new address();
        $address = $address->find($id);
        $address->delete();
        return $address;
    }

    //update student address
    public function updateAddressById($id, $request)
    {
        $address = new address();
        $address = $address->find($id);
        $address->doorno = $request->get('doorno');
        $address->street = $request->get('street');
        $address->district = $request->get('district');
        $address->state = $request->get('state');
        $address->save();
        return $address;
    }
}
