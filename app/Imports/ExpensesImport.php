<?php

namespace App\Imports;

use App\Models\Expense;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExpensesImport implements ToModel, WithStartRow, WithChunkReading, WithHeadingRow
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
        return new Expense([
            'title'                 =>$row['title'],
            'description'           =>$row['description'],
            'price'                 =>$row['price'],
            'user_id'               =>$row['user_id'],
            'tag_id'                =>$row['tag_id'],
        ]);
    }

    public function chunkSize(): int
    {
        return 30;
    }

}
