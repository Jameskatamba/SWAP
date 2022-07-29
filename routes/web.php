<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


(function(){
   Route::get("/login",function(){
      return view("pages.examples.login");  
  });

  
Route::get("/data",function(){
   return view("data.data_table")->with("page_name","Datasets");
});
Route::get("/",function(Request $request){
   if($request->session()->has("user")){
      return redirect("/dashboard");
   }else{
      return view("pages.examples.login"); 
   } 
});

 Route::get("/my",function(){
   return view("pages.examples.profile");  
});

 Route::get("register",function(){
   return view("auth.register");  
});

Route::get("/visualizations/chartjs",function(){
   return view("charts.chartjs");  
});

Route::get("/visualizations/flot",function(){
   return view("charts.flot");  
});

Route::get("/visualizations/inline",function(){
   return view("charts.inline");  
});




Route::fallback(function(){
   return view("pages.examples.404");
});

Route::controller(AuthController::class)->group(function(){
   Route::post("/auth_login","handleLogin");
   Route::post("/handle_registration","handleRegistration");
});

Route::controller(HomeController::class)->group(function(){
   //Route::get("/dashboard","dashboardOne");
   Route::get("/dashboard/2","dashboardTwo");
   Route::get("/dashboard/3","dashboardThree");
});

Route::controller(DataController::class)->group(function(){
   Route::get("/accounts/users","getUsers");
   Route::get("/accounts/meters","getMeters");
   Route::get("/accounts/roles","getRoles");
   Route::get("/data","getDataset");
   Route::get("/graph","showGraphs");
   Route::get("/dashboard","dashboardOne");
   Route::get("/charge_rates","getChargeRates");
   Route::post("/handle_roles","createRole");
   Route::post("/handle_rates","createRate");
   Route::post("/handle_meters","createMeter");
   
});


Route::get("/logout",function(){
   Session::forget("user");
   return redirect("/login");
});Route::any("/",function(){
   return view("pages.examples.404");  
});
})();