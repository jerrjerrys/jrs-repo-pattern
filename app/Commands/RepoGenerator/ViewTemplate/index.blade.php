<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div>
    LANJUUUUUUUUUUUT
    <a href="{!! url() !!}"> Create </a>
    <table width="100%">
        <thead>
        <tr>
            <th>Store</th>
            <th>Product Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($model as $key => $value)
            <tr>
                <td align="center">{!! $value->stores->store_name or NULL !!}</td>
                <td align="center">{!! $value->product_name or NULL !!}</td>
                <td align="center">
                    <a href="{!! url('product/show/'.$value->id) !!}">Edit</a>
                    <a href="{!! url('product/remove/'.$value->id) !!}">Remove</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>