# 🌤️ Weather App

A Laravel-based web application that fetches real-time weather data by city name using the OpenWeatherMap API, with Redis caching to minimize redundant API calls.

---

## 🚀 Features

- Search weather by city name
- Displays temperature, feels like, humidity, wind speed, and description
- Redis caching with 30-minute TTL to avoid hitting API rate limits
- Form validation with custom error messages
- Error handling and logging for failed API requests

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.2 / Laravel 11 |
| Caching | Redis (via Predis) |
| External API | OpenWeatherMap API |
| Frontend | Blade Templates |
| HTTP Client | Laravel Http (Guzzle) |

---


## ⚙️ Installation

**1. Clone the repository**
```bash
git clone https://github.com/yourusername/weather-app.git
cd weather-app
```

**2. Install dependencies**
```bash
composer install
```

**3. Set up environment**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Configure `.env`**
```env
OPENWEATHER_API_KEY=your_api_key_here

CACHE_DRIVER=redis
REDIS_CLIENT=predis
REDIS_HOST=127.0.0.1
REDIS_PORT=6379
REDIS_PASSWORD=null
```

**5. Run the application**
```bash
php artisan serve
```

Visit `http://localhost:8000/weather`

---

## 🔄 How It Works

```
User enters city
      ↓
Check Redis cache
      ↓
   HIT? ──── YES ──→ Return cached data instantly (1-2ms)
      │
     NO
      ↓
Request OpenWeatherMap API (~200-500ms)
      ↓
Store response in Redis for 30 minutes
      ↓
Return data to user
```

---

## 🌐 API Endpoints

| Method | URL | Description |
|---|---|---|
| GET | `/weather` | Show search form |
| POST | `/weather` | Get weather for city |

---

## 📝 Environment Variables

| Variable | Description |
|---|---|
| `OPENWEATHER_API_KEY` | Your OpenWeatherMap API key |
| `CACHE_DRIVER` | Set to `redis` |
| `REDIS_CLIENT` | Set to `predis` |
| `REDIS_HOST` | Redis server host |
| `REDIS_PORT` | Redis server port (default: 6379) |

Get your free API key at [openweathermap.org](https://openweathermap.org/api)

---
