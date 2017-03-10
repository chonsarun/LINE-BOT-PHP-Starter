<?php
 $access_token = 'gwzLA4l39L9m+2622e2/+aX6nwDLLl/Xwe98wiz3VY3a7pi0soN2a2pDKlHbmvF7Jn/L3Q0uCdFK0ImHBkzbMOMvNETfvvquw0jQVTkOwQPgLzCBLES92k7DiinRwS+Q1j7eRMiKOKFLEpDZ8pAG2gdB04t89/1O/w1cDnyilFU=';

  $url = 'https://api.line.me/v1/oauth/verify';

    $headers = array('Authorization: Bearer ' . $access_token);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    echo $result;
  ?>
