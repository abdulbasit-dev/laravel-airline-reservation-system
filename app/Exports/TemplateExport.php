<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Excel;

class TemplateExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
    private $headers;


    public function __construct($headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function array(): array
    {
        return [];
    }

    public function headings(): array
    {
        return $this->headers;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => [
                'font' => ['bold' => true, "size" => '12'],
                'alignment' => ['horizontal' => 'left'],
            ]
        ];
    }
}
