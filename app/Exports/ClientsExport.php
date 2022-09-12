<?php

namespace App\Exports;

use App\Models\Client;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ClientsExport implements FromView, ShouldAutoSize,WithDefaultStyles, WithStyles
{

    public function view(): View
    {
        return view('admin.clients.export', [
            'clients' => Client::all()
        ]);
    }

    public function defaultStyles(Style $defaultStyle)
    {
        return $defaultStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle(1)->getFont()->setBold(true);
    }

}
