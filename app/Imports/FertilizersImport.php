<?php

namespace App\Imports;

use App\Models\Culture;
use App\Models\Fertilizer;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FertilizersImport implements ToCollection, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    protected $importStatus;

    public function __construct($importStatus)
    {
        $this->importStatus = $importStatus;
    }

    public function collection(Collection $collection)
    {
        if($this->failures()->isNotEmpty()) {
            $this->importStatus->update([
                'status' => 2,
                'errors' => $this->failures(),
            ]);
        } else {
            $this->importStatus->update([
                'status' => 3
            ]);

            foreach ($collection as $row) {
                //Проверяем, есть ли такая группа культур, если нет - создаем
                $culturesNames = Arr::pluck(Culture::all(), 'name');
                if (!(in_array( $row['gruppa_kultur'] ,$culturesNames ))) {
                    Culture::create([
                       'name' =>  $row['gruppa_kultur']
                    ]);
                }

                foreach (Culture::all() as $culture) {
                    if ($row['gruppa_kultur'] == $culture->name) {
                        $row['gruppa_kultur'] = $culture->id;
                        break;
                    }
                }
                if (isset($row['naimenovanie']) && $row['naimenovanie'] != null) {
                    Fertilizer::firstOrCreate([
                        'name' => $row['naimenovanie']
                    ], [
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

    public function rules(): array
    {
        return [
            'naimenovanie' => 'required|string',
            'norma_azot' => 'required|numeric',
            'norma_fosfor' => 'required|numeric',
            'norma_kalii' => 'required|numeric',
            'gruppa_kultur' => 'required|string',
            'raion' => 'required|string',
            'stoimost' => 'required|numeric',
            'opisanie' => 'required|string',
            'naznacenie' => 'required|string',
        ];
    }

    public function customValidationMessages()
    {
        // пример сообщений об ошибках
        return [
            'naimenovanie.required' => 'Поле "Наименование" обязательно к заполнению',
            'naimenovanie.string' => 'Поле "Наименование" должно быть текстовым',
            'norma_azot.required' => 'Поле "Норма Азот" обязательно к заполнению',
            'norma_azot.numeric' => 'Поле "Норма Азот" должно быть числовым',
            'norma_fosfor.required' => 'Поле "Норма Фосфор" обязательно к заполнению',
            'norma_fosfor.numeric' => 'Поле "Норма Фосфор" должно быть числовым',
            'norma_kalii.required' => 'Поле "Норма Калий" обязательно к заполнению',
            'norma_kalii.numeric' => 'Поле "Норма Калий" должно быть числовым',
            'gruppa_kultur.required' => 'Поле "Группа культур" обязательно к заполнению',
            'gruppa_kultur.string' => 'Поле "Группа культур" должно быть текстовым',
            'raion.required' => 'Поле "Район" обязательно к заполнению',
            'raion.required' => 'Поле "Район" обязательно к заполнению',
            'raion.string' => 'Поле "Район" должно быть текстовым',
            'stoimost.required' => 'Поле "Стоимость" обязательно к заполнению',
            'stoimost.numeric' => 'Поле "Стоимость" должно быть числовым',
            'opisanie.required' => 'Поле "Описание" обязательно к заполнению',
            'opisanie.string' => 'Поле "Описание" должно быть текстовым',
            'naznacenie.required' => 'Поле "Назначение" обязательно к заполнению',
            'naznacenie.string' => 'Поле "Назначение" должно быть текстовым',
        ];
    }
}
