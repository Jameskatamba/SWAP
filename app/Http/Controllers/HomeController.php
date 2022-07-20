<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;

class HomeController extends Controller
{
    public function dashboardOne(Request $request,Response $response){
        return view("dashboard_1")->with("page_name","Dashboard One");
    }

    public function dashboardTwo(Request $request,Response $response){
        return view("dashboard_2")->with("page_name","Dashboard Two");
    }

    public function dashboardThree(Request $request,Response $response){
        return view("dashboard_3")->with("page_name","Dashboard Three");
    }
}
