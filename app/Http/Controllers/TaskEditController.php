<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class TaskEditController extends Controller
{
    public function patient($id){
        $patient = Patient::find($id);
        return response()->json([
            'status'=>200,
            'patient'=>$patient,
        ]);
    }
}
