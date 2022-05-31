<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormatImportPuskesmas implements WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function  headings(): array
	{
		return [
			'nama',
            'kode_pkm',
            'alamat',
            'kabupaten',
            'provinsi',
            'link',
            'lat',
            'lng'
		];
    }
}
