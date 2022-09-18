<?php

namespace App\Imports;

use App\Models\ClientCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientCategoriesImport implements ToModel, WithStartRow, WithHeadingRow
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
        return new ClientCategory([
            "name" => $row['name'],
        ]);
    }
}
