<?php

namespace App\Console\Commands;

use App\Imports\ClientsImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ClientsImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:import:clients';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'importing clients from an excel spreadsheet';

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
        Excel::import(new ClientsImport(), public_path('excel/import/clients.xlsx'));
    }
}
