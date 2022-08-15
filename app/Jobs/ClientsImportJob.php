<?php

namespace App\Jobs;

use App\Imports\ClientsImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
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

    public function __construct($clientsFilePath)
    {
        $this->clientsFilePath = $clientsFilePath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->queue = 'ClientsImport';
        sleep(120);
        Excel::import(new ClientsImport(), storage_path('app/'.$this->clientsFilePath));
        Artisan::call('queue:work', ['--queue' => 'ClientsImport','--stop-when-empty']);
    }
}
