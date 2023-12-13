<?php

namespace Modules\Usermanagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Usermanagement\Entities\ValueChain;
use Modules\Usermanagement\Entities\CountyValueChain;
use Modules\Usermanagement\Entities\Organization;
use Modules\Usermanagement\Entities\InnovationCategory;
use Modules\Usermanagement\Entities\Innovation;
use Modules\Usermanagement\Entities\SuccessStory;
use Modules\Usermanagement\Entities\Publication;
use Modules\Usermanagement\Entities\Member;
use Modules\Usermanagement\Entities\Product;
use Modules\Usermanagement\Entities\County;

use App\User;
use Auth;
use DB;
class DashboardController extends Controller
{
     protected $userID;
    protected $mid;
    protected $sid;
  public function __construct()
    {
      
        $this->middleware(['auth','setup','securex']);
        
       
        $this->middleware(function ($request, $next) {
            $this->userID = Auth::user()->id;
            $this->sid=Auth::user()->org_id;

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function ValueChainsSt()
    {
         $models=DB::select("SELECT value_chain_id,value_chains.value_name,count(organizations.id) as number FROM organizations join value_chains on value_chains.id=organizations.value_chain_id WHERE county_id=? group by value_chain_id,value_name",[$this->sid]);
          $data=array();
             foreach($models as $model)
             {
                $data[]=array('name'=>$model->value_name,'y'=>$model->number);
             }
             return $data;

    }
    public function index()
    {
        return view('usermanagement::index');
    }



    public function LoadDefault()
    {
        $models=DB::select("SELECT county_id, county_name,count(innovations.id) as num,  sum(`inno_male_adultvca`) as male_adults,
sum(inno_female_adultvca) as female_adults,
sum(inno_youth_malevca) as male_youth,
sum(inno_youth_femalevca) as female_youth,
sum(inno_male_adultvca+ inno_youth_malevca) as total_male,
sum(inno_female_adultvca+inno_youth_femalevca) as total_female,
sum(inno_male_adultvca+ inno_youth_malevca+inno_female_adultvca+inno_youth_femalevca) as grandtotal
FROM innovations
join counties c on c.id=innovations.county_id

group by  county_id,county_name");
      $i=0;
          foreach($models as $model)
          {
             $i=$i+1;
             echo '<tr style="text-align:cente">
                      <td>'.$i.'</td>
                      <td>'.$model->county_name.'</td>
                      <td>'.$model->num.'</td>
                      <td>'.number_format($model->male_adults,0).'</td>
                      <td>'.number_format($model->female_adults,0).'</td>
                      <td>'.number_format($model->male_youth,0).'</td>
                      <td>'.number_format($model->female_youth,0).'</td>
                      <td>'.number_format($model->total_male,0).'</td>
                      <td>'.number_format($model->total_female,0).'</td>
                      <td>'.number_format($model->grandtotal,0).'</td>
                 </tr>';

          }
    }


    public function getStatisticsByBeneficiary()
    {

         $male_count=Innovation::sum('inno_male_vca');
          $female_count=Innovation::sum('inno_female_vca');
          $youth_count=Innovation::sum('inno_youth_vca');
         
         $data[]=array("name"=>"Male","amount"=>$male_count);
          $data[]=array("name"=>"Female","amount"=>$female_count);
          $data[]=array("name"=>"Youth","amount"=>$youth_count);
        
           $phparray =json_encode($data,true);

                      $jsonArray2=array();
                       $ar=array();
                       foreach ($data as $key2=>$value ) {
                           
                        $d=(double)$value['amount'];
                           $loop=array($value['name'],$d);
                           //print_r($loop);
                           $jsonArray2[]=$loop;
                        //$jsonArray2[]=$loop;
                         
                       
                      }
                      return $jsonArray2;
    }

    public function MapData(Request $request)
    {
          $data=$request->all();
         
          $name=$data['id'];
          $model=County::where(['county_name'=>$name])->first();
            if($model)
            {
                $models=DB::select('SELECT DISTINCT products.value_chain_id,value_chains.value_name ,format(sum(quantity_available*unit_price),2) as amount FROM `products` join organizations on organizations.id=products.org_id join value_chains on value_chains.id=products.value_chain_id where organizations.county_id=? GROUP by value_chain_id union select "","Net Value",format(sum(quantity_available*unit_price),2) from products join organizations on organizations.id=products.org_id where organizations.county_id=?',[$model->id,$model->id]);


                  echo  "<table border='1' cellspacing='1'  cellpadding='1'  style='width:100%'>
      <tr>
      <th colspan='4' ><center>".$name."</center></th>
      </tr>
     ";
       foreach($models as $mod):

     echo "<tr><td>".substr($mod->value_name, 0,25)."&nbsp;&nbsp;&nbsp;</td><td style='text-align:right'>&nbsp;&nbsp;".$mod->amount."</td></tr>";

        endforeach;
        "

      </table>

     ";
       
        }else{
                 return "County Details Not Found";
            }

    }

    public function MainData()
    {
          

            $totalAdverts=InnovationCategory::count();
        $users=Innovation::whereNull('is_deleted')->count();
        $applicants=SuccessStory::whereNull('is_deleted')->count();
        $applications=Innovation::whereNull('is_deleted')->sum('inno_vca_benefit');
        $data=array("Adverts"=>$totalAdverts,
                    "UserCount"=>$users,
                    "ApplicantCount"=>$applicants,
                    "JobApplicantions"=>number_format($applications,0),

            );
        

        return $data;

    }

    public function getToptenProductByValue()
    {
         if(Auth::User()->hasRole("County Co-ordinator"))
         {
              $models=DB::select('SELECT products.value_chain_id,value_name,sum(`quantity_available`) as  number,sum(quantity_available*unit_price) as estimate_amount FROM `products`
join value_chains on value_chains.id=products.value_chain_id
join organizations on organizations.id=products.org_id
where organizations.county_id=?
group by value_chain_id,value_name order by estimate_amount desc limit 10',[$this->sid]);

         }else{
             $models=DB::select('SELECT `value_chain_id`,value_name,sum(`quantity_available`) as  number,sum(quantity_available*unit_price) as estimate_amount FROM `products`
join value_chains on value_chains.id=products.value_chain_id
group by value_chain_id,value_name order by estimate_amount desc limit 10');

         }
       
          foreach($models as $model)
          {
            echo '<tr><td>'.$model->value_name.'</td><td>'.$model->number.'</td><td>'.number_format($model->estimate_amount,2).'</td</tr>';
          }
         
    }

    public function GetGenStats()
    {
          
           $models=DB::select('SELECT node_id,n.node_name,  count(innovations.id) as number FROM `innovations`
left join node_types n on n.id=innovations.node_id
WHERE is_deleted is null group by node_id,node_name');



       
          $data=array();
            foreach($models as $model)
            {
                 $data[]=array('name'=>$model->node_name,'y'=>$model->number);
            }

            return $data;
    }

    public function GetValueChain()
    {
          $models=DB::select("SELECT value_chain_id,n.value_name,  count(innovations.id) as number FROM `innovations`
left join value_chains n on n.id=innovations.value_chain_id
WHERE is_deleted is null group by value_chain_id,value_name order by number desc limit 8");
         $data=array();
            foreach($models as $model)
            {
                 $data[]=array('name'=>$model->value_name,'y'=>$model->number);
            }

            return $data;

    }

    public function GetMonthStats(Request $request)
    {
         

          $models=DB::select("select value_name,count(m.id) as number from value_chains join  organizations  o on o.value_chain_id=value_chains.id  join vco_members m on m.org_id=o.id group by value_name order by  number desc limit 10 ");
         $data=array();
            foreach($models as $model)
            {
                 $data[]=array('name'=>$model->value_name,'y'=>$model->number);
            }

            return $data;

    }

    public function getStatisticsByTypes()
    {
        $models=DB::select("SELECT innovation_type as name,count(id) as number FROM `innovations` WHERE is_deleted is null group by name");
         $data=array();
            foreach($models as $model)
            {
                 $data[]=array('name'=>$model->name,'y'=>$model->number);
            }

            return $data;

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('usermanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('usermanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('usermanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
