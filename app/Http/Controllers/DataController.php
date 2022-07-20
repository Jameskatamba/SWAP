<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function getUsers(Request $request){

        $data = DB::table('users')->join("roles","users.role_id",'=',"roles.role_id")->get();
        return view("accounts.users_table")->with([
            "page_name"=>"Admins",
            "users_data"=>$data
    ]);
    }

    public function getRoles(Request $request){

        $roles = DB::table("roles")->get();
        return view("accounts.roles_table")->with([
            "page_name"=>"Roles",
            "roles"=>$roles
        ]);

        //return view("accounts.roles_table")->with("page_name","Roles");
        
    }


    public function getMeters(Request $request){
        return view("accounts.meters_table")->with("page_name","Meters");   
    }

    public function getDataset(Request $request){

        $datasets = DB::table("water_consuptions")->get();
        return view("data.data_table")->with([
            "page_name"=>"Datasets",
            "dataset"=>$datasets
        ]);
    }
}
