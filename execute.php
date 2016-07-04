<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}



$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$text = trim($text);
$text = strtolower($text);
$tosent = "";
$reply = false;
	
if (stristr($text, 'ivan') !== false)
{
	$tosend = "Chi? Il paracarro di merda?";
	$reply = true;
}

if (strpos($text, 'francesco') !== false)
{
	$tosend = "Chi? Quello delle lucette del teatro del cazzo?";
	$reply = true;
}
if (strpos($text, 'valentina') !== false)
{
	$tosend = "Valentina, è pronta o no la funzione della funzione di trasferimento del 5° ordine misurata con il righello?";
	$reply = true;
}
if (strpos($text, 'villi') !== false)
{
	$tosend = "Villi, è pronto il vision fit? Gli occhiali? Il 2Win? Il caffè?";
	$reply = true;
}

if (strpos($text, '*') !== false)
{
	$tosend = "Solo io sono il DIO degli ****!!!";
	$reply = true;
}
if (strpos($text, 'mattia') !== false)
{
	$tosend = "Orbo, sbrigati a fare lo zip con il manuale dentro! Anzi fuori! No dentro!";
	$reply = true;
}


if ($reply==true)
{
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $tosend);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
}
