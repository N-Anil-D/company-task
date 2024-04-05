<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Medication;

class GeneratePatientMedicationsData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-patient-medications-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $medicationData = array(
            [
                'patient_id'=>1,
                'name'=>"Amlodipine 5mg Tab",
                'notes'=>"",
                'start_date'=>"2014-06-04 00:00:00",
                'end_date'=>null
            ],
            [
                'patient_id'=>1,
                'name'=>"Diazepam",
                'notes'=>"",
                'start_date'=>"2019-06-04 00:00:00",
                'end_date'=>"2019-08-04 00:00:00"
            ],
            [
                'patient_id'=>2,
                'name'=>"Amlodipine 5mg Tab",
                'notes'=>"",
                'start_date'=>"2014-06-04 00:00:00",
                'end_date'=>null
            ],
            [
                'patient_id'=>3,
                'name'=>"Amlodipine 5mg Tab",
                'notes'=>"",
                'start_date'=>"2019-06-04 00:00:00",
                'end_date'=>"2020-06-04 00:00:00"
            ],
            [
                'patient_id'=>4,
                'name'=>"Amlodipine 5mg Tab",
                'notes'=>"",
                'start_date'=>"2019-06-04 00:00:00",
                'end_date'=>"2020-06-04 00:00:00"
            ],
        );

        foreach($medicationData as $add){
            Medication::create($add);
        }
        echo 'Medications has been added succesfully.';

    }
}
