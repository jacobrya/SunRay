{{-- resources/views/weather/input-city.blade.php --}}
    <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Узнать погоду</title>
</head>
<body>
<h1>Узнать погоду в городе</h1>

<form action="{{ route('weather.get') }}" method="POST">
    @csrf
    <input
        type="text"
        name="city"
        placeholder="Введите город"
        value="{{ old('city') }}"
        required
    >
    <button type="submit">Узнать погоду</button>

    @error('city')
    <div style="color: red;">{{ $message }}</div>
    @enderror
</form>
</body>
</html>
