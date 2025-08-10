<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboard_controller extends Controller
{
    //

    public function dashboard(){
        return view('admin.index');
    }

}
