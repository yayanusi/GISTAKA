<?php

namespace App\Exports;

use App\Models\Puskesmas;
use Maatwebsite\Excel\Concerns\FromCollection;

class PuskesmasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Puskesmas::all();
    }
}
