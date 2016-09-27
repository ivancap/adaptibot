<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
	//$lines = file('./prova.txt');
	//foreach ($lines as $line_num => $line) {
	//    echo $line_num;
	//    echo  $line ;
	//}
	
	//append to text file
	//$txt = "user id date";
	//$myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
	 
	 
	exit;
}



$random = rand (0, 7);


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



//TEST
//header("Content-Type: application/json");
//$tosend = "ciao";
//$parameters = array('chat_id' => $chatId, "text" => $tosend);
//$parameters["method"] = "sendMessage";
//echo json_encode($parameters);
//TEST

//commento di prova	

if (stristr($text, 'tommy') !== false or stristr($text, 'tommaso') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "...attualmente è in antartide... o forse in guatemala? Però non vi sembra rompa le balle uguale, come averlo qui!";    
		break;
		case 2:
		$tosend = "stressacazzi...";    
		break;
		case 3:
		$tosend = "Mio amico russo dice: Meglio uovo rotto oggi che Tommaso domani o dopodomani";    
		break;
		case 4:
		$tosend = "lui no vende un cazzo";    
		break;
		case 5:
		$tosend = "the wrong gui in the wrong place";    
		break;
		case 6:
		$tosend = "sarà alla macchinetta del caffè...";    
		break;
		default:
		$tosend = "chi Tommaso chi? ";    
	}    
	$reply = true;
}

if (stristr($text, 'teoria') !== false or stristr($text, 'idea') !== false or stristr($text, 'facciamo') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "Dunque, se tu moduli la luce come i cancelli, cioè la accendi e la spegni, perdonami... si effettua un filtraggio spettrale... infatti tu lo puoi usare il cancello alla luce del sole, ecco il 2win deve funzionare come i cancelli automatici!";    
		break;
		case 2:
		$tosend = "Se attui la lente a mano e fai una tabella di valori e poi un controllo in modo che i valori non snappino e misuri con il righello la distanza dalla membrana vedi che si riesce a fare quello che dico... è facile. ";    
		break;
		case 3:
		$tosend = "Il visionfit deve essere see through, ma con una scatoletta nera e delle lenti piccole, ma anche devi guardare il chart, ma ci deve stare dentro alla scatoletta nera, e deve avere un buco sopra per inserirci le monetine, così, una monetina alla volta vedi poi, ma se inserisci 2 centesimi deve stampare nell'altra scatoletta nera.";    
		break;
		case 4:
		$tosend = "Io farei, scusami, 9 curve, ciascuna ad ogni punto contiene una curva, che l'utente sceglie e gli viene un indicatore con il colore del fondello cambiato, ma decidi tu. Però rosso.";    
		break;
		case 5:
		$tosend = "Con il rapporto del led centrale e quello esterno per radice del numero di pixels, senza antialiasing, e un coefficiente modificato dalla funzione di trasferimento basata sul numero di scarpa, funziona benissimo, lo ho visto con i miei occhi. Dati? No non ne ho, ma lo ho visto con i miei occhi.";    
		break;
		case 6:
		$tosend = "Tipo no, l'estrattore della batteria, avrei pensato ad un estrattore a succhi gastrici.";    
		break;
		default:
		$tosend = "No! Ascoltami. Tu non sai, io ho già fatto questo e ti assicuto che è sbagliato, tu non vuoi capire.";    
	}    
	$reply = true;
}

if (stristr($text, 'china') !== false or stristr($text, 'cinese') !== false or stristr($text, 'cinesi') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "...tu plende 2win e fa picolo e che lui collegge da solo la leflazione... ah e costa zelo eulo!";    
		break;
		case 2:
		$tosend = "ragazzi qui bisgona cambiare tutto, dobbiamo rifare tutto, cancellate tutto";    
		break;
		case 3:
		$tosend = "Il cinese ha detto che la terra è piatta quindi da oggi basta gps";    
		break;
		case 4:
		$tosend = "Nel visionfit ci sono dentro 7 computer,e pensa che si parlano in seriale!";    
		break;
		case 5:
		$tosend = "lui compla adaptica e non vuole palacallo di melda..";    
		break;
		case 6:
		$tosend = "abbiamo online un servizio di cloud, sapevatelo!";    
		break;
		default:
		$tosend = "da oggi solo cani al forno a pranzo!";    
	}    
	$reply = true;
}

