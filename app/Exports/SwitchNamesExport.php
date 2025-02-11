<?php

namespace App\Exports;

use App\Models\SwitchName;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SwitchNamesExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithMapping
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */

    protected $search = '';
    protected $originalCoulmns = false;

    public function __construct($search)
    {
        $this->search = $search;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:BF' . SwitchName::count() + 1)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:BF1')->getFont()->setBold(true);
        return;
    }

    public function collection()
    {
        return SwitchName::search($this->search)->get();
    }

    public function map($switch_name): array
    {
        return [
            $switch_name->id,
            $switch_name->name,
        ];
    }

    public function headings(): array
    {
        if ($this->originalCoulmns) {
            return [
                __('site.id'),
                __('site.name'),
            ];
        } else {
            return [
                'id',
                'name',
            ];
        }
    }
}
