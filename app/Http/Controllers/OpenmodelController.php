<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpenmodelController extends Controller
{
    public function cement_group_create(Request $request){
        $Cement_Group_Id=$request->input('Cement_Group_Id');
        $tb_list=DB::select("select * from cement_group where cement_group_id='".$Cement_Group_Id."'");
        return view('cement_group.create',['Cement_Group_Id'=>$Cement_Group_Id,'Cement_Group'=>$Cement_Group]);
    }
}
