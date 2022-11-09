<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\APIService;
use Log;
use Exception;

class ApiController extends Controller
{
    public function query(Request $request)
    {
        // Simple validation to make sure a name has been entered
        if(!isset($request->name)){
            return view('error', ['error' => "Please enter a valid name!"])->render();
        }

        // Calling the API Service
        try{
            $data = APIService::getCurl($request->name);
        }catch(Exception $e){
            return view('error', ['error' => $e->getMessage()])->render();
        }

        // Setting the color cards baised on the gender
        if($data->gender == 'male'){
            $color = "primary";
        }else if ($data->gender == 'female'){
            $color = "danger";
        }else{
            $color = "dark";
        }

        // Returning the rendered view
        return view('data', ['data' => $data, 'color' => $color])->render();
    }
}
