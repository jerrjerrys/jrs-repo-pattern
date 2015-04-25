<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div>
    @foreach ($errors->all() as $error)
        <p class="error">{{ $error }}</p>
    @endforeach

    {!! Form::open([ 'url' => 'crud-user', 'method' => 'POST' ]) !!}
    <input type="hidden" name="id" value="{!! $model->id or NULL !!}" /><br/>
    <input type="text" placeholder="Name" name="name" value="{!! $model->name or NULL !!}" /><br/>
    <input type="text" placeholder="Email" name="email" value="{!! $model->email or NULL !!}" /><br/>
    <input type="password" placeholder="Password" name="password" value="{!! $model->password or NULL !!}" /><br/>
    <input type="text" placeholder="Image" name="image" value="{!! $model->image or NULL !!}" /><br/>
    <input type="hidden" name="status" value="not-active"/><br/>
    <input type="submit" value="Submit !" />
    {!! Form::close() !!}
</div>
</body>
</html>