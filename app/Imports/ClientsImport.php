<?php

namespace App\Imports;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ClientsImport implements ToCollection, WithHeadingRow, WithValidation, SkipsOnFailure
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
                if ($row->filter()->isNotEmpty()) {
                    if (isset($row['naimenovanie']) && $row['naimenovanie'] != null) {
                        Client::firstOrCreate([
                            'name' => $row['naimenovanie']
                        ], [
                            'name' => $row['naimenovanie'],
                            'date' => $row['data_dogovora'],
                            'price' => $row['stoimost_postavki'],
                            'region' => $row['region'],
                        ]);
                    }
                }
            }
        }
    }

    public function rules(): array
    {
        return [
            'naimenovanie' => 'required|string',
            'data_dogovora' => 'required|date',
            'stoimost_postavki' => 'required|numeric',
            'region' => 'required|string',
        ];
    }

    public function customValidationMessages()
    {
        // пример сообщений об ошибках
        return [
            'naimenovanie.required' => 'Поле "Наименование" обязательно к заполнению',
            'naimenovanie.string' => 'Поле "Наименование" должно быть текстовым',
            'data_dogovora.required' => 'Поле "Дата договора" обязательно к заполнению',
            'data_dogovora.date_format' => 'Поле "Дата договора" должно быть формата 2022-20+12',
            'stoimost_postavki.required' => 'Поле "Стоимость поставки" обязательно к заполнению',
            'stoimost_postavki.numeric' => 'Поле "Стоимость поставки" должно быть числовым',
            'region.required' => 'Поле "Регион" обязательно к заполнению',
            'region.string' => 'Поле "Регион" должно быть текстовым',
        ];
    }
}
