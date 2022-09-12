<?php

namespace App\Exports;

use App\Models\Fertilizer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FertilizersExport implements FromView, ShouldAutoSize,WithDefaultStyles, WithStyles
{

    public function view(): View
    {
        return view('admin.fertilizers.export', [
            'fertilizers' => Fertilizer::all()
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
