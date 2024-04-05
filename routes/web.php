<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{TaskController,TaskEditController};

Route::get('/',[TaskController::class,'index'])->name('index');

// Route::get('edit-patient-id/{id}',[TaskEditController::class,'patient'])->name('edit.patient.id');
