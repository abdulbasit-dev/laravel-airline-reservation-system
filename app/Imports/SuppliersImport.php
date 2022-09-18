<?php

namespace App\Imports;

use App\Models\Supplier;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SuppliersImport implements ToModel, WithStartRow, WithChunkReading, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    //skip the first row (header)
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Supplier([
            "name" => $row['name'],
            "company_name" => $row['company_name'],
            "address" => $row['address'],
            "phone" => $row['phone'],
            "phone_alt" => $row['phone_alt'],
        ]);
    }

    public function chunkSize(): int
    {
        return 100;
    }

}