if (stristr($text, 'fiera') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "..è oggi, o domani, beh montiamo, no smontiamo, ma va in mona...";    
		break;
		case 2:
		$tosend = "dobbiamo vendere 3400 pezzi, preparate gli uptates";    
		break;
		case 3:
		$tosend = "Portate un bel po' di figa che tira più quella del visionfit";    
		break;
		case 4:
		$tosend = "avete preparato 2 2win, 3 visionfit sc, 8 panini, 1 porchetta, 4 paia di stivali e l'ombrello?";    
		break;
		case 5:
		$tosend = "questa è l'ultima possibilità, poi andiamo alla fiera del pesce";    
		break;
		default:
		$tosend = "no.";    
	}    
	$reply = true;
}

if (stristr($text, 'fiera') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "..è oggi, o domani, beh montiamo, no smontiamo, ma va in mona...";    
		break;
		case 2:
		$tosend = "dobbiamo vendere 3400 pezzi, preparate gli uptates";    
		break;
		case 3:
		$tosend = "Portate un bel po' di figa che tira più quella del visionfit";    
		break;
		case 4:
		$tosend = "avete preparato 2 2win, 3 visionfit sc, 8 panini, 1 porchetta, 4 paia di stivali e l'ombrello?";    
		break;
		case 5:
		$tosend = "questa è l'ultima possibilità, poi andiamo alla fiera del pesce";    
		break;
		default:
		$tosend = "no.";    
	}    
	$reply = true;
}

if (stristr($text, 'card') !== false or stristr($text, 'cardullo') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "...orco... Andrea... che rompi maroni!";  
		break;
		case 2:
		$tosend = "dhr, dhr, dhr...";    
		break;
		case 3:
		$tosend = "Mio amico russo dice: Andrea cava sassi da cava se sole sorge blu";    
		break;
		case 4:
		$tosend = "mi presti apple watch?";    
		break;		
		default:
		$tosend = "...orco... Andrea... che rompi maroni!"; 
	}
	$reply = true;
}

if (stristr($text, 'barbara') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "Sei andata in banca?";
		break;
		case 2:
		$tosend = "Sei tornata dalla banca?";    
		break;
		case 3:
		$tosend = "Non pagare! Paga! Non pagare! Paga!";    
		break;
		case 4:
		$tosend = "Bella borsetta... del cazzo!";    
		break;
		default:
		$tosend = "Barbara, hai chiesto a Gianfranco?";
	}
	$reply = true;
}


if (stristr($text, 'mino') !== false or stristr($text, 'cosmo') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "Mino!!!!! Le schede devono avere i connettori e non avere i connettori, chiaro?";
		break;
		case 2:
		$tosend = "Toppa sempre la bom...";    
		break;
		case 3:
		$tosend = "Mio amico russo dice: Scheda di mino, uso per pulire camino...";    
		break;
		case 4:
		$tosend = "Non passerà mai la qualità.. mino sappilo..";    
		break;
		default:
		$tosend = "Mino!!!!! Le schede devono avere i connettori e non avere i connettori, chiaro?";
	}
	$reply = true;
}

if (stristr($text, 'giangi') !== false or stristr($text, 'gianluigi') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "non nominare il nome del capo invano";    
		break;
		case 2:
		$tosend = "Ha indetto o no una riounione fiume... preparate molto caffè!";    
		break;
		case 3:
		$tosend = "Mio amico russo dice: Giangi e sui 5 minuti io spero essere a Vorkuta";    
		break;
		case 4:
		$tosend = "ma quello che dovrebbe pagarci... no, dai intendi un altro... ";    
		break;
		case 5:
		$tosend = "LO DEVE SAPER USARE ANCHE MIA NONNA CHIARO?";    
		break;
		case 6:
		$tosend = "Gli serve un 2win sopra il tavolo, girato sotto sopra, con tutte le 12 apps, ma rosso, con la custodia di Hallo Kitty, SUBITOOOOO!!!!";    
		break;
		default:
		$tosend = "He is the boss. Repeat with me... He is the boss...";
	}
	$reply = true;
}

