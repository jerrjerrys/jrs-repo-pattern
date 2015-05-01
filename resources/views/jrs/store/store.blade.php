<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div>
    <a href="{!! url('store/create-store') !!}"> Create </a>
    <table width="100%">
        <thead>
        <tr>
            <th>Owner</th>
            <th>Store Name</th>
            <th>Satus</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($model as $key => $value)
            <tr>
                <td align="center">{!! $value->users->name or NULL !!}</td>
                <td align="center">{!! $value->store_name or NULL !!}</td>
                <td align="center">{!! $value->status or NULL !!}</td>
                <td align="center">
                    <a href="{!! url('store/show/'.$value->id) !!}">Edit</a>
                    <a href="{!! url('store/remove/'.$value->id) !!}">Remove</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>