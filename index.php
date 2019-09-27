<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="main.css">
		<meta charset="UTF-8">
		<link href="ikona.png" rel="icon" type="image/ico">
		<title>Ovládání osvětlení</title>
	</head>
    
<center>
    <body>
		<div class="stred">
		<img class="napisimg" src="napis.png">
	      <div id="napis" class="sekce skupina">
			<div class="col span_1_of_3">      
		      <form method="get"> 
		      	<input type="image" class="switch_img" src="kuchyně.png" value="Zapnout" name="on1"> <!-- KUCHYNE -->

		      	<?php
		      	    shell_exec("/usr/local/bin/gpio -g mode 23 out");
					$fileName1 = __DIR__.'/txt/led1.txt'; 						// Promenna se souborem, do ktereho se bude ukladat hodnota

					if (file_exists($fileName1)) {								// Pokud existuje soubor, vytvor promennou s nazvem souboru v promenne
					    $current_state1 = file_get_contents($fileName1);		// Pokud se hodnota v souboru nerovna 0 ani 1, dej do souboru 1 a prepis promennou na 1	
					    if ($current_state1 != "0" && $current_state1 != "1") {
					        file_put_contents($fileName1, '1');
					        $current_state1 = 1;
					    }

					} else { 													// Pokud neplati, zapis do promenne hodnotu 1
					    $current_state1 = 1;
					    file_put_contents($fileName1, $current_state1);			// Vloz hodnoru  do souboru
					}

					// Provadi se jen jednou, pri restartu

					if (isset($_GET['on1'])) {									// Pokud se zmackne tlacitko 
					    shell_exec("/usr/local/bin/gpio -g write 23 $current_state1");			// Dej na piny aktualni stav promenne
					    $current_state1 = 1 - $current_state1;					// Pak prevrat hodnotu promenne (jestli je 1, pak 1-1 = 0, pokud je 0, pak 1-0 = 1. Atd..)
					    file_put_contents($fileName1, $current_state1);			// A zapis ji do souboru
					}

					echo $current_state1 == 1 ? '⊘' : '◉';						// Vypsana hodnota = 1 - zobraz znak, jestli ne, zobraz druhy
				?>              
		      </form>
		    </div> 

		    <div class="col span_1_of_3">      
		      <form method="get"> 
		      	<input type="image" class="switch_img" src="koupelna.png" value="Zapnout" name="on2"> <!-- KOUPELNA -->

		      	<?php
		      	    shell_exec("/usr/local/bin/gpio -g mode 25 out");
					$fileName2 = __DIR__.'/txt/led2.txt';

					if (file_exists($fileName2)) {
					    $current_state2 = file_get_contents($fileName2);
					    if ($current_state2 != "0" && $current_state2 != "1") {
					        file_put_contents($fileName2, '1');
					        $current_state2 = 1;
					    }

					} else {
					    $current_state2 = 1;
					    file_put_contents($fileName2, $current_state2);
					}

					if (isset($_GET['on2'])) {
					    shell_exec("/usr/local/bin/gpio -g write 25 $current_state2");
					    $current_state2 = 1 - $current_state2;
					    file_put_contents($fileName2, $current_state2);
					}

					echo $current_state2 == 1 ? '⊘' : '◉';
				?> 
              
			  </form>
			</div>
			  
		    <div class="col span_1_of_3">         
		      <form method="get"> 
		      	<input type="image" class="switch_img" src="loznice.png" value="Zapnout" name="on3"> <!-- LOZNICE -->

		      	<?php
		      	    shell_exec("/usr/local/bin/gpio -g mode 18 out");
					$fileName3 = __DIR__.'/txt/led3.txt';

					if (file_exists($fileName3)) {
					    $current_state3 = file_get_contents($fileName3);
					    if ($current_state3 != "0" && $current_state3 != "1") {
					        file_put_contents($fileName3, '1');
					        $current_state3 = 1;
					    }

					} else {
					    $current_state3 = 1;
					    file_put_contents($fileName3, $current_state3);
					}

					if (isset($_GET['on3'])) {
					    shell_exec("/usr/local/bin/gpio -g write 18 $current_state3");
					    $current_state3 = 1 - $current_state3;
					    file_put_contents($fileName3, $current_state3);
					}

					echo $current_state3 == 1 ? '⊘' : '◉';
				?> 

		      </form>
			</div>
	      </div>

