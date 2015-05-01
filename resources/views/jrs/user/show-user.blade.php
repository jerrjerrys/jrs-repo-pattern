<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div>
    <a href="{!! url('/user') !!}" > Back </a>

    @foreach ($errors->all() as $error)
        <p class="error">{{ $error }}</p>
    @endforeach

    {!! Form::open([ 'url' => 'user/crud-user', 'method' => 'POST' ]) !!}
    <input type="hidden" name="id" value="{!! $model->id !!}" /><br/>
    <input type="text" placeholder="Name" name="name" value="{!! $model->name or NULL !!}" /><br/>
    <input type="text" placeholder="Email" name="email" value="{!! $model->email or NULL !!}" /><br/>
    <input type="text" placeholder="Image" name="image" value="{!! $model->image or NULL !!}" /><br/>

    <input type="radio" name="status" value="active" {!! isset($model) ? $model->status == 'active' ? 'checked' : NULL : NULL !!} > Active
    <input type="radio" name="status" value="not-active" {!! isset($model) ? $model->status == 'not-active' ? 'checked' : NULL : NULL !!} > Not Active<br/>

    <input type="submit" value="Submit !" />
    {!! Form::close() !!}
</div>
</body>
</html>