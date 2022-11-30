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
            'telephone' => $row[1],
            'code_unique' => uniqid()
        ]);
    }
}
