<?php

namespace App\Http\Controllers;

use App\Models\BazarDetais;
use Illuminate\Http\Request;

class BazarDetailsController extends Controller
{

    public function store(Request $request){
        $data = new BazarDetais();
        $data->sectorId = $request->sectorId;
        $data->discount = $request->discount;
        $data->bazarDetails = json_encode($request->bazarDetails);
        $data->othersAmount = $request->othersAmount;
        $data->totalAmount = $request->totalAmount;
        $data->note = $request->note;
        $data->save();
        return "okkk";
    }
}
