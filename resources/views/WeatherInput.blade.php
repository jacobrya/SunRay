<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Узнать погоду</title>
</head>
<body>
<h1>Узнать погоду в городе</h1>
<form action="{{ route('weather.get') }}" method="post">
    @csrf
    <label for="city">Город:</label>
    <input type="text" id="city" name="city" required>
    <button type="submit">Узнать погоду</button>
</form>

</body>
</html>
