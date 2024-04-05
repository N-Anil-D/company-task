<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Patient;

class GeneratePatientData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-patient-data';

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
        $patienceData = array(
            [
                'id_card'=>"002482G",
                'gender'=>0,
                'name'=>"John",
                'surname'=>"Smith",
                'date_of_birth'=>"1982-02-15 00:00:00",
                'address'=>"5 St Philip Street",
                'postcode'=>1456,
                'contact_number_1'=>"21334455",
                'contact_number_2'=>"79794545"
            ],
            [
                'id_card'=>"004332H",
                'gender'=>0,
                'name'=>"Paul",
                'surname'=>"Limea",
                'date_of_birth'=>"1985-03-16 00:00:00",
                'address'=>"Angel  St Camille",
                'postcode'=>2444,
                'contact_number_1'=>"04321514456",
                'contact_number_2'=>"09321514456"
            ],
            [
                'id_card'=>"004332G",
                'gender'=>0,
                'name'=>"Peter",
                'surname'=>"Micale",
                'date_of_birth'=>"1990-05-21 00:00:00",
                'address'=>"5 St. Mark Street",
                'postcode'=>3333,
                'contact_number_1'=>"21263464",
                'contact_number_2'=>"91477889"
            ],
            [
                'id_card'=>"006780G",
                'gender'=>1,
                'name'=>"Mary",
                'surname'=>"Bore",
                'date_of_birth'=>"1950-01-15 00:00:00",
                'address'=>"55 St. George Street",
                'postcode'=>4141,
                'contact_number_1'=>"21555789",
                'contact_number_2'=>"80777889"
            ],
        );

        foreach($patienceData as $add){
            Patient::create($add);
        }
        echo 'Patience data has been added succesfully.';
    }
}
