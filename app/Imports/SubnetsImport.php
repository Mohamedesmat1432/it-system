<?php

namespace App\Imports;

use App\Models\Subnet;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

class SubnetsImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public $skippedRows = [];

    public function model(array $row)
    {
        return Subnet::firstOrCreate([
            'name' => $row['name'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', Rule::unique('subnets')],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'name.required' => 'The Subnet name is required.',
        ];
    }

    public function onFailure(...$failures)
    {
        foreach ($failures as $failure) {
            $this->skippedRows[] =  [
                'row' => $failure->row(), // Row number
                // 'attribute' => $failure->attribute(), // Column name
                'errors' => array_map('utf8_decode', $failure->errors()), // Validation errors
            ];
        }
    }
}
