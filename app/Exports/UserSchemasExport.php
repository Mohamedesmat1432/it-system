<?php

namespace App\Exports;

use App\Models\UserSchema;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserSchemasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UserSchema::all();
    }
}
