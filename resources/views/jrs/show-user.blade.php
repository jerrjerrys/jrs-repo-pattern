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
    <input type="hidden" name="id" value="{!! $model->id !!}" /><br/>
    <input type="text" placeholder="Name" name="name" value="{!! $model->name or NULL !!}" /><br/>
    <input type="text" placeholder="Email" name="email" value="{!! $model->email or NULL !!}" /><br/>
    <input type="text" placeholder="Image" name="image" value="{!! $model->image or NULL !!}" /><br/>

    <select name="status">
        @foreach(['active'=>'Active', 'not-active'=>'Not Active'] as $key => $value)
            <option value="{!! $key !!}" {!! $model->status == $key ? 'selected' : NULL !!}> {!! $value !!}</option>
        @endforeach
    </select><br/>
    <input type="submit" value="Submit !" />
    {!! Form::close() !!}
</div>
</body>
</html>