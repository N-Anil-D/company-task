<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Alergies,Conditions,Kin,Medication,Patient};
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(){

        $patients = Patient::get();

        return view('taskpage',['patients' => $patients]);
    }
}
