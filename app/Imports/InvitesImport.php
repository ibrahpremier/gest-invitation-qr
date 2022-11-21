<?php

namespace App\Imports;

use App\Models\Invite;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InvitesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Invite([
            'nom'  => $row[0],
            'nb_place' => $row[1],
            'table' => $row[2],
            'telephone' => $row[3],
            'code_unique' => uniqid()
        ]);
    }
}