<!-- druhy radek v prohlizeci -->

	      <div id="druhy" class="sekce skupina"> 

	      	<div class="col span_1_of_3">       
		      <form method="get"> 
		      	<input type="image" class="switch_img" src="zachod.png" value="Zapnout" name="on4"> <!-- ZACHOD --> 

		      	<?php
		      	    shell_exec("/usr/local/bin/gpio -g mode 15 out");
					$fileName4 = __DIR__.'/txt/led4.txt';
					if (file_exists($fileName4)) {
					    $current_state4 = file_get_contents($fileName4); // Promenna je soubor
					    if ($current_state4 != "0" && $current_state4 != "1") {  // Podminka se pta, jestli se soubor nerovna 1 a zaroven 0
					        file_put_contents($fileName4, '1');	// Pokud ano, vlozi do nej 1 a prepise promennou na 1
					        $current_state4 = 1;
					    }

					} else { // Pokud neplati podminka, zapise se do promenne jedna a ta se ulozi do souboru
					    $current_state4 = 1;
					    file_put_contents($fileName4, $current_state4);
					}

					if (isset($_GET['on4'])) { // Pokud se zmackne tlacitko, provede se prikaz na sepnutí pinu a do promenne se zapise
					    shell_exec("/usr/local/bin/gpio -g write 15 $current_state4");
					    $current_state4 = 1 - $current_state4; // Do promenne se zapise 0
					    file_put_contents($fileName4, $current_state4); // Promenna se zapise do souboru
					}

					echo $current_state4 == 1 ? '⊘' : '◉'; // Jestli se promenna rovna 1, zobrazi se obrazek, jestli ne, zobrazi se jiny
				?> 

		      </form>
		    </div>

	        <div class="col span_1_of_3">		          
		      <form method="get"> 
		      	<input type="image" class="switch_img" src="pokoj.png" value="Zapnout" name="on5"> <!-- POKOJ -->

		      	<?php
		      	    shell_exec("/usr/local/bin/gpio -g mode 24 out");
					$fileName5 = __DIR__.'/txt/led5.txt';

					if (file_exists($fileName5)) {
					    $current_state5 = file_get_contents($fileName5);
					    if ($current_state5 != "0" && $current_state5 != "1") {
					        file_put_contents($fileName5, '1');
					        $current_state5 = 1;
					    }

					} else {
					    $current_state5 = 1;
					    file_put_contents($fileName5, $current_state5);
					}

					if (isset($_GET['on5'])) {
					    shell_exec("/usr/local/bin/gpio -g write 24 $current_state5");
					    $current_state5 = 1 - $current_state5;
					    file_put_contents($fileName5, $current_state5);
					}

					echo $current_state5 == 1 ? '⊘' : '◉';
				?> 

		      </form> 
		  	</div>
   
 

  <?php   
 
 /*


**************** STARA VERZE **************************

    // Deklarace pinu na raspberry
    shell_exec("/usr/local/bin/gpio -g mode 14 out");
    shell_exec("/usr/local/bin/gpio -g mode 15 out");
    shell_exec("/usr/local/bin/gpio -g mode 18 out");
    shell_exec("/usr/local/bin/gpio -g mode 23 out");
    shell_exec("/usr/local/bin/gpio -g mode 24 out");

        
//LED1 

		$fileName = __DIR__.'/txt/led1.txt';		// Promenna se souborem, do ktereho se bude ukladat hodnota

			if (!file_exists($fileName) || (file_get_contents($fileName) !== '1' && file_get_contents($fileName) !== '0')) {
			    file_put_contents($fileName, '1');
			}		// Podminka pokud neexistuje soubor nebo v nem není 1 nebo 0, tak doplni do nej 1.

			if (isset($_GET['on2']) && file_get_contents($fileName) === '1') { // "===" a je identicke b, jsou stejneho typu
			    shell_exec("/usr/local/bin/gpio -g write 14 1");
			    file_put_contents($fileName, '0');
			    echo '<img src="ikona.png">';

			}		// Pokud se zmackne tlacitko1 a v souboru bude 1, rozsviti se LED a prepise v souboru cislo na 0. 

			else if (isset($_GET['on2']) && file_get_contents($fileName) === '0') {
			    shell_exec("/usr/local/bin/gpio -g write 14 0");
			    file_put_contents($fileName, '1');
			    echo '<img src="dum.png">';
			}		// Pokud se zmackne tlacitko1 znova a v souboru bude 0, zhasne se LED a prepise v souboru cislo na 1.

//LED2


			$fileName = __DIR__.'/txt/led2.txt';

			if (!file_exists($fileName) || (file_get_contents($fileName) !== '1' && file_get_contents($fileName) !== '0')) {
			    file_put_contents($fileName, '1');
			}

			if (isset($_GET['on4']) && file_get_contents($fileName) === '1') {
			    shell_exec("/usr/local/bin/gpio -g write 15 1");
			    file_put_contents($fileName, '0');
			}

			else if (isset($_GET['on4']) && file_get_contents($fileName) === '0') {
			    shell_exec("/usr/local/bin/gpio -g write 15 0");
			    file_put_contents($fileName, '1');
			}

         
//LED3          
       
		$fileName = __DIR__.'/txt/led3.txt';

			if (!file_exists($fileName) || (file_get_contents($fileName) !== '1' && file_get_contents($fileName) !== '0')) {
			    file_put_contents($fileName, '1');
			}

			if (isset($_GET['on3']) && file_get_contents($fileName) === '1') {
			    shell_exec("/usr/local/bin/gpio -g write 18 1");
			    file_put_contents($fileName, '0');
			}

			else if (isset($_GET['on3']) && file_get_contents($fileName) === '0') {
			    shell_exec("/usr/local/bin/gpio -g write 18 0");
			    file_put_contents($fileName, '1');
			}
      
//LED4          
       
		$fileName = __DIR__.'/txt/led4.txt';

			if (!file_exists($fileName) || (file_get_contents($fileName) !== '1' && file_get_contents($fileName) !== '0')) {
			    file_put_contents($fileName, '1');
			}

			if (isset($_GET['on1']) && file_get_contents($fileName) === '1') {
			    shell_exec("/usr/local/bin/gpio -g write 23 1");
			    file_put_contents($fileName, '0');
			}

			else if (isset($_GET['on1']) && file_get_contents($fileName) === '0') {
			    shell_exec("/usr/local/bin/gpio -g write 23 0");
			    file_put_contents($fileName, '1');
			}
       
//LED5         
       
		$fileName = __DIR__.'/txt/led5.txt';

			if (!file_exists($fileName) || (file_get_contents($fileName) !== '1' && file_get_contents($fileName) !== '0')) {
			    file_put_contents($fileName, '1');
			}

			if (isset($_GET['on5']) && file_get_contents($fileName) === '1') {
			    shell_exec("/usr/local/bin/gpio -g write 24 1");
			    file_put_contents($fileName, '0');
			}

			else if (isset($_GET['on5']) && file_get_contents($fileName) === '0') {
			    shell_exec("/usr/local/bin/gpio -g write 24 0");
			    file_put_contents($fileName, '1');
			}

//CELY DUM 

			$fileName = __DIR__.'/txt/led6.txt';

			if (!file_exists($fileName) || (file_get_contents($fileName) !== '1' && file_get_contents($fileName) !== '0')) {
			    file_put_contents($fileName, '1');
			}

			if (isset($_GET['on6']) && file_get_contents($fileName) === '1') {
				shell_exec("/usr/local/bin/gpio -g write 14 1");
				shell_exec("/usr/local/bin/gpio -g write 15 1");
				shell_exec("/usr/local/bin/gpio -g write 18 1");
				shell_exec("/usr/local/bin/gpio -g write 23 1");
			    shell_exec("/usr/local/bin/gpio -g write 24 1");
			    file_put_contents($fileName, '0');
			}

			else if (isset($_GET['on6']) && file_get_contents($fileName) === '0') {
				shell_exec("/usr/local/bin/gpio -g write 14 0");
				shell_exec("/usr/local/bin/gpio -g write 15 0");
				shell_exec("/usr/local/bin/gpio -g write 18 0");
				shell_exec("/usr/local/bin/gpio -g write 23 0");
			    shell_exec("/usr/local/bin/gpio -g write 24 0");
			    file_put_contents($fileName, '1');
			}
 */ 
?>

	</body>
</center> 
</html>