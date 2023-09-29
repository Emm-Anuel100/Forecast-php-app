<?php

# go to https://api.openweathermap.org 
# get an api key
# here i made use of the free plan
# APPID should be the api key

if (isset($_GET["city"]) && (!empty($_GET["city"]))) {
   # code...
   $apiData =  file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&APPID= ## Api key here ## ");

   $weatherArray = json_decode($apiData, true); //convert the JSON object to php

     // c = k - 273.15
     // convert kelvin to celcius
     $tempCelcius = $weatherArray['main']['temp'] - 273;

   }

?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Weather Forecast App</title>
   <link rel="stylesheet" href="./forecast.css">
</head>
<body>
   <header>
      <h2>
         <a href="./index.php">🔙</a>  
      </h2>
   </header>
   <section class="wrapper">
      <section class="con">
      <h4>Check forecast with <span>ease</span></h4>
         <br/><br/>

         <form action="./Forecast_Action.php" method="get">
            <input type="search" name="city" placeholder="Enter city name ..." required="">
         </form>
         <br/><br/>

         
         <div class="output">
           <span class="img">
            <img src="./cloud-unscreen.gif" alt="gif">
            <img src="./cloud-unscreen.gif" alt="gif">
            <img src="./cloud-unscreen.gif" alt="gif">
           </span>
           <p class="details">
           <?php
             printf($weather = $weatherArray['name']. ", ".$weatherArray['sys']['country']);
           ?>
           </p>
           <p class="climate">
            <?php
            printf(intval($tempCelcius)."&deg;C");
            ?>
           </p>
           <br/>
           <span class="img">
            <img src="./cloud-unscreen.gif" alt="gif">
            <img src="./cloud-unscreen.gif" alt="gif">
           </span>
           <p class="details">
            Weather Condition:
           </p>
           <p class="climate">
           <?php
            printf($weatherArray['weather']['0']['description']);
            ?>
           </p>
           <br/>
           <span class="img">
            <img src="./cloud-unscreen.gif" alt="gif">
            <img src="./cloud-unscreen.gif" alt="gif">
            <img src="./cloud-unscreen.gif" alt="gif">
           </span>
           <p class="details">
           Atmospheric pressure: 
           </p>
           <p class="climate">
           <?php
           printf($weatherArray['main']['pressure']." hPa");
           ?>
           </p>
           <br/>
           <span class="img">
            <img src="./cloud-unscreen.gif" alt="gif">
            <img src="./cloud-unscreen.gif" alt="gif">
           </span>
           <p class="details">
            Wind speed: 
           </p>
           <p class="climate">
            <?php
            printf($weatherArray['wind']['speed']. " m/s");
            ?>
           </p>
           <br/>
           <span class="img">
            <img src="./cloud-unscreen.gif" alt="gif">
            <img src="./cloud-unscreen.gif" alt="gif">
            <img src="./cloud-unscreen.gif" alt="gif">
           </span>
           <p class="details">
            Cloudness: 
           </p>
           <p class="climate">
           <?php
            echo($weatherArray['clouds']['all']. " %");
            ?>
           </p>
           </p>
           <br/>
           <span class="img">
            <img src="./cloud-unscreen.gif" alt="gif">
            <img src="./cloud-unscreen.gif" alt="gif">
            <img src="./cloud-unscreen.gif" alt="gif">
           </span>
           <p class="details">
            Sunrise: 
           </p>
           <p class="climate">
            <?php
             $sunrise = $weatherArray['sys']['sunrise'];
             echo(date("g:i a", $sunrise));
            ?>
           </p>
         </div>
      </section>
   </section>
</body>
</html>
