<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div>
    <a href="{!! url('product') !!}" > Back </a>

    @foreach ($errors->all() as $error)
        <p class="error">{{ $error }}</p>
    @endforeach

    {!! Form::open([ 'url' => 'product/crud-product', 'method' => 'POST' ]) !!}
    <input type="hidden" name="id" value="{!! $model->id or NULL !!}" /><br/>
    <input type="text" placeholder="Product Name" name="product_name" value="{!! $model->product_name or NULL !!}" /><br/>
    <select name="store_id">
        @foreach($data['stores'] as $key => $value)
            <option value="{!! $value->id !!}" {!! isset($model) ? $model->store_id == $value->id ? 'selected' : NULL : NULL !!}> {!! $value->store_name !!}</option>
        @endforeach
    </select><br/>
    <input type="submit" value="Submit !" />
    {!! Form::close() !!}
</div>
</body>
</html>