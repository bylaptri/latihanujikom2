<?php

namespace App\Exports;

use App\Models\Buku;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\Aftersheet;

class DataBukuExportView implements FromView, WithEvents
{
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('data_buku.exportExcel', [
            'data' => $this->data
        ]);
    }

    public function registerEvents(): array
    {
        return [
            Aftersheet::class => function (AfterSheet $event)
            {
                foreach ($event->sheet->getColumnIterator() as $column)
                {
                    $column = $column->getColumnIndex();
                    $event->sheet->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }
}
