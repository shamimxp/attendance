<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function store(Request $request){
//        dd($request->all());
        $data = new Attendance();
        $data->sector = $request->sector;
        $data->shift = $request->shift;
        $data->attendance = json_encode($request->attendance);
        $data->date = $request->date;
        $data->status = $request->status;
        $data->save();
        return "data submit successfully!";
    }
}
