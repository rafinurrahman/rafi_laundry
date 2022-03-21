<?php

namespace App\Imports;

use App\Models\Outlet;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OutletImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Outlet([
            'id_outlet' => auth()->user()->id_outlet,
            'jenis' => $row['jenis'],
            'nama_outlet' => $row['nama_outlet'],
            'harga' => $row['harga']
        ]);
    }

    public function headingRow(): intdi
    {
        return 3;
    }
}
