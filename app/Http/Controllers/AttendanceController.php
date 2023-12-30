<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function list(){
        $data = Attendance::all();
        return view('list',compact('data'));
    }
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
    public function edit($id){
        $data = Attendance::find($id);
        $decode = json_decode($data->attendance);
       return view('edit',compact('data','decode'));

    }
    public function update(Request $request, $id){
        $data = Attendance::find($id);
        $data->sector = $request->sector;
        $data->shift = $request->shift;
        $data->attendance = json_encode($request->attendance);
        $data->date = $request->date;
        $data->status = $request->status;
        $data->update();
        return redirect()->route('sore.list');
    }
    public function searchByEmpId(Request $request){
//        $data_d = Attendance::find(1);
//        $data = json_decode($data_d->attendance);
//        $shamimData = collect($data)->where('shamim')->first();

        $data_d = Attendance::find(1); // Replace 1 with the actual ID you are querying

        if ($data_d) {
            $data = json_decode($data_d->attendance, true); // Convert JSON to associative array
            $shamimData = collect($data)->get('shamim');

            // $shamimData now contains the data for "shamim" if it exists
            if ($shamimData) {
                // Do something with $shamimData
                dd($shamimData);
            } else {
                // "shamim" data not found
                dd('shamim data not found');
            }
        } else {
            // Record not found
            dd('Record not found');
        }
    }
}
