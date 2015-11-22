<?php
$device_token="APA91bHr8dX1RWuAAR2RtkCqW2NPVYWIeW0oN8lpQvEMwH09N0yNOSZFklv-RQkjvQJ1fPx4stsTDWsDBb_PzUpyYdsp9zhoGB5U7LpTNK7Lq2NLjyuof12Q8tZhq0LJaO15yw2DbW5m";
$poruka = "poruka";
$url = 'http://push.ionic.io/api/v1/push';
$data = array(
                  'tokens' => array($device_token), 
                  'notification' => array('alert' => $poruka),    
                  );
      
$content = json_encode($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
curl_setopt($ch, CURLOPT_USERPWD, "f01093e8efff69a706583c92701cbcd0a007ecbb84598b5b" . ":" );  
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'X-Ionic-Application-Id: 9ee26f42' 
));
$result = curl_exec($ch);
curl_close($ch);