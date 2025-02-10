<?php

namespace App\Exports;

use App\Models\Ip;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class IpsExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithMapping
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
        $sheet->getStyle('A1:BF' . Ip::count() + 1)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:BF1')->getFont()->setBold(true);
        return;
    }

    public function collection()
    {
        return Ip::search($this->search)->get();
    }

    public function map($ip): array
    {
        return [
            $ip->id,
            $ip->number,
        ];
    }

    public function headings(): array
    {
        if ($this->originalCoulmns) {
            return [
                __('site.id'),
                __('site.number'),
            ];
        } else {
            return [
                'id',
                'number',
            ];
        }
    }
}
