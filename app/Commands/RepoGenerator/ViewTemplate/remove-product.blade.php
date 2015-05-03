<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div>
    <a href="{!! url('product') !!}" > Back </a>

    {!! Form::open([ 'url' => 'product/crud-product', 'method' => 'POST' ]) !!}
    <input type="hidden" name="id" value="{!! $model->id !!}" /><br/>
    <input type="hidden" name="DELETE" value="TRUE" /><br/>
    Store : <b>{!! $model->stores->store_name or NULL !!}</b><br/>
    Product Name : <b>{!! $model->product_name or NULL !!}</b><br/>

    <input type="submit" value="Remove !" />

    {!! Form::close() !!}
</div>
</body>
</html>