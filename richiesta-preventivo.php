<?php
   
	//recupero dati dall'url			
	$data =  $_GET['dati'];
	$pieces = explode(";", $data);
	$id = $pieces['0'];
	$desc = $pieces['1'];
	$rif = $pieces['2'];
	
	//connessione al db
	$conn = mysql_connect("192.168.1.1:3306", "userName", "pwd") or die ('Errore di connessione al server: ' . mysql_error());
	mysql_select_db("dbName", $conn) or die ('Errore di connessione al db: ' . mysql_error());


?>
<html>
<head>	
	<title>
		Richiesta preventivo
	</title>
	<script type="text/javascript">
	
		function inviaDati() {	
			//validazione dei campi
			if( document.preventivo.qta.value == "" )
		   {
			 alert( "Inserire la quantità!" );
			 document.preventivo.qta.focus() ;
			 return false;
		   }
		   //si setta il campo hidden dati con il valore quantità
			document.preventivo.dati.value = document.preventivo.qta.value;
		   if( document.preventivo.colore.value == "0" )
		   {
			 alert( "Selezionare il colore!" );			 
			 return false;
		   }
		   //si aggiunge al campo hidden dati il colore selezionato
		   document.preventivo.dati.value = document.preventivo.qta.value + ";" + document.preventivo.colore.value;
		
		   if( document.preventivo.fronte.value == "0" )
		   {
			 alert( "Selezionare i colori fronte!" );
			 return false;
		   }
		   //si aggiunge al campo hidden dati il colore fronte selezionato
		   document.preventivo.dati.value = document.preventivo.qta.value + ";" + document.preventivo.colore.value + ";" + document.preventivo.fronte.value;
		   if( document.preventivo.retro.value == "0" )
		   {
			 alert( "Selezionare i colori retro!" );
			 return false;
		   }
		   //si aggiunge al campo hidden dati il colore retro selezionato
		   document.preventivo.dati.value = document.preventivo.qta.value + ";" + document.preventivo.colore.value + ";" + document.preventivo.fronte.value + 
											";" + document.preventivo.retro.value;
		   if( document.preventivo.dx.value == "0" )
		   {
			 alert( "Selezionare i colori manica destra!" );
			 return false;
		   }
		   //si aggiunge al campo hidden dati il colore dx selezionato
		   document.preventivo.dati.value = document.preventivo.qta.value + ";" + document.preventivo.colore.value + ";" + document.preventivo.fronte.value + 
											";" + document.preventivo.retro.value + ";" + document.preventivo.dx.value;
		   if( document.preventivo.sx.value == "0" )
		   {
			 alert( "Selezionare i colori manica sinistra!" );
			 return false;
		   }
		   //si aggiunge al campo hidden dati il colore sx selezionato
		   document.preventivo.dati.value = document.preventivo.qta.value + ";" + document.preventivo.colore.value + ";" + document.preventivo.fronte.value + 
											";" + document.preventivo.retro.value + ";" + document.preventivo.dx.value + ";" + document.preventivo.sx.value;
		   if( document.preventivo.nome.value == "" )
		   {
			 alert( "Inserire il nome!" );
			 document.preventivo.nome.focus() ;
			 return false;
		   }
		   //si aggiunge al campo hidden dati il nome inserito
		   document.preventivo.dati.value = document.preventivo.qta.value + ";" + document.preventivo.colore.value + ";" + document.preventivo.fronte.value + 
											";" + document.preventivo.retro.value + ";" + document.preventivo.dx.value + ";" + document.preventivo.sx.value + 
											";" + document.preventivo.nome.value;
		   if( document.preventivo.cognome.value == "" )
		   {
			 alert( "Inserire il cognome!" );
			 document.preventivo.cognome.focus() ;
			 return false;
		   }
		   //si aggiunge al campo hidden dati il cognome inserito
		   document.preventivo.dati.value = document.preventivo.qta.value + ";" + document.preventivo.colore.value + ";" + document.preventivo.fronte.value + 
											";" + document.preventivo.retro.value + ";" + document.preventivo.dx.value + ";" + document.preventivo.sx.value + 
											";" + document.preventivo.nome.value + ";" + document.preventivo.cognome.value;
		   if( document.preventivo.email.value == "" )
		   {
			 alert( "Inserire l'email!" );
			 document.preventivo.email.focus() ;
			 return false;
		   }
		   //si aggiunge al campo hidden dati l'email inserito
		   document.preventivo.dati.value = document.preventivo.qta.value + ";" + document.preventivo.colore.value + ";" + document.preventivo.fronte.value + 
											";" + document.preventivo.retro.value + ";" + document.preventivo.dx.value + ";" + document.preventivo.sx.value + 
											";" + document.preventivo.nome.value + ";" + document.preventivo.cognome.value + ";" + document.preventivo.email.value;
		   if( document.preventivo.telefono.value == "" )
		   {
			 alert( "Inserire il telefono!" );
			 document.preventivo.telefono.focus() ;
			 return false;
		   }
		   //si setta il campo hidden con il valore finale - aggiunto il tel e le note (campo facoltativo) inserite
		   document.preventivo.dati.value = document.preventivo.id.value + ";" + document.preventivo.riferimento.value + ";" + document.preventivo.descrizione.value +
											";" + document.preventivo.qta.value + ";" + document.preventivo.colore.value + ";" + document.preventivo.fronte.value + 
											";" + document.preventivo.retro.value + ";" + document.preventivo.dx.value + ";" + document.preventivo.sx.value + 
											";" + document.preventivo.nome.value + ";" + document.preventivo.cognome.value + ";" + document.preventivo.email.value +
											";" + document.preventivo.telefono.value + ";" + document.preventivo.note.value;
			
		   if( !document.preventivo.consenso.checked )
		   {
			 alert( "Si deve dare il consenso al trattamento dei dati personali!" );
			 document.preventivo.consenso.focus() ;
			 return false;
		   }
			alert ( document.preventivo.dati.value );
			//validazione return true -> action e submit
			document.forms["preventivo"].action = "richiesta-preventivo-sendmail.php";
			document.forms["preventivo"].submit();
		}		
	</script>
	<style>
		
	</style>
