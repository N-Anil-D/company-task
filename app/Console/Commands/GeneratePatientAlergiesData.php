<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Alergies;

class GeneratePatientAlergiesData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-patient-alergies-data';

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
        $alergiesData = array(
            [
                'patient_id'=>1,
                'name'=>"Gluten",
                'notes'=>"Gluten details"
            ],
            [
                'patient_id'=>2,
                'name'=>"Gluten",
                'notes'=>"Gluten details"
            ],
            [
                'patient_id'=>3,
                'name'=>"Erythromycin",
                'notes'=>""
            ],
            [
                'patient_id'=>4,
                'name'=>"Sulphonamides",
                'notes'=>"Sulphonamides details"
            ],
        );

        foreach($alergiesData as $add){
            Alergies::create($add);
        }
        echo 'Alergies has been added succesfully.';

    }
}
