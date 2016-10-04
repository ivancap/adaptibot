<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
$disableSync=0;


function syncFTPdown(){
	if ($disableSync) return -1;
	$sinkOk = true;
	$files = glob('./*.txt');
	if (count($files)!=0) return -1;
	
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => "Aspetta che mi ripiglio..");
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
	
	$ftp_server = "ftp.drivehq.com";
	$ftp_user_name = "proprioivan@yahoo.it";
	$ftp_user_pass = "ciaociao";
	$conn_id = ftp_connect($ftp_server);
	// login with username and password
	$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
	if ($login_result==1){
		ftp_pasv($conn_id, true);
		echo "RESULTS:";
		$contents = ftp_nlist($conn_id, "");
		print_r($contents);
		foreach ($contents as $file) {
   		 	$local_file = $file;
   		 	$server_file = $file;
   		 	$sinkOk = $sinkOk & ftp_get($conn_id, $local_file, $server_file, FTP_BINARY);
		}
	}
// output $contents
	ftp_close($conn_id);
	return $sinkOk;
}

function syncFTPup(){
	if ($disableSync) return -1;
	
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => "Zio boja quanto lavoro...");
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
	
	$ftp_server = "ftp.drivehq.com";
	$ftp_user_name = "proprioivan@yahoo.it";
	$ftp_user_pass = "ciaociao";
	$conn_id = ftp_connect($ftp_server);
	// login with username and password
	$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
	$sinkOk = true;
	if ($login_result==1){
		ftp_pasv($conn_id, true);
		echo "RESULTS:";
		$files = glob('./*.txt');
		print_r($files);
		foreach ($files as $file) {
   		 	$local_file = substr($file, 2); 
   		 	$server_file = substr($file, 2); 
			echo $local_file;
			echo $server_file;
   		 	$sinkOk = $sinkOk & ftp_put($conn_id, $server_file, $local_file,FTP_BINARY);
		}
	}
// output $contents
	ftp_close($conn_id);
	return $sinkOk;
}

function getSentence($values)
{
	$syncing = syncFTPdown();
	if ($syncing==0) return "SYNC FAIL";
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
	$syncing = syncFTPup();
	if ($syncing==0) return "Mi sono arrotato!";
	else return "Ecco, il tuo volere è esaudito!";
}

function getKeyWords()
{
	$syncing = syncFTPdown();
	if ($syncing==0) return "Non riesco, non riesco orco zoppo!";
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
	$syncing = syncFTPdown();
	if ($syncing==0) return "Nooo, mi sono perso...";
	$files = glob('./*.txt');
	$thefile = "";	
	$thefile = "./$keyword.txt";
	$lines = file($thefile);
	$toret="";
	for ($x = 0; $x <= count($lines); $x++) {
		$toret=$toret . "$x- $lines[$x]";
	} 
	return $toret;
}

function removeSentence($keyword,$index)
{	
	$thefile = "./$keyword.txt";
	$lines = file($thefile);
	$toret="";
	//file_put_contents($thefile, "");
	unlink($thefile);
	for ($x = 0; $x <= count($lines); $x++) {
		$toadd = preg_replace('~[\r\n]+~', '', $lines[$x]);
		if ($x!=$index) 
		{
			if ($toadd!='~[\r\n]+~')
			file_put_contents($thefile,$toadd.PHP_EOL , FILE_APPEND | LOCK_EX);	
		}	
	} 
	$syncing = syncFTPup();
	if ($syncing==0) return "Ho avuto seri problemi...";
	else return "Tu sei il mio guru, ecco fatto!";	
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
	$syncing = syncFTPup();
	if ($syncing==0) return "Ho sboccato blu!";
	else return $toret; 
}



if(!$update)
{
	//echo syncFTPup();
	//echo removeSentence("ivan",0);
	// getSentences("ivan");
	//echo getKeyWords();
	//echo getSentence("ivan");
	echo addSentence("ivan","MERDA");
    //$$casso =  mergeKeyWords(["ivan","ivano"]);
	//echo "\nOHI\n";
	// echo $casso;
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
	if (count($words)<3) 
	{
		$reply = true;
		$command = true;
		$tosend = "add command needs 2 parameter, the keyword and the sentence!";
	}
	else
	{
		$toadd=[];
		for ($x = 2; $x <= count($words)-2; $x++) {
			array_push($toadd,$words[$x]);
		} 
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
	$tosend = getSentence($text);
}



if ($reply==true)
{
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => $tosend);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
}