if (stristr($text, 'ivan') !== false)
{
	
	switch ($random) {
		case 1:
		$tosend = "Non so chi sia...";    
		break;
		case 2:
		$tosend = "stressacazzi...";    
		break;
		case 3:
		$tosend = "L'amico più fidato...";    
		break;
		case 5:
		$tosend = "Mio amico russo dice: lui è mio amico russo!";    
		break;
		default:
		$tosend = "Chi? Il paracarro di merda?";
	}
	$reply = true;
}

if (stristr($text, 'checklist') !== false)
{
	$tosend = "Checklist? Ma non scherzare... voi softueristi non dovete fare bug.. e la checklist deve essere di un solo punto: va (si/no), con il check sul si!";
	$reply = true;
}

if (stristr($text, 'bug') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "Ti stai sbagliando, nessun bug...";    
		break;
		case 2:
		$tosend = "non è un bug, è che sei incapace!";    
		break;
		case 3:
		$tosend = "L'ha voluto così il capo...";    
		break;
		case 5:
		$tosend = "Mio amico russo dice: bug no esiste in realtà!";    
		break;
		default:
		$tosend = "ah perchè non è già stato corretto ieri?";
	}
	$reply = true;
}

if (stristr($text, 'caffè') !== false or stristr($text, 'caffe') !== false or stristr($text, 'coffee') !== false)
{
	$tosend = "COOOOOOSA!!!! Ai miei tempi avevamo una bombola da 33 cl di aria al giorno da respirare e tu vuoi un caffè?????";
	$reply = true;
}

if (strpos($text, 'francesco') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "DIO P....";    
		break;
		case 2:
		$tosend = "pesante...";    
		break;
		case 3:
		$tosend = "Mio amico russo dice: mi pare che tu serve un monitor.";    
		break;
		case 5:
		$tosend = "non c'è mai tanto, e quando c'è non fa un cazzo...";    
		break;
		case 6:
		$tosend = "Allora hai imparato tutto il 2win a memoria... dai dai ...";    
		break;
		default:
		$tosend = "Chi? Quello delle lucette del teatro del cazzo?";
	}
	$reply = true;
}
if (strpos($text, 'valentina') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "NOOOO!!!!";    
		break;
		case 2:
		$tosend = "Ha fatto la tinta?";    
		break;
		case 3:
		$tosend = "Mio amico russo dice: vale trova bug sempre cazzo.";    
		break;
		case 5:
		$tosend = "Sa matlab come io so di platfomestrosi";    
		break;
		case 6:
		$tosend = "un, due, tre, quattro, 5, 6, 7, 8... ";    
		break;
		default:
		$tosend = "Valentina, è pronta o no la funzione della funzione di trasferimento del 5° ordine misurata con il righello?";
	}
	$reply = true;
}
if (strpos($text, 'villi') !== false)
{
	$tosend = "Villi, è pronto il vision fit? Gli occhiali? Il 2Win? Il caffè?";
	switch ($random) {
		case 1:
		$tosend = "chi, intendi Giangi?";    
		break;
		case 2:
		$tosend = "chi, intendi Gianluigi?";    
		break;
		case 3:
		$tosend = "chi, intendi il capo?";    
		break;
		case 4:
		$tosend = "chi????";    
		break;
		case 5:
		$tosend =  "Mio amico russo dice: se tu fa piano, fa piano il piano, ma no troppo piano.";   
		break;
		case 6:
		$tosend = "fruscio del vento e rumore bianco man?";    
		break;
		default:
		$tosend = "Villi, è pronto il vision fit? Gli occhiali? Il 2Win? Il caffè?";
	}
	$reply = true;
}

