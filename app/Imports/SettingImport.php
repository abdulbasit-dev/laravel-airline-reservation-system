<?php

namespace App\Imports;

use App\Models\Setting;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SettingImport implements ToModel, WithStartRow, WithChunkReading, WithHeadingRow
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
        return new Setting([
            "key" => $row['key'],
            "value" => $row['value'],
        ]);
    }

    public function chunkSize(): int
    {
        return 100;
    }

}
