<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ApiRecords;
class CallApiRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:call-api-records';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get records from the API https://api.publicapis.org/entries';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $recordData = json_decode(file_get_contents('https://api.publicapis.org/entries'), true);

        foreach ($recordData['entries'] as $apiRecord) {
            ApiRecords::updateOrCreate(
                ['api' => $apiRecord['API']],
                [
                    'description' => $apiRecord['Description'],
                    'auth' => $apiRecord['Auth'],
                    'https' => $apiRecord['HTTPS'],
                    'cors' => $apiRecord['Cors'],
                    'link' => $apiRecord['Link'],
                    'category' => $apiRecord['Category'],
                ]
            );
        }

        $this->info('records API https://api.publicapis.org/entries is successfully! in the database');
    }
}
