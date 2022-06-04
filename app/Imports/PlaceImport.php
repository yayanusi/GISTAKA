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
            'place_name' => $row['place_name'],
			'address' => $row['address'],
			'description' => $row['description'],
			'longitude' => $row['longitude'],
			'latitude' => $row['latitude'],
			'spp' => $row['spp'],
			'biaya_masuk' => $row['biaya_masuk'],
			'batas_tampung' => $row['batas_tampung'],
			'pengajar' => $row['pengajar'],
			'akreditasi' => $row['akreditasi'],
			'status' => $row['status'],
			'abk' => $row['abk'],
			'fasilitas' => $row['fasilitas'],
            
        ]);
    }
    public function headingRow(): int {
		return 1;
	}
}
