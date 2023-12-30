<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
    <h2>Basic Table</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Sector</th>
            <th>shift</th>
            <th>date</th>
            <th>status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $value)
            <tr>
                <td>{{$value->sector ?? ' '}}</td>
                <td>{{$value->shift ?? ' '}}</td>
                <td>{{$value->date ?? ' '}}</td>
                <td>{{$value->status ?? ' '}}</td>
                <td>
                    <a href="{{route('sore.edit',$value->id)}}" class="form-control">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
