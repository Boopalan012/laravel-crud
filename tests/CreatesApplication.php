<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
/*<!-- //$students->links() -->
    <!-- <form action="{{route('students.query',$query ?? '' )}}">
    <input type="search" name="query">
    <input type="submit">
   </form> -->*/

   /* 
    //index or view all method
    public function index(Request $request)
    {
        //creating object
        //$students = students::all();
        $query = $request->input('query');
        if ($query == '') {
            # code...
            // $students=students::paginate(10);
            $students = students::all();
        } else {
            # code...
            $students = students::where('name', 'like', '%' . $query . '%')->get();
        }


        return view('index', ['students' => $students]);
    }
    //*

