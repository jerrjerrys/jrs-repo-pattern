<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div>
    <a href="{!! url('store') !!}" > Back </a>

    @foreach ($errors->all() as $error)
        <p class="error">{{ $error }}</p>
    @endforeach

    {!! Form::open([ 'url' => 'store/crud-store', 'method' => 'POST' ]) !!}
    <input type="hidden" name="id" value="{!! $model->id or NULL !!}" /><br/>
    <select name="user_id">
        @foreach($data['users'] as $key => $value)
            <option value="{!! $value->id !!}" {!! isset($model) ? $model->user_id == $value->id ? 'selected' : NULL : NULL !!}> {!! $value->name !!}</option>
        @endforeach
    </select><br/>
    <input type="text" placeholder="Store Name" name="store_name" value="{!! $model->store_name or NULL !!}" /><br/>
    <input type="radio" name="status" value="active" {!! isset($model) ? $model->status == 'active' ? 'checked' : NULL : NULL !!} > Active
    <input type="radio" name="status" value="not-active" {!! isset($model) ? $model->status == 'not-active' ? 'checked' : NULL : NULL !!} > Not Active<br/>
    <input type="submit" value="Submit !" />
    {!! Form::close() !!}
</div>
</body>
</html>