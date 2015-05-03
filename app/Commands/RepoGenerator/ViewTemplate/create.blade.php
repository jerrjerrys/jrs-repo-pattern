<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div>
    <a href="{!! url({{_REDIRECTBACT_}}) !!}" > Back </a>

    @foreach ($errors->all() as $error)
        <p class="error">{{ $error }}</p>
    @endforeach

    {!! Form::open([ 'url' => '{{_OBJECTINSTANCE_}}/crud-{{_OBJECTINSTANCE_}}', 'method' => 'POST' ]) !!}
    <input type="hidden" name="id" value="{!! $model->id or NULL !!}" /><br/>
    {{_FIELDS_}}
    <input type="submit" value="Submit !" />
    {!! Form::close() !!}
</div>
</body>
</html>