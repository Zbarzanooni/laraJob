<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
   public function cities(Request $request){

       $request->validate([
          'province_id'=>'required|integer|exists:provinces,id'
       ]);
       $cities = City::where('province_id',$request->province_id)->pluck('name','id')->toArray();
       return response()->json(['status'=>true,'data'=>$cities]);
   }
}
