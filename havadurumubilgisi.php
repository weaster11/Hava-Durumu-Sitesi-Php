<?php
// OpenWeatherMap API Anahtarı
$apiKey = "YOUR_API_KEY"; // Buraya kendi API anahtarınızı ekleyin
$city = "Istanbul"; // Şehri dinamik hale getirebilirsiniz
$apiUrl = "http://api.openweathermap.org/data/2.5/weather?q={$city},TR&appid={$apiKey}&units=metric&lang=tr";

// API'den verileri çekme
$weatherData = file_get_contents($apiUrl);

// Verileri JSON formatında decode etme
$weatherArray = json_decode($weatherData, true);

// Eğer API verisi doğru dönerse ekrana yazdır
if ($weatherArray['cod'] == 200) {
    echo "Şehir: " . $weatherArray['name'] . "<br>";
    echo "Sıcaklık: " . $weatherArray['main']['temp'] . "°C<br>";
    echo "Hava Durumu: " . $weatherArray['weather'][0]['description'] . "<br>";
    echo "Nem: " . $weatherArray['main']['humidity'] . "%<br>";
    echo "Rüzgar Hızı: " . $weatherArray['wind']['speed'] . " m/s<br>";
} else {
    echo "Hava durumu bilgisi alınamadı.";
}
?>
