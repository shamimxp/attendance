<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="card">
            <form action="{{route('sore.update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">sector:</label>
                        <input type="text" class="form-control" id="sector" placeholder="Enter sector" name="sector" value="{{$data->sector}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="shift" class="form-label">shift:</label>
                        <input type="text" class="form-control" id="shift" placeholder="Enter shift" name="shift" value="{{$data->shift}}">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date:</label>
                        <input type="date" class="form-control" id="" placeholder="Enter date" name="date" value="{{$data->date}}">
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">status:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter date" name="status" value="{{$data->status}}">
                    </div>
                </div>
                <hr>
                <div class="container mt-3">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>EmployeeId</th>
                            <th>Attendance_type</th>
                            <th>InTime</th>
                            <th>OutTime</th>
                            <th>Meditation</th>
                            <th>Present/Absent</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($decode as $key => $standard)
                        <tr>
                            <td>{{$key}}</td>
                            <input type="hidden" name="attendance[{{$key}}]" value="{{$key}}">
                            <td><input type="text" name="attendance[{{$key}}][attendance_type]"  value="{{$standard->attendance_type}}" class="form-control" placeholder="data for attendance_type" autocomplete="off"></td>
                            <td><input type="text" name="attendance[{{$key}}][intime]" value="{{$standard->intime}}" class="form-control" placeholder="data for intime" autocomplete="off"></td>
                            <td><input type="text" name="attendance[{{$key}}][outtime]" value="{{$standard->outtime}}" class="form-control" placeholder="data for outtime" autocomplete="off"></td>
                            <td><input type="text" name="attendance[{{$key}}][meditation]" value="{{$standard->meditation}}" class="form-control" placeholder="data for meditation" autocomplete="off"></td>
                            <td><input type="text" name="attendance[{{$key}}][present]" value="{{$standard->present}}" class="form-control" placeholder="data for  present" autocomplete="off"></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>
