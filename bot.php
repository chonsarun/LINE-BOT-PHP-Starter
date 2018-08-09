<?php
$access_token ='ebHgaWHad9MEebPK+IZ9h/fewvrhPd+XgE8WQ+sZrSNvAbviE6qLzSdHpL6NPIqZtjU0g22dZ9HV9Am0u2eHF47Zx4v9eAmsu0+rw6Ksggn8blQwBhhxewvDImWgzEaFvyqr59+y5BR0FxQXtPf9SAdB04t89/1O/w1cDnyilFU=';
$text1 ="";
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			if(stripos($text, "ไฟดับ") !== false){
				
				$text ="สวัสดีครับ เราได้รับแจ้งเหตุที่ท่านแจ้งแล้วครับ";
				$replyToken = $event['replyToken'];
				// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
			}//end if คู่มือ
			

			
		}
	}
}
echo "OK";
