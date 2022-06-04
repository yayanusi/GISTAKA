<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormatImportPlace implements WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;
    public function headings(): array
    {
        return [
            'place_name',
            'address',
            'description',
            'longitude',
            'latitude',
            'spp',
            'biaya_masuk',
            'batas_tampung',
            'pengajar',
            'akreditasi',
            'status',
            'abk',
            'fasilitas',
        ];
    }
}
