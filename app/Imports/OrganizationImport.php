<?php

namespace App\Imports;

use Modules\Usermanagement\Entities\Organization;
use Maatwebsite\Excel\Concerns\ToModel;

class OrganizationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data=$row;  
          dd($data);

        return new Organization([
            'org_name'=>$row[2]

            //
        ]);
    }
}
