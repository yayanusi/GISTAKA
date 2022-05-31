<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Ramsey\Uuid\Uuid;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        
        // return new User([
        //     'name' => $row['name'],
        //     'email' => $row['email'],
        //     'password' => Hash::make($row['password']),
        //     'role' => $row['role'],
        //     'id_pkm' => $row['id_pkm'],
        //     'uuid' => Uuid::uuid4()->getHex(),
        //     User::assignRole($row('role'))
        // ]);

        $data = User::create([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
            'role' => $row['role'],
            'id_pkm' => $row['id_pkm'],

        ])->assignRole($row['role']);
        return $data;
    }
    public function headingRow(): int
    {
        return 1;
    }
    // public function batchSize(): int
    // {
    //     return 500;
    // }

    // public function chunkSize(): int
    // {
    //     return 500;
    // }
}
