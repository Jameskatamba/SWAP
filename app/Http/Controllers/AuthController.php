<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Exceptions\Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
    public function handleLogin(Request $request,Response $response){

        try{
        $user_name = $request->input("user_name");
        $user_password = ($request->input("password"));


        $users = DB::select("SELECT users.*,roles.role_id,roles.role_name,roles.permissions FROM users 
         join roles on users.role_id=roles.role_id where users.email='$user_name'
         or users.contact='$user_name'
         and users.password='$user_password'
         limit 1 "
         ); 
         
    
    
        if(count($users)>0){
        session([
            "user"=>$users[0]
        ]);
        return redirect("/dashboard");
        }else{

            Session::put("error","login attempt failed!!");
            return back();
        }
        }catch(QueryException $e){
            return "An error Occured";
        }
    
    }


    public function handleRegistration(Request $request,Response $response){
    
    
        try{
        $name = $request->input("name");
        $contact = $request->input("contact");
        $email = $request->input("email");
        $meter_id = $request->input("meter_id");
        $meter_id = '1';
        $role_id = $request->input("role_id");
        $user_password = ($request->input("password"));

        $user_data = [
            'full_name'=>$name,
            'email'=>$email,
            'meter_id'=>$meter_id,
            'contact'=>$contact,
            'password'=>$user_password,
            'role_id' => $role_id
        ];

        DB::table("users")->insert($user_data);
        Session::put("success","Account Successfully Created");
        return back();

    }catch(QueryException $e){
        Session::put("error","An error occured!!, please check your fields");
        return back();
    }

    }
}
