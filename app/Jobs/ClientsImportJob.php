<?php

namespace App\Jobs;

use App\Imports\ClientsImport;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

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
//        sleep(5);
        Excel::import(new ClientsImport($this->importStatus), storage_path('app/' . $this->clientsFilePath));
    }
}
