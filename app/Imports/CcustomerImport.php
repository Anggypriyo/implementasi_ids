<?php

namespace App\Imports;

use App\Models\customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsonError;
use Maatwebsite\Excel\Concerns\SkipsonFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
//use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use validation;
use throwable;

class CcustomerImport implements 
    ToModel,
    WithHeadingRow, 
    WithValidation, 
    SkipsonError,
    SkipsonFailure,
    WithBatchInserts
{
    use Importable,SkipsErrors,SkipsFailures;
    public function model(array $row)
    {
        return new customer([
            'nama' => $row["nama"],
            'alamat' => $row["alamat"],
            'id_kel' => $row["kodepos"],
            
        ]);
    }
    /*public function startRow(): int
    {
         //start input in second row
         return 2;
    }*/
    public function rules(): array
    {
        return [
            '*.nama' => 'unique:customer,nama',
        ];
    }
    //menginputkan secara berasamaan
    public function batchSize(): int
    {
        return 1000;
    }

}
