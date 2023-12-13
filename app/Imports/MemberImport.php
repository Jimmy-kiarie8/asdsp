<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\Usermanagement\Entities\Member;
class MemberImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }
      public function model(array $row)
    {
        $data=$row;  
         

        return new Organization([
            'org_name'=>$row[2]

            //
        ]);
    }

}
