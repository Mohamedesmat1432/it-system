<?php

namespace App\Imports;

use App\Models\UserSchema;
use Maatwebsite\Excel\Concerns\ToModel;

class UserSchemasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new UserSchema([
            //
        ]);
    }
}
