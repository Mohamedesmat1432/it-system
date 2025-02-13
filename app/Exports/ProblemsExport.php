<?php

namespace App\Exports;

use App\Models\Problem;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProblemsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Problem::all();
    }
}
