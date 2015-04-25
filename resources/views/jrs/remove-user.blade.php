<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div>

    {!! Form::open([ 'url' => 'crud-user', 'method' => 'POST' ]) !!}
    <input type="hidden" name="id" value="{!! $model->id !!}" /><br/>
    <input type="hidden" name="DELETE" value="TRUE" /><br/>
    Name : <b>{!! $model->name or NULL !!}</b><br/>
    Email : <b>{!! $model->email or NULL !!}</b><br/>
    Image : <b>{!! $model->image or NULL !!}</b><br/>

    <input type="submit" value="Remove !" />

    {!! Form::close() !!}
</div>
</body>
</html>