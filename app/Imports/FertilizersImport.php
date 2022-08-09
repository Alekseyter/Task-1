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
        foreach ($collection as $item) {
            if(isset($item['naimenovanie']) && $item['naimenovanie'] != null) {
                Fertilizer::firstOrCreate([
                    'name' => $item['naimenovanie']
                ],[
                    'name' => $item['naimenovanie'],
                    'nitrogen' => $item['norma_azot'],
                    'phosphorus' => $item['norma_fosfor'],
                    'potassium' => $item['norma_kalii'],
                    'culture_id' => $item['gruppa_kultur'],
                    'district' => $item['raion'],
                    'price' => $item['stoimost'],
                    'description' => $item['opisanie'],
                    'target' => $item['naznacenie'],
                ]);
            }
        }
    }
}
