<?php

namespace App\Exports;

use App\Models\SwitchData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SwitchsExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithMapping
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
        $sheet->getStyle('A1:BF' . SwitchData::count() + 1)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:BF1')->getFont()->setBold(true);
        return;
    }

    public function collection()
    {
        return SwitchData::search($this->search)->get();
    }

    public function map($switch): array
    {
        return [
            $switch->id,
            $switch->switchName?->name,
            $switch->port,
        ];
    }

    public function headings(): array
    {
        if ($this->originalCoulmns) {
            return [
                __('site.id'),
                __('site.switch_name_id'),
                __('site.port'),
            ];
        } else {
            return [
                'id',
                'switch_name_id',
                'port',
            ];
        }
    }
}
