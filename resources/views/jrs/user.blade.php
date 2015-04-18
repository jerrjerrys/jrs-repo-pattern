<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div>
    <a href="{!! url('create-user') !!}"> Create </a>
    <table width="100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($model as $key => $value)
            <tr>
                <td align="center">{!! $value->name or NULL !!}</td>
                <td align="center">{!! $value->email or NULL !!}</td>
                <td align="center">{!! $value->image or NULL !!}</td>
                <td align="center">{!! $value->status or NULL !!}</td>
                <td align="center">
                    <a href="{!! url('show/'.$value->id) !!}">Edit</a>
                    <a>Remove</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>