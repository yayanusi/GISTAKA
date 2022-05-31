<?php

namespace App\Exports;

use App\Models\Variabel;
use Maatwebsite\Excel\Concerns\FromCollection;

class VariabelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Variabel::all();
    }
}
