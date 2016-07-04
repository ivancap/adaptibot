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
//commento di prova	
if (stristr($text, 'ivan') !== false)
{
	$tosend = "Chi? Il paracarro di merda?";
	$reply = true;
}

if (stristr($text, 'bug') !== false)
{
	$tosend = "ah perchè non è già stato corretto ieri?";
	$reply = true;
}

if (stristr($text, 'caffè') !== false or stristr($text, 'caffe') !== false or stristr($text, 'coffee') !== false)
{
	$tosend = "COOOOOOSA!!!! Ai miei tempi avevamo una bombola da 33 cl di aria al giorno da respirare e tu vuoi un caffè?????";
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
if (strpos($text, 'buongiorno') !== false)
{
	$tosend = "non lo sarà!";
	$reply = true;
}
if (strpos($text, 'sebastiano') !== false)
{
	$tosend = "a qualcuno interessa? http://www.ebay.it/itm/SALDATORE-A-STILO-STAGNO-STAGNATORE-60W-SALDA-SALDATRICE-ELETTRONICA-PRECISIONE-/321790233879?hash=item4aec314d17:g:uUMAAOSwHnFViZHt";
	$reply = true;
}
if (strpos($text, 'gianfranco') !== false)
{
	$tosend = "Qualcuno lo chiami che è qui DHL";
	$reply = true;
}
if (strpos($text, 'funziona') !== false)
{
	$tosend = "se funziona è grazie ai software man!";
	$reply = true;
}
if (strpos($text, 'non funziona') !== false)
{
	$tosend = "colpa degli elettronici!";
	$reply = true;
}
if (strpos($text, 'rotto') !== false)
{
	$tosend = "ha sfranzato?";
	$reply = true;
}
if (strpos($text, '2win') !== false)
{
	$tosend = "ma che versione? la 4.1.86238746128936?";
	$reply = true;
}
if (strpos($text, 'visionfit') !== false)
{
	$tosend = "muovetevi che ne devono uscire altri quattro.... entro ieri";
	$reply = true;
}
if (strpos($text, 'impossibile') !== false)
{
	$tosend = "è solo perchè non hai voglia, ai miei tempi con un 486 mandavo gli uomini sulla luna";
	$reply = true;
}
if (strpos($text, 'quando') !== false)
{
	$tosend = "era per ieri!";
	$reply = true;
}
if (strpos($text, 'cacca') !== false)
{
	$tosend = "se devi andare in bagno, vai su quello delle donne, perchè nell'altro di sicuro c'è Villi!";
	$reply = true;
}
if (strpos($text, 'dove') !== false)
{
	$tosend = "Se cerchi qualcosa, cerca nella scrivania di Seba o di Alessandro!";
	$reply = true;
}
if (strpos($text, 'gianfranco') !== false)
{
	$tosend = "Ricorda la regola delle 10: nessuna interazione prima di allora, se vuoi sopravvivere!";
	$reply = true;
}
if (strpos($text, 'il software non funziona') !== false)
{
	$tosend = "IMPOSSIBILE!";
	$reply = true;
}
if (strpos($text, 'la misura') !== false)
{
	$tosend = "hai controllato che non fosse fuori fuoco?!";
	$reply = true;
}


if ($reply==true)
{
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $tosend);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
}
