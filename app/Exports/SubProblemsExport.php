<?php

namespace App\Exports;

use App\Models\SubProblem;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubProblemsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SubProblem::all();
    }
}
