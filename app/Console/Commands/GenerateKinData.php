<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Kin;

class GenerateKinData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-kin-data';

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
        $kinData = array(
            [
                'patient_id'=>1,
                'id_card'=>"002543G",
                'name'=>"Alvin",
                'surname'=>"Smith",
                'contact_number_1'=>"21334123",
                'contact_number_2'=>"79534145"
            ],
            [
                'patient_id'=>1,
                'id_card'=>"002543K",
                'name'=>"Andy",
                'surname'=>"Smith",
                'contact_number_1'=>"21334455",
                'contact_number_2'=>"79794545"
            ],
            [
                'patient_id'=>2,
                'id_card'=>"001345T",
                'name'=>"Fred",
                'surname'=>"Limea",
                'contact_number_1'=>"21295042",
                'contact_number_2'=>"79285390"
            ],
            [
                'patient_id'=>2,
                'id_card'=>"007628G",
                'name'=>"Jane",
                'surname'=>"Limea",
                'contact_number_1'=>"21790316",
                'contact_number_2'=>"90390645"
            ],
            [
                'patient_id'=>3,
                'id_card'=>"001345G",
                'name'=>"Tony",
                'surname'=>"Micale",
                'contact_number_1'=>"21517234",
                'contact_number_2'=>"79197451"
            ],
            [
                'patient_id'=>4,
                'id_card'=>"007496G",
                'name'=>"Philip",
                'surname'=>"Bore",
                'contact_number_1'=>"21555789",
                'contact_number_2'=>"79547234"
            ],
        );

        foreach($kinData as $add){
            Kin::create($add);
        }
        echo 'Kins has been added succesfully.';

    }
}
