<?php

namespace App\Imports;

use App\Models\Problem;
use Maatwebsite\Excel\Concerns\ToModel;

class ProblemsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Problem([
            //
        ]);
    }
}
