<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>Error! Please contact the administrator!<br>
    <hr>
    <p>Error message: {{ $errorMessage }}</p>
    <br>
    <hr>
    <a href="{{ route('login') }}">Back to login</a></div>
</body>
</html>