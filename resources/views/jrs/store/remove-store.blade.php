<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div>
    <a href="{!! url('store') !!}" > Back </a>

    {!! Form::open([ 'url' => 'store/crud-store', 'method' => 'POST' ]) !!}
    <input type="hidden" name="id" value="{!! $model->id !!}" /><br/>
    <input type="hidden" name="DELETE" value="TRUE" /><br/>
    Owner : <b>{!! $model->users->name or NULL !!}</b><br/>
    Store Name : <b>{!! $model->store_name or NULL !!}</b><br/>

    <input type="submit" value="Remove !" />

    {!! Form::close() !!}
</div>
</body>
</html>