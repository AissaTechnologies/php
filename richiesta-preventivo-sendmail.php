 <html>
  <?php
   if(isset($_POST['dati']))
   {
  	$array_dati = $_POST['dati'];
		
		echo "<b>Sono stati inseriti i seguenti dati: </b>" . $array_dati . "<br/>";
		$elemementi = explode(";", $array_dati);
		$to      = 'info@aissatechnologies.com';
				//formato html
		$subject = 'Richiesta preventivo';
		$message = '
			<html>
			<head>
			  <title>Richiesta preventivo</title>
			</head>
			<body>
			  <p align="center"><font size="4" color="#48CA0D"><b>Richiesta preventivo per il seguente prodotto:</b></font></p>
			  <p>&nbsp;</p>
			  <p align="center><font size="18"><b>ID </b><font color="#0DE0E1">' . $elemementi[0] . '</font>;' . 
								'<b> CODICE </b><font color="#0DE0E1">' . $elemementi[1] . '</font>;' .
								'<b> DESCRIZIONE </b><font color="#0DE0E1">' . $elemementi[2] . '</font></font></p>
			  <table border="1">
				<tr>
				  <th style="color:#EC1B23">Quantita</th>
				  <th style="color:#EC1B23">Colore</th>
				  <th style="color:#EC1B23">Colori stampa-fronte</th>
				  <th style="color:#EC1B23">Colori stampa-retro</th>
				  <th style="color:#EC1B23">Colori manica destra</th>
				  <th style="color:#EC1B23">Colori manica sinistra</th>
				  <th style="color:#EC1B23">Telefono</th>
				  <th style="color:#EC1B23">Note</th>
				</tr>
				<tr>
				  <td>' . $elemementi[3] . '</td><td>' . $elemementi[4] . '</td><td>' .  $elemementi[5] . '</td><td>' . $elemementi[6] . '</td><td>' . 
				  $elemementi[7] . '</td><td>' . $elemementi[8] . '</td><td>' . $elemementi[12] . '</td><td>' . $elemementi[13] . '</td>
				</tr>								
			  </table>
			  <p>&nbsp;</p>
			  <p align="left"><font size="2">Cordiali saluti<br>' . $elemementi[9] . ' ' . $elemementi[10] . ', ' .  $elemementi[11] . '<br> Tel. ' . $elemementi[12] . '</font></p>
			</body>
			</html>
		';
		// set del Content-type 
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// altri headers
		$headers .= 'To: Aissa Technologies Market <market@aissatechnologies.com>' . "\r\n";
		$headers .= 'From: ' . $elemementi[9] . ' ' . $elemementi[10] . ' <' . $elemementi[11] . '> ' . "\r\n";
		$headers .= 'Cc: camelia.boban@aissatechnologies.com' . "\r\n";
		$headers .= 'Bcc: info@aissatechnologies.com' . "\r\n";
		$headers .= 'Reply-To:' . $elemementi[9] . ' ' . $elemementi[10] . ' <' . $elemementi[11] . '> ' . "\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion();
				
		
		mail($to, $subject, $message, $headers);
		/*bool $esito = mail($to, $subject, $message, $headers);
		echo $esito;
		if(!esito) {
			return echo 'Errore nella trasmissione del messaggio!';
		}
		echo 'Il messaggio è stato trasmesso con successo';*/
   }  
?>
