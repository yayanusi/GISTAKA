<?php

namespace App\Imports;

use App\Place;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Ramsey\Uuid\Uuid;

class PlaceImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Place([
            'nama' => $row['nama'],
			'kode_pkm' => $row['kode_pkm'],
			'alamat' => $row['alamat'],
			'kabupaten' => $row['kabupaten'],
			'provinsi' => $row['provinsi'],
			'link' => $row['link'],
			'lat' => $row['lat'],
			'lng' => $row['lng'],
            'uuid' => Uuid::uuid4()->getHex(),
        ]);
    }
    public function headingRow(): int {
		return 1;
	}
}
