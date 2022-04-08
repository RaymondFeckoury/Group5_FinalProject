<?php
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://zenquotes.io/api/quotes/");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    echo $output;
    curl_close($curl);
?>