<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceRequest;
use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    public function index()
    {
        $attendances = Attendance::latest()->paginate(20);
        if($attendances->isEmpty()){
            return response()->json(['message' => 'No attendance found'], 200);
        }
        return AttendanceResource::collection($attendances);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttendanceRequest $request)
    {
//        dd($request->all());
        $attendance = new Attendance();
        $attendance->sector = $request->sector;
        $attendance->shift = $request->shift;
        $attendance->attendance = json_encode($request->attendance);
        $attendance->date = $request->date;
        $attendance->status = $request->status;
        $attendance->save();
        return response()->json([
            'message' => 'Attendance created successfully',
            'data' => new AttendanceResource($attendance),
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attendance = Attendance::find($id);
        if (!$attendance) {
            return response()->json(['message' => 'Attendance not found'], 404);
        }

        return new AttendanceResource($attendance);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attendance = Attendance::find($id);
        $attendance->sector = $request->sector;
        $attendance->shift = $request->shift;
        $attendance->attendance = json_encode($request->attendance);
        $attendance->date = $request->date;
        $attendance->status = $request->status;
        $attendance->update();
        return response()->json([
            'message' => 'Attendance Update successfully',
            'data' => new AttendanceResource($attendance),
        ],200);
    }

    public function destroy(string $id)
    {
        $attendance = Attendance::find($id);
        $attendance->delete();
        return response()->json([
            'message' => 'Attendance Delete successfully',
        ],200);
    }
}
