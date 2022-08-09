<?php

namespace App\Console\Commands;

use App\Imports\FertilizersImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class FertilizersImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:import:fertilizers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'importing fertilizers from an excel spreadsheet';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Excel::import(new FertilizersImport(), public_path('excel/import/fertilizers.xlsx'));
    }
}
