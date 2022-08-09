<?php

namespace App\Imports;

use App\Models\Fertilizer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FertilizersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if(isset($row['naimenovanie']) && $row['naimenovanie'] != null) {
                Fertilizer::firstOrCreate([
                    'name' => $row['naimenovanie']
                ],[
                    'name' => $row['naimenovanie'],
                    'nitrogen' => $row['norma_azot'],
                    'phosphorus' => $row['norma_fosfor'],
                    'potassium' => $row['norma_kalii'],
                    'culture_id' => $row['gruppa_kultur'],
                    'district' => $row['raion'],
                    'price' => $row['stoimost'],
                    'description' => $row['opisanie'],
                    'target' => $row['naznacenie'],
                ]);
            }
        }
    }
}
