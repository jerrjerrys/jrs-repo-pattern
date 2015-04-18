<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    {!! Form::open([ 'url' => 'create-user', 'method' => 'POST' ]) !!}
        <input type="text" placeholder="Name" name="name" /><br/>
        <input type="password" placeholder="Password" name="password" /><br/>
        <input type="text" placeholder="Email" name="email" /><br/>
        <input type="text" placeholder="Image" name="image" /><br/>
        <input type="text" placeholder="Status" name="status" /><br/>
        <input type="submit" value="Submit !" />
    {!! Form::close() !!}
</body>
</html>