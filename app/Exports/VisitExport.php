<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VisitExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithStyles
{
    private $query;
    private $headers;


    public function __construct($query, $headers)
    {
        $this->query = $query;
        $this->headers = $headers;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->query;
    }

    // map what a single member row should look like
    // this method will iterate over each collection item
    public function map($row): array
    {
        return [
            $row->id,
            $row->user->name,
            $row->client->name,
            $row->text,
            $row->lat,
            $row->long,
            $row->created_at,
            $row->updated_at,
        ];
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
