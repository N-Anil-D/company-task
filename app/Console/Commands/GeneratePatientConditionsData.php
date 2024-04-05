<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Conditions;

class GeneratePatientConditionsData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-patient-conditions-data';

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
        $conditionsData = array(
            [
                'patient_id'=>1,
                'name'=>"Allergic cough",
                'notes'=>"Cough details"
            ],
            [
                'patient_id'=>2,
                'name'=>"Allergic cough",
                'notes'=>"Cough details"
            ],
            [
                'patient_id'=>3,
                'name'=>"Allergic dermatitis",
                'notes'=>"Allergic dermatitis details"
            ],
            [
                'patient_id'=>4,
                'name'=>"Conjucntivits",
                'notes'=>""
            ],
        );

        foreach($conditionsData as $add){
            Conditions::create($add);
        }
        echo 'Conditions has been added succesfully.';

    }
}
