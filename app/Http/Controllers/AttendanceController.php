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
    public function search(){
        return view('search');
    }
    public function searchByEmpId(Request $request)
    {
        // Get all attendance data
        $attendanceData = Attendance::all();
        // Initialize an array to store Shamim's data
        $shamimData = [];
        // Loop through the attendance data
        foreach ($attendanceData as $attendance) {
            // Decode the JSON string for the 'attendance' key
            $attendanceDataArray = json_decode($attendance->attendance, true);
            // Check if 'shamim' key exists
            if (isset($attendanceDataArray[$request->search_data])) {
                // Add 'shamim' data to the result array
                $shamimData[] = $attendanceDataArray[$request->search_data];
            }else{
                return "data not found";
            }
        }

        // Dump and die to inspect the result
        dd($shamimData);
    }


}



//        $data_d = Attendance::find(1);
//        $data = json_decode($data_d->attendance);
//        $shamimData = collect($data)->where('shamim')->first();
//        $data_d = Attendance::find($request->search_data); // Replace 1 with the actual ID you are querying
//         dd($data_d);
//        if ($data_d) {
//            $data = json_decode($data_d->attendance, true);
//            $shamimData = collect($data)->get('$s');
//            if ($shamimData) {
//                dd($shamimData);
//            } else {
//                dd('shamim data not found');
//            }
//        } else {
//            dd('Record not found');
//        }
