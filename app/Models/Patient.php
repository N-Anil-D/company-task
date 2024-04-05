<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory,SoftDeletes;
    const unscripted = 'Belirtilmemiş';
    protected $fillable = [
        'id_card',
        'gender',
        'name',
        'surname',
        'date_of_birth',
        'address',
        'postcode',
        'contact_number_1',
        'contact_number_2',
    ];

    public function getGender()
    {
        $status = self::unscripted;

        switch ($this->status) {
            case 0: $status = 'Erkek'; break;
            case 1: $status = 'Kadın'; break;
        }

        return $status;
    }

    public function patientKins()
    {
        return $this->hasMany(Kin::class, 'patient_id', 'id');
    }
    public function patientAlergies()
    {
        return $this->hasMany(Alergies::class, 'patient_id', 'id');
    }
    public function patientConditions()
    {
        return $this->hasMany(Conditions::class, 'patient_id', 'id');
    }
    public function patientMedications()
    {
        return $this->hasMany(Medication::class, 'patient_id', 'id');
    }
}
