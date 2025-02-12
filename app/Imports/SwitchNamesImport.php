<?php

namespace App\Imports;

use App\Models\SwitchName;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

class SwitchNamesImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows, SkipsOnFailure
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
        return SwitchName::firstOrCreate([
            'name' => $row['name'],
            'ip' => $row['ip'],
            'password' => $row['password'],
            'password_enable' => $row['password_enable'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', Rule::unique('switch_names')],
            'ip' => ['nullable', 'string', Rule::unique('switch_names')],
            'password' => ['nullable', 'string'],
            'password_enable' => ['nullable', 'string'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'name.required' => 'The switch name name is required.',
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
