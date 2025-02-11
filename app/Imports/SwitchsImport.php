<?php

namespace App\Imports;

use App\Models\SwitchData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

class SwitchsImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows, SkipsOnFailure
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
        return SwitchData::firstOrCreate([
            'switch_name_id' => $row['switch_name_id'],
            'port' => $row['port'],
        ]);
    }

    public function rules(): array
    {
        return [
            'switch_name_id' => [
                'required',
                'string',
                'exists:switch_names,id' // Ensure national_number is unique in the switch_data table
            ],
            'port' => ['required', 'string']
        ];
    }

    public function customValidationMessages()
    {
        return [
            'switch_name_id.required' => 'The switch name is required.', // Other messages as needed
            'port.required' => 'The switch port is required.', // Other messages as needed
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
