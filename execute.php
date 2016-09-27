<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

function getSentence($values)
{
	$words = explode(" ", $values);
	$files = glob('./*.txt');
	$thefile = "";
	foreach ($words as $w)
	{
		//echo "searching  ./$w.txt";
		if (in_array("./$w.txt", $files, true)) {
			$thefile = "./$w.txt";
			break;			
		}
	}
	if ($thefile=="") return "";
	else
	{
	$lines = file($thefile);
	$random = rand (0, count($lines)-1);
	return $lines[$random];
	}
}

function addSentence($keyword,$sentence)
{
	$thefile="./$keyword.txt";
	$toadd = "\n$sentence";
	$myfile = file_put_contents($thefile, $sentence.PHP_EOL , FILE_APPEND | LOCK_EX);
}

function getKeyWords()
{
	$files = glob('./*.txt');
	$toret="";
	foreach ($files as $f)
	{
		$toret=$toret . "- $f\n";
	}
	$toret = str_replace("./", "", $toret);
	$toret = str_replace(".txt", "", $toret);
	
	return $toret;
}

function getSentences($keyword)
{
	$files = glob('./*.txt');
	$thefile = "";	
	$thefile = "./$keyword.txt";
	$lines = file($thefile);
	$toret="";
	foreach ($lines as $f)
	{
		$toret=$toret . "- $f";
	}
	return $toret;
}

function mergeKeyWords($keys)
{
	$sentences=[];
	$files = glob('./*.txt');
	$toret="Merge Done!";
	foreach ($keys as $w)
	{
		if (in_array("./$w.txt", $files, true)) {
			echo "TROVATO";
			$thefile = "./$w.txt";
			$lines = file($thefile);
			print_r($lines);
			foreach ($lines as $line)
			{
				echo "$line\n";
				if (in_array($line,$sentences,true))
				{
					//echo "DONOTHING";
				}
				else
				{
					array_push($sentences,$line);
				}
			}
		}
	}
	print_r($sentences);
	echo count($sentences);
	if (count($sentences)===0)
		$toret = "Not existing Keywords";
	else {
			foreach ($keys as $w)
			{
				$thefile = "./$w.txt";
				file_put_contents($thefile, "");
				foreach ($sentences as $sent)
				{
					$sent = preg_replace('~[\r\n]+~', '', $sent);
				$myfile = file_put_contents($thefile, $sent.PHP_EOL , FILE_APPEND | LOCK_EX);
			}
		}
	}
	return $toret;
}



if(!$update)
{
	//echo getSentences("ivan");
	//echo getKeyWords();
	//echo getSentence("ivan");
	//echo addSentence("ivan","vomito");
	$casso =  mergeKeyWords(["t","y"]);
	echo "\nOHI\n";
	echo $casso;
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
$command = false;






if (stristr($text, '/add') !== false)
{
	$words = explode(" ", $text);
	if (count($words)!=3) 
	{
		$reply = true;
		$command = true;
		$tosend = "add command needs 2 parameter, the keyword and the sentence!";
	}
	else
	{
		addSentence($words[1],$words[2]);
		$reply = true;
		$command = true;
		$tosend = "add sentence $words[2] with keyword $words[1]";
	}
}

if (stristr($text, '/keys') !== false)
{
	$words = explode(" ", $text);
	if (count($words)!=1) 
	{
		$reply = true;
		$command = true;
		$tosend = "keys command needs 0 parameter!";
	}
	else
	{
		addSentence($words[1],$words[2]);
		$reply = true;
		$command = true;
		$tosend = getKeyWords();
	}
}


if (stristr($text, '/merge') !== false)
{
	$words = explode(" ", $text);
	$keystomerge = ["",""];
	if (count($words)!=3) 
	{
		$reply = true;
		$command = true;
		$tosend = "add command needs 2 parameter, two keywords to merge!";
	}
	else
	{
		$keystomerge = [$words[1],$words[2]];
		$reply = true;
		$command = true;
		$tosend = mergeKeyWords($keystomerge);
	}
}

if (stristr($text, '/sentences') !== false)
{
	$words = explode(" ", $text);
	$keystomerge = ["",""];
	if (count($words)!=2) 
	{
		$reply = true;
		$command = true;
		$tosend = "add command needs 1 parameter, two keyword!";
	}
	else
	{
		$reply = true;
		$command = true;
		$tosend = getSentences($words[1]);
	}
}

if ($command==false)
{
	$reply = true;
	$tosend = getSentences($text);
}



if ($reply==true)
{
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => $tosend);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
}
