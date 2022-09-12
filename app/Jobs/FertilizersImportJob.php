<?php

namespace App\Jobs;

use App\Imports\FertilizersImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class FertilizersImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $fertilizersFilePath;
    protected $importStatus;

    public function __construct($fertilizersFilePath, $importStatus)
    {
        $this->fertilizersFilePath = $fertilizersFilePath;
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
        Excel::import(new FertilizersImport($this->importStatus), storage_path('app/'.$this->fertilizersFilePath));
    }
}
