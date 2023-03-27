<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DatabaseController extends Controller
{
    public function retrieve_db_table(Request $request){
        $column=$request->input('column');$table=$request->input('table');
        $tb_list=DB::select("select ".$column." from ".$table);
        return response()->json($tb_list);
    }

    public function db_cement_group_table(Request $request)
    {
        $action=$request->input('action');
        switch($action)
        {
            case "retrieve":
                $tb_list=DB::select("select * from cement_group");
                return response()->json($tb_list);
                break;
            case "insert":
                $Cement_Group=$request->input('Cement_Group');
                $Status=$request->input('Status');
                DB::insert("insert into cement_group(cement_group,status,created_at,updated_at)VALUES('".$Cement_Group."','".$Status."',now(),now())");
                break;
            case "update":
                $Cement_Group_Id=$request->input('Cement_Group_Id');
                $Cement_Group=$request->input('Cement_Group');
                $Status=$request->input('Status');
                DB::update("update cement_group set cement_group='".$Cement_Group."',status='".$Status."',updated_at=now() where cement_group_id='".$Cement_Group_Id."'");
                break;
            case "delete":
                $Cement_Group_Id=$request->input('Cement_Group_Id');
                DB::delete("delete from cement_group where cement_group_id='".$Cement_Group_Id."'");
                break;
        }
    }

    public function db_cement_company_table(Request $request)
    {
        $action=$request->input('action');
        switch($action)
        {
            case "retrieve":
                $tb_list=DB::select("select *,(select cement_group from cement_group where cement_group_id=cement_company.cement_group_id) as cement_group from cement_company");
                return response()->json($tb_list);
                break;
            case "insert":
                $Cement_Company=$request->input('Cement_Company');
                $Cement_Group_Id=$request->input('Cement_Group_Id');
                $Status=$request->input('Status');
                DB::insert("insert into cement_company(cement_company,cement_group_id,status,created_at,updated_at)VALUES('".$Cement_Company."','".$Cement_Group_Id."','".$Status."',now(),now())");
                break;
            case "update":
                $Cement_Company_Id=$request->input('Cement_Company_Id');
                $Cement_Company=$request->input('Cement_Company');
                $Cement_Group_Id=$request->input('Cement_Group_Id');
                $Status=$request->input('Status');
                DB::insert("update cement_company set cement_company='".$Cement_Company."',cement_group_id='".$Cement_Group_Id."',status='".$Status."',updated_at=now() where cement_company_id='".$Cement_Company_Id."'");
                break;
            case "delete":
                $Cement_Company_Id=$request->input('Cement_Company_Id');
                DB::insert("delete from cement_company where cement_company_id='".$Cement_Company_Id."'");
                break;
        }
    }

    public function db_cement_plant_table(Request $request)
    {
        $action=$request->input('action');
        switch($action)
        {
            case "retrieve":
                $tb_list=DB::select("select *,(select cement_plant_type from cement_plant_type where cement_plant_type_id=cement_plant.cement_plant_type_id) as cement_plant_type,(select cement_company from cement_company where cement_company_id=cement_plant.cement_company_id) as cement_company,(select state_name from state_creation where state_id=cement_plant.)state_id as state_name,address from cement_plant");
                return response()->json($tb_list);
                break;
            case "insert":
                $Cement_Plant_Type_Id=$request->input('Cement_Plant_Type_Id');
                $Cement_Plant=$request->input('Cement_Plant');
                $Cement_Company=$request->input('Cement_Company');
                $Latitude=$request->input('Latitude');
                $Longitude=$request->input('Longitude');
                $City=$request->input('City');
                $State_Id=$request->input('State_Id');
                $Contact_Person_name=$request->input('Contact_Person_name');
                $Contact_Phone_number=$request->input('Contact_Phone_number');
                $Contact_Email=$request->input('Contact_Email');
                $Address=$request->input('Address');
                $Status=$request->input('Status');
                DB::insert("insert into cement_plant(cement_plant_type_id,cement_plant,cement_company_id,latitude,longitude,contact_person_name,contact_phone_no,contact_email,city,state_id,address,status,created_at,updated_at)VALUES('".$Cement_Plant_Type_Id."','".$Cement_Plant."','".$Cement_Company."','".$Latitude."','".$Longitude."','".$Contact_Person_name."','".$Contact_Phone_number."','".$Contact_Email."','".$City."','".$State_Id."','".$Address."','".$Status."',now(),now())");
                break;
            case "update":
                $Cement_Plant_Id=$request->input('Cement_Plant_Id');
                $Cement_Plant_Type_Id=$request->input('Cement_Plant_Type_Id');
                $Cement_Plant=$request->input('Cement_Plant');
                $Cement_Company=$request->input('Cement_Company');
                $Latitude=$request->input('Latitude');
                $Longitude=$request->input('Longitude');
                $City=$request->input('City');
                $State_Id=$request->input('State_Id');
                $Contact_Person_name=$request->input('Contact_Person_name');
                $Contact_Phone_number=$request->input('Contact_Phone_number');
                $Contact_Email=$request->input('Contact_Email');
                $Address=$request->input('Address');
                $Status=$request->input('Status');
                DB::update("update cement_plant set cement_plant_type_id='".$Cement_Plant_Type_Id."',cement_plant='".$Cement_Plant."',cement_company_id='".$Cement_Company."',latitude='".$Latitude."',longitude='".$Longitude."',contact_person_name='".$Contact_Person_name."',contact_phone_no='".$Contact_Phone_number."',contact_email='".$Contact_Email."',city='".$City."',state_id='".$State_Id."',address='".$Address."',status='".$Status."',updated_at=now() where cement_plant_id='".$Cement_Plant_Id."'");
                break;
            case "delete":
                $Cement_Plant_Id=$request->input('Cement_Plant_Id');
                DB::update("delete from cement_plant where cement_plant_id='".$Cement_Plant_Id."'");
                break;
        }
    }

    public function db_cement_plant_type_table(Request $request)
    {
        $action=$request->input('action');
        switch($action)
        {
            case "retrieve":
                $tb_list=DB::select("select * from cement_plant_type");
                return response()->json($tb_list);
                break;
            case "insert":
                $Cement_Plant_Type=$request->input('Cement_Plant_Type');
                $Status=$request->input('Status');
                DB::insert("insert into cement_plant_type(cement_plant_type,status,created_at,updated_at)VALUES('".$Cement_Plant_Type."','".$Status."',now(),now())");
                break;
            case "update":
                $Cement_Plant_Type_Id=$request->input('Cement_Plant_Type_Id');
                $Cement_Plant_Type=$request->input('Cement_Plant_Type');
                $Status=$request->input('Status');
                DB::update("update cement_plant_type set cement_plant_type='".$Cement_Plant_Type."',status='".$Status."',updated_at=now() where cement_plant_type_id='".$Cement_Plant_Type_Id."'");
                break;
            case "delete":
                $Cement_Plant_Type_Id=$request->input('Cement_Plant_Type_Id');
                DB::delete("delete from cement_plant_type where cement_plant_type_id='".$Cement_Plant_Type_Id."'");
                break;
        }
    }

    public function retrieve_db_group_cnt_table(Request $request)
    {
        $state_id=$request->input('state_id');$state_id=($state_id!="")?" and cement_plant.state_id in (".$state_id.")":"";
        $group_id=$request->input('group_id');$group_id=($group_id!="")?" and cement_company.cement_group_id in (".$group_id.")":"";
        $tb_list=DB::select("SELECT cement_company.cement_group_id as group_id/*,cement_plant.state_id as state_id*/,count(*) as group_cnt FROM cement_company INNER JOIN cement_plant where cement_company.cement_company_id=cement_plant.cement_company_id".$state_id.$group_id." GROUP by cement_company.cement_group_id");
        return response()->json($tb_list);
    }
    public function retrieve_db_plant_loc_stgr_table(Request $request)
    {
        $state_id=$request->input('state_id');
        $group_id=$request->input('group_id');
        $cement_company_id="";
        if($group_id!=""){$cement_company_id1=DB::select("SELECT GROUP_CONCAT(cement_company_id SEPARATOR ',') as cement_company_id from cement_company where cement_group_id in (".$group_id.")");$cement_company_id=$cement_company_id1[0]->cement_company_id;}
        if(($state_id!="")||($cement_company_id!=""))
        {
            $tb_list=DB::select("SELECT cement_plant,(select cement_company from cement_company where cement_company_id=cement_plant.cement_company_id) as cement_company,(select cement_group from cement_group where cement_group_id=(select cement_group_id from cement_company where cement_company_id=cement_plant.cement_company_id)) as cement_group,latitude,longitude FROM cement_plant WHERE ".(($state_id!="")?"state_id in (".$state_id.")":"").((($state_id!="")&&($cement_company_id!=""))?" and ":"").(($cement_company_id!="")?"cement_company_id in (".$cement_company_id.")":""));
            return response()->json($tb_list);
        }
    }
    public function retrieve_db_plant_det_loc_table(Request $request)
    {
        $tb_list=DB::select("SELECT (select cement_group from cement_group where cement_group_id=(select cement_group_id from cement_company where cement_company_id=cement_plant.cement_company_id)) as cement_group,(select cement_company from cement_company where cement_company_id=cement_plant.cement_company_id) as cement_company,cement_plant,city,latitude,longitude FROM cement_plant WHERE status=1");
        return response()->json($tb_list);
    }
    /* public function retrieve_db_plant_loc_site_table(Request $request)
    {
        $site_id=$request->input('site_id');
        if($site_id!="")
        {
            $tb_list=DB::select("SELECT latitude,longitude FROM site_creation WHERE id in (".$site_id.") and latitude!='' and longitude!=''");
            return response()->json($tb_list);
        }
    } */
}
