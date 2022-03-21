<?php

namespace App\Exports;

use App\Models\Outlet;
use Maatwebsite\Excel\Concoerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use illuminate\Suport\Facades\DB;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;

class OutletExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Outlet::where('id_paket',auth()->user()->id_paket)->get();
    }
    public function headings(): array
    {
        return [
            'No.',
            'ID Paket',
            'Jenis',
            'Nama outlet',
            'Harga',
            'Tanggal Input',
            'Tanggal Update',
        ];
    }   
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event){
                $event->sheet->getDelegate->getColumnDimension('A')->setAutoSize(true); //no
                $event->sheet->getDelegate->getColumnDimension('b')->setAutoSize(true);
                $event->sheet->getDelegate->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getDelegate->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getDelegate->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getDelegate->getColumnDimension('F')->setAutoSize(true);
                $event->sheet->getDelegate->getColumnDimension('G')->setAutoSize(true);

                $event->sheet->getDelegate->insertNewRowBefore(1, 2);
                $event->sheet->getDelegate->mergeCells('A1:G1');
                $event->sheet->getDelegate->setCellValue('A1','DATA OUTLET');
                $event->sheet->getDelegate->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getDelegate->getStyle('A1')->getAligment()->setHorizontal(\phpWfs\phpSpreadsheet\Style\Aligmant::HORIZONTAL_CENTER);

                $event->sheet->getStyle('A3:G'.$event->sheet-getHighesRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpWfsSpreaddsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000']
                        ]
                    ],
                ]);

            },
        ];
    }

}
