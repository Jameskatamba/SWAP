<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function getUsers(Request $request){


        $roles = DB::table("roles")->get();
        $data = DB::table('users')->join("roles","users.role_id",'=',"roles.role_id")->get();
        return view("accounts.users_table")->with([
            "page_name"=>"Admins",
            "users_data"=>$data,
            "roles_data" =>$roles
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



    public function getChargeRates(Request $request){
        $rates = DB::table("water_charge_rates")->get();
        return view("accounts.meter_rates_table")->with([
            "page_name"=>"Charge Rates",
            "rates"=>$rates
        ]);

        //return view("accounts.roles_table")->with("page_name","Roles");
        
    }




    public function createRole(Request $request){

        $rolesTable = DB::table("roles");
        $permissions = [
            0,0,0
        ];

        if($request->input("can_create")=="on"){
            $permissions[0]=1;
        }

        if($request->input("can_edit")=="on"){
            $permissions[1]=1;
        }

        if($request->input("can_delete")=="on"){
            $permissions[2]=1;
        }

        $permissions = implode("",$permissions);
        $roleName = $request->input("role_name");
        $roleDesc = $request->input("role_desc");

        $roleDetails = [
            "role_name"=>  $roleName,
            "role_description"=>  $roleDesc,
            "permissions"=>$permissions
        ];

        $rolesTable->insert(
            $roleDetails
        );
        $request->session()->put('success', "Role created successfully");
        return back();
            
    }


    public function createRate(Request $request){
       
        $table = DB::table('water_charge_rates');
        $table->insert(
            [
                "unit"=>$request->input("unit_name"),
                "unit_cost"=>$request->input("unit_cost"),
                "admin_id"=>session()->get('user')->user_id,
                "in_use"=>$request->input("use_rate")=="on"?1:0,
            ]
        );
        $request->session()->put('success', "Water Charge Rate Created successfully");
        return back();


    }

    public function createMeter(Request $request){
       
        $table = DB::table('meters');

        // dd(
        //     $request->all()
        // );

        // return;

        $table->insert(
            [
                "meter_name"=>$request->input("meter_name"),
                "charge_rate_id"=>$request->input("rate_id"),
                "admin_id"=>session()->get('user')->user_id,
                "sale_status"=>$request->input("is_sold")=="on"?1:0,
            ]
        );
        $request->session()->put('success', "Meter Added successfully");
        return back();


    }


    public function getMeters(Request $request){ 
        $meters = DB::select("select * from meters join water_charge_rates on water_charge_rates.rate_id=meters.charge_rate_id");
        $charge_rates = DB::table("water_charge_rates")->get();
        return view("accounts.meters_table")->with([
            "page_name"=>"Water Meters",
            "meters"=>$meters,
            "charge_rates"=>$charge_rates
        ]);
    }

    public function getDataset(Request $request){

        $datasets = DB::table("water_consuptions")->get();
        return view("data.data_table")->with([
            "page_name"=>"Datasets",
            "dataset"=>$datasets
        ]);
    }

    public function showGraphs(Request $request){
        try{
        $transactionData = DB::select("SELECT amount, time(created_at) as created_at from water_consuptions");
        //  dd(
        //     $transactionData
        // );


        $cleanData = [];
        $counter = 0;
        foreach($transactionData as $data)    {
            $innerData = [
                $counter,$data->amount
            ];
            $cleanData[$counter]=$innerData;
            $counter++;
        }

        return view("charts.flot")->with(
            [
                "page_name"=>"Graphs",
                "graph_data"=>$cleanData
                ]
        );  
        } catch(QueryException $e){


            echo("An error occured");
        }
    }

    public function dashboardOne(Request $request){
        try{
        $transactionData = DB::select("SELECT amount, time(created_at) as created_at from water_consuptions");
        //  dd(
        //     $transactionData
        // );


        $cleanData = [];
        $counter = 0;
        foreach($transactionData as $data)    {
            $innerData = [
                $counter,$data->amount
            ];
            $cleanData[$counter]=$innerData;
            $counter++;
        }

        return view("dashboard_1")->with(
            [
                "page_name"=>"Dashboard",
                "graph_data"=>$cleanData
                ]
        );  
        } catch(QueryException $e){
            echo("An error occured");
        }



    }




}
