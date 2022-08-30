<?php

namespace App\Jobs;

use App\Imports\ClientsImport;
use App\Models\ImportStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ClientsImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $clientsFilePath;
    protected $importStatus;

    public function __construct($clientsFilePath, $importStatus)
    {
        $this->clientsFilePath = $clientsFilePath;
        $this->importStatus = $importStatus;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(5);
        try {
            Excel::import(new ClientsImport(), storage_path('app/'.$this->clientsFilePath));
            $this->importStatus->update(['status' => 3 ]);
        } catch (\Exception $e) {
            $this->importStatus->update(['status' => 2 ]);
        }
    }
}