</head>
<body>

<form id="preventivo" name="preventivo" method="post">
  <center>
  <table width="40%" border="0" cellpadding="3" cellspacing="0">
	  <tr>
		<td>&nbsp;</td>
		<td>			
			<div class="titoloazzurro" style="font-weight: bold; color: #48CA0D; font-size: 21px;"><center>RICHIESTA PREVENTIVO:</center></div>
			<input type="hidden" id="id" name="id" value="<?php echo $id?>" />
			<input type="hidden" id="riferimento" name="riferimento" value="<?php echo $rif?>" />
			<input type="hidden" id="descrizione" name="descrizione" value="<?php echo $desc?>" />			
			<input type="hidden" id="dati" name="dati" value="" />
			<table width="100%" border="0" cellpadding="3" cellspacing="0">
				<tr>
					<td colspan="2" height="15px">&nbsp;</td>
				</tr>
				<tr>
					<td style="text-align:left;font-weight: bold; color: #000; font-size: 14px;">Id prodotto: <?php echo "<font color='#0DE0E1'>".$id."</font>"?></td>
					<td style="text-align:left;font-weight: bold; color: #000; font-size: 14px;">Riferimento: <?php echo "<font color='#0DE0E1'>".$rif."</font>"?></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align:left;font-weight: bold; color: #000; font-size: 14px;">Descrizione: <?php echo "<font color='#0DE0E1'>".$desc."</font>"?></td>
				</tr>
			</table>			
		</td>
		<tr>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
		<td style="font-weight: bold; color: #EC1B23; text-align:center;">DATI PRODOTTO</td>
		<td>&nbsp;</td>
	  </tr>
	  	  <tr>
		<td colspan="3" height="30">&nbsp;</td>
	  </tr>
	  <tr>
		<td>
			<strong>Quantit&agrave;</strong><br />
			<input name="qta" type="text" id="qta" size="5"/>
		</td>
		<td>&nbsp;</td>
		<td>
			<strong>Colore</strong><br />
			<?php 

				$query = "SELECT a.color, b.name FROM ps_attribute a, ps_attribute_lang b 
						  WHERE a.id_attribute = b.id_attribute AND a.id_attribute IN 
						  (SELECT id_attribute   
						  FROM ps_product_attribute_combination 
						  WHERE id_product_attribute IN (SELECT id_product_attribute 
						  FROM ps_product_attribute 
						  WHERE id_product = $id))";

				// query andata a buon fine
				if($result = mysql_query($query))  {
				  // ci sono risultati, si prepara la combobox	 
				  if($ok = mysql_num_rows($result) > 0) {	  
					//--- inizio combobox colori ---
					echo "<select name='colore' id='colore'>\n";
					echo "<option value='0' selected='selected'>-- Seleziona --</option>\n";
					// per ogni item nel $result...
					while ($row = mysql_fetch_array($result))
					  // si aggiunge una nuova option alla combobox
					  echo "<option style='background-color: $row[color]' value='$row[color] - $row[name]'>$row[name]</span></option>\n";
					//--- fine combobox colori ---
					echo "</select>\n";		
				 }
				 // dalla query non ritorna nulla
				  else { echo "Non ci sono risultati dalla query"; }
				}
				// errore query
				else { echo "Query colori non andata a buon fine"; }
			?>			
		</td>
	  </tr>
	  <tr>
		<td>			
		  <strong>Colori Stampa-fronte</strong><br />		  
		  <select id="fronte" name="fronte" >
			<option value="0" selected="selected">-- Seleziona --</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		  </select>				
		</td>
		<td>&nbsp;</td>
		<td>
			<strong>Colori Stampa-retro</strong><br />
			<select id="retro" name="retro" >
				<option value="0" selected="selected">-- Seleziona --</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>		  
		</td>
	  </tr>
	  <tr>
		<td>
			<strong>Colori manica dx</strong><br />
			<select id="dx" name="dx" >
				<option value="0" selected="selected">-- Seleziona --</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>					
		</td>
		<td>&nbsp;</td>
		<td>        
			<strong>Colori manica sx</strong><br />
			<select name="sx" id="sx">
				<option value="0" selected="selected">-- Seleziona --</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>					
		  </td>
	  </tr>
	  <tr>
		<td colspan="3" height="20">&nbsp;</td>
	  </tr>
	  <tr>
		<td colspan="3">&nbsp;</td>
	  </tr>	  
	  <tr>
		<td>&nbsp;</td>
		<td style="font-weight: bold; color: #EC1B23; text-align:center;">DATI PERSONALI</td>
		<td>&nbsp;</td>
	  </tr>
	  	  <tr>
		<td colspan="3" height="30">&nbsp;</td>
	  </tr>
	  <tr>
		<td>
			<strong>Nome</strong><br />
			<input type="text" id="nome" name="nome" />
		</td>
		<td>&nbsp;</td>
		<td>
			<strong>Cognome</strong><br />		  
			<input type="text" id="cognome" name="cognome" />
		</td>
	  </tr>
	  <tr>
		<td>
			<strong>Email</strong><br />
			<input type="text" id="email" name="email" />
		</td>
		<td>&nbsp;</td>
		<td>
			<strong>Telefono</strong><br />
			<input type="text" id="telefono" name="telefono" /></td>
	  </tr>
	  <tr>		
		<td colspan="3">		
			<strong>Note</strong><br />		 
			<textarea id="note" name="note" cols="80" rows="5"></textarea>
		</td>		
	  </tr>
	  <tr>	
		<td colspan="3"><input type="checkbox" id="consenso" name="consenso" value="1">		
			<font color="#EC1B23">Consenso al trattamento dei dati personali e sensibili ai sensi nuovo T.U. Privacy (D.Lgs. 196/03).</font><br />			
		</td>
	  </tr> 	  
	  <tr>
		<td colspan="3">
			<div align="center">
				<input type="button" id="invia" name="invia" value="Invia" onClick="inviaDati();"/>
			</div>
		</td>
	  </tr>
	  <tr>
		<td colspan="3">
			<div align="center">
				<input type="button" id="back" name="back" value="Indietro" onClick="history.back();"/>
			</div>
		</td>
	  </tr>		  
  </table>
  </center>
</form>
</body>
</html>
