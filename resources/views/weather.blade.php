<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Weather App') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">





                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <section>
        <form method="post">
            <h1>The Weather App</h1>
            <input class="tavamama" type="text" name="city" id="">
            <input name="submit" type="submit" value="Check Weather">
        </form>
        <?php

        if (isset($_POST["submit"])) {
            if (empty($_POST["city"])) {
                echo "Ievadi pilsētas nosaukumu:";
            } else {
                $city = $_POST["city"];
                $api_key = "e960cbd78291fac833ef8131d079e182";
                $api = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$api_key";
                $api_data = file_get_contents($api);
                $weather = json_decode($api_data, true);

                $wind = $weather["wind"]["speed"] * 1.609344;
                $celcius = $weather["main"]["temp"] - 273;

                echo $weather["weather"][0]["main"] . " - " . $weather["weather"][0]["description"];
                echo "<br>";
                echo "Warmth - " . $celcius . "degrees celcius";
                echo "<br>";
                echo "Wind speed - " . $wind . "km/h";
                echo "<br>";
                echo "Humidity - " . $weather["main"]["humidity"] . "%";
            }
        }


        ?>
    </section>
</body>

</html>