if (strpos($text, '*') !== false)
{
	$tosend = "Solo io sono il DIO degli ****!!!";
	switch ($random) {
		case 1:
		$tosend = "* l'asterisco è brevettato da adaptica per qualiasi cosa non si voglia perdere più di 5 secondi a pensare come fare meglio.";    
		break;
		case 2:
		$tosend = "* NO.";    
		break;
		case 3:
		$tosend = "* questa affermazione è falsa.";    
		break;
		default:
		$tosend = "Solo io sono il DIO degli ****!!!";
	}
	$reply = true;
}
if (strpos($text, 'mattia') !== false)
{
	$tosend = "Orbo, sbrigati a fare lo zip con il manuale dentro! Anzi fuori! No dentro!";
	switch ($random) {
		case 1:
		$tosend = "mattia, locka il mutex su te stesso e non slockarlo più. ";    
		break;
		case 2:
		$tosend = "Mio amico russo dice: Te da codice a lui da fare, quando lui finito, linguaggio che lui usa già morto da 20 anni.";    
		break;
		default:
		$tosend = "Orbo, sbrigati a fare lo zip con il manuale dentro! Anzi fuori! No dentro!";
	}
	$reply = true;
}
if (strpos($text, 'buongiorno') !== false)
{
	
	switch ($random) {
		case 1:
		$tosend ="non lo sarà!";
		break;
		case 2:
		$tosend = "lo sarà!... ma nooo...";
		break;
		case 3:
		$tosend = "Mio amico russo dice: no è.";    
		break;
		case 4:
		$tosend = "io lavoro dalle 3.30 di stanotte, quindi sbrigatiiiiii";    
		break;
		default:
		$tosend ="non lo sarà!";
	}
	$reply = true;
}
if (strpos($text, 'sebastiano') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "... colpa di Mino";    
		break;
		case 2:
		$tosend = "... colpa di Ivan";      
		break;
		case 3:
		$tosend = "Mio amico russo dice: colpa di mucca";    
		break;
		case 4:
		$tosend = "... colpa di Villi";    
		break;
		case 5:
		$tosend = ".. la versione FW ha 3 numeri, uno in lettere romane, uno negativo, uno immaginario... ";    
		break;
		default:
		$tosend = "a qualcuno interessa? http://www.ebay.it/itm/SALDATORE-A-STILO-STAGNO-STAGNATORE-60W-SALDA-SALDATRICE-ELETTRONICA-PRECISIONE-/321790233879?hash=item4aec314d17:g:uUMAAOSwHnFViZHt";
	}
	$reply = true;
}
if (strpos($text, 'gianfranco') !== false)
{
	switch ($random) {
		case 3:
		$tosend = "Mio amico russo dice: lui simpatico... come mucca.";    
		break;
		default:
		$tosend = "Qualcuno lo chiami che è qui DHL";
	}
	$reply = true;
}
if (strpos($text, 'funziona') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "la mona... ";    
		break;
		case 2:
		$tosend = "mi sa che no... ricontrolla e non andrà";    
		break;
		case 3:
		$tosend = "Mio amico russo dice: credo è casulale.";    
		break;
		case 4:
		$tosend = "ma nessuno lo compra.";    
		break;
		case 5:
		$tosend = "impossibile...";    
		break;
		case 6:
		$tosend = "sarà un caso..";    
		break;
		default:
		$tosend = "se funziona è grazie ai software man!";
	}
	$reply = true;
}
if (strpos($text, 'non funziona') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "colpa degli elettronici!";
		break;
		case 2:
		$tosend = "colpa di Villi!";
		break;
		case 3:
		$tosend = "Mio amico russo dice: colpa di mucca.";    
		break;
		case 4:
		$tosend = "colpa di Vale!";  
		break;
		case 5:
		$tosend = "colpa di Francesco!";
		break;
		case 6:
		$tosend ="colpa di  Mattia!";
		break;
		default:
		$tosend = "colpa degli elettronici!";  
	}
	$reply = true;
}
if (strpos($text, 'rotto') !== false)
{
	switch ($random) {


		default:
		$tosend = "ha sfranzato?";
	}
	$reply = true;
}
if (strpos($text, '2win') !== false)
{
	switch ($random) {
	
		default:
		$tosend = "ma che versione? la 4.1.86238746128936?";   
	}
	$reply = true;
}
if (strpos($text, 'visionfit') !== false)
{
	switch ($random) {

		default:
		$tosend =  "muovetevi che ne devono uscire altri quattro.... entro ieri";
	}
	$reply = true;
}
if (strpos($text, 'impossibile') !== false)
{
	switch ($random) {
		case 1:
		$tosend ="è solo perchè non hai voglia, ai miei tempi con un coltellino svizzero sventravo balene";
		break;
		case 2:
		$tosend = "è solo perchè non hai voglia, ai miei tempi con una calcolatrice ho fondato antartide";
		break;
		case 3:
		$tosend = "Mio amico russo dice: tu no volia di fare un cazzo";    
		break;
		case 4:
		$tosend = "è solo perchè non hai voglia, ai miei tempi con un fiammifero ho lanciato un razzo in orbita";
		break;
		case 5:
		$tosend = "è solo perchè non hai voglia, ai miei tempi con un forno, ho costruito una centrale nucleare";
		break;
		case 6:
		$tosend = "è solo perchè non hai voglia, ai miei tempi con un gatto, ho triturato del prezzemolo";
		break;
		default:
		$tosend = "è solo perchè non hai voglia, ai miei tempi con un 486 mandavo gli uomini sulla luna";
	}
	$reply = true;
}
if (strpos($text, 'quando') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "era per il 2009!";  
		break;
		case 2:
		$tosend = "era per ieri l'altro!"; 
		break;
		case 3:
		$tosend = "era per tre giorni fa!"; 
		break;
		case 4:
		$tosend = "era per oggi, cazzaro!"; 
		break;
		case 5:
		$tosend = "la deadline è stata aggiornata, ieri!";   
		break;
		case 6:
		$tosend = "la deadline è stata aggiornata, 1975!";   
		break;
		default:
		$tosend = "era per ieri!"; 
	}
	$reply = true;
}
if (strpos($text, 'cacca') !== false)
{
	switch ($random) {
		default:
		$tosend = "se devi andare in bagno, vai su quello delle donne, perchè nell'altro di sicuro c'è Villi!";
	}
	$reply = true;
}
if (strpos($text, 'dove') !== false)
{
	switch ($random) {
		case 6:
		$tosend = "cerca la risposta dentro di te, epperò è sbagliata!";   
		break;
		default:
	$tosend = "Se cerchi qualcosa, cerca nella scrivania di Seba o di Alessandro!";
	}
	$reply = true;
}
if (strpos($text, 'gianfranco') !== false)
{
	switch ($random) {

		default:
		$tosend = "Ricorda la regola delle 10: nessuna interazione prima di allora, se vuoi sopravvivere!";
	}
	$reply = true;
}
if (strpos($text, 'il software non funziona') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "il software va!";
		break;
		case 2:
		$tosend =  "lui va!"; 
		break;
		case 3:
		$tosend = "Mio amico russo dice: no possibile";    
		break;
		case 4:
		$tosend =  "riprova, va!";
		break;
		case 5:
		$tosend =  "stai scherzando!";
		break;
		case 6:
		$tosend =  "lo dico sempre io che sono dei cazzari!";
		break;
		default:
		$tosend =  "IMPOSSIBILE!";
	}
	$reply = true;
}
if (strpos($text, 'la misura') !== false)
{
	switch ($random) {
		case 1:
		$tosend = "hai controllato che non avesse le ciglia?!";
		break;
		case 2:
		$tosend = "stressacazzi...";    
		break;
		case 3:
		$tosend = "Mio amico russo dice: operatore mucca";    
		break;
		case 4:
		$tosend = "hai controllato che la pupilla non fosse piccola o grande o media?!";
		break;
		case 5:
		$tosend = "hai controllato che il termostato fosse impostato su 27 gradi?!";
		break;
		case 6:
		$tosend = "hai controllato che la carta nella stampante fosse ok?!";
		break;
		default:
		$tosend ="hai controllato che non fosse fuori fuoco?!";
	}
	$reply = true;
}


if ($reply==true)
{
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => $tosend);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
}
