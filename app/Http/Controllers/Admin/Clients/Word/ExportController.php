<?php

namespace App\Http\Controllers\Admin\Clients\Word;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Carbon\Carbon;
use PhpOffice\PhpWord\Exception\Exception;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class ExportController extends Controller
{
    public function __invoke(Client $client)
    {
        $client->date = Carbon::createFromFormat('Y-m-d', $client->date)->format('d.m.Y');
        $dateToday = Carbon::now()->format('d.m.Y');

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $section->addText('Справка', [
            'size' => 18, 'color' => '#000', 'bold' => true
        ]);
        $section->addText('Подтверждает действительность заключения договора от ' .  $client->date .  ' с компанией ' . $client->name .
            ' на сумму ' . $client->price . ' руб', [
            'size' => 13, 'color' => '#545454', 'italic' => true
        ]);
        $section->addText();
        $section->addText();
        $section->addText($dateToday);
        $section->addText('С уважением, ИП Иванов А.С.');

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(storage_path('app/word/Contract' . '.docx'));

        return response()->download(storage_path('app/word/Contract' . '.docx'));
    }
}
