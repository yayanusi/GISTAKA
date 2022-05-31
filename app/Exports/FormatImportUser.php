<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormatImportUser implements WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;
    public function headings(): array
    {
        return [
            'name',
            'email',
            'password',
            'role',
            'id_pkm',
        ];
    }
}
