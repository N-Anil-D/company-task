<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kin extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'id_card',
        'name',
        'surname',
        'contact_number_1',
        'contact_number_2',
    ];

}
