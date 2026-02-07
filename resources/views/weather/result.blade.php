{{-- resources/views/weather/result.blade.php --}}
    <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Погода в {{ $city }}</title>
</head>
<body>
<h1>Погода в {{ $city }}</h1>

<div>
    <p>Температура: {{ $weather['main']['temp'] }}°C</p>
    <p>Ощущается как: {{ $weather['main']['feels_like'] }}°C</p>
    <p>Описание: {{ $weather['weather'][0]['description'] }}</p>
    <p>Влажность: {{ $weather['main']['humidity'] }}%</p>
    <p>Скорость ветра: {{ $weather['wind']['speed'] }} м/с</p>
</div>

<a href="{{ route('weather.form') }}">Проверить другой город</a>
</body>
</html>
