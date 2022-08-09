<?php

namespace App\Imports;

use App\Models\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ClientsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
            foreach ($collection as $row) {
                if(isset($row['naimenovanie']) && $row['naimenovanie'] != null) {
                    Client::firstOrCreate([
                        'name' => $row['naimenovanie']
                    ],[
                        'name' => $row['naimenovanie'],
                        'date' => Date::excelToDateTimeObject($row['data_dogovora']),
                        'price' => $row['stoimost_postavki'],
                        'region' => $row['region'],
                    ]);
                }
            }
    }
}
