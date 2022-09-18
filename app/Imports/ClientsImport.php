<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\Supplier;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToModel, WithStartRow, WithChunkReading, WithHeadingRow
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
        return new Client([
            'category_id'           =>$row['category_id'],
            'name'                  =>$row['name'],
            'phone'                 =>$row['phone'],
            'phone_alt'             =>$row['phone_alt'],
            'address'               =>$row['address'],
            'lat'                   =>$row['lat'],
            'long'                  =>$row['long'],
            'loan_limit'            =>$row['loan_limit'],

        ]);
    }

    public function chunkSize(): int
    {
        return 30;
    }

}
