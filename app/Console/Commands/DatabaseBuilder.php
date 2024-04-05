<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DatabaseBuilder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:database-builder';
    // php artisan app:database-builder

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
        Artisan::call('migrate:fresh');
        echo "
        0)All migrations refreshed";
        echo "
        1)";
        Artisan::call('app:generate-patient-data');
        echo "
        2)";
        Artisan::call('app:generate-kin-data');
        echo "
        3)";
        Artisan::call('app:generate-patient-alergies-data');
        echo "
        4)";
        Artisan::call('app:generate-patient-conditions-data');
        echo "
        5)";
        Artisan::call('app:generate-patient-medications-data');

        echo "
        Database had rebuilt.";
    }
}
