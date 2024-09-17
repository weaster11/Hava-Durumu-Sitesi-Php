<?php
// Türkiye'deki bazı iller
$cities = ["Istanbul", "Ankara", "Izmir", "Antalya", "Bursa"];

// Seçilen şehri al
if (isset($_GET['city'])) {
    $city = $_GET['city'];
} else {
    $city = "Istanbul"; // Varsayılan şehir
}

$apiKey = "YOUR_API_KEY";
$apiUrl = "http://api.openweathermap.org/data/2.5/weather?q={$city},TR&appid={$apiKey}&units=metric&lang=tr";
$weatherData = file_get_contents($apiUrl);
$weatherArray = json_decode($weatherData, true);

if ($weatherArray['cod'] == 200) {
    echo "<h2>" . $city . " Hava Durumu</h2>";
    echo "Sıcaklık: " . $weatherArray['main']['temp'] . "°C<br>";
    echo "Hava Durumu: " . $weatherArray['weather'][0]['description'] . "<br>";
    echo "Nem: " . $weatherArray['main']['humidity'] . "%<br>";
    echo "Rüzgar Hızı: " . $weatherArray['wind']['speed'] . " m/s<br>";
} else {
    echo "Hava durumu bilgisi alınamadı.";
}

// Şehir seçimi için form
echo "<h3>Şehir Seç</h3>";
echo "<form method='get'>";
echo "<select name='city'>";
foreach ($cities as $cityOption) {
    echo "<option value='{$cityOption}'" . ($city == $cityOption ? " selected" : "") . ">{$cityOption}</option>";
}
echo "</select>";
echo "<button type='submit'>Hava Durumunu Getir</button>";
echo "</form>";
?>
