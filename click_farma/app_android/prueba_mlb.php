<?php

	
	
	
	
$minumero="998215180";
$numllamado="5114220351";
    
    /******************************************************************************************************************/
    //Realizo la llamada
	if (substr($minumero,0,1)=='9') {
		$strExten="SIP/analysis/268765#56".$minumero;
	}elseif (substr($minumero,0,2)=='51') {
		$strExten="SIP/analysis/268765#".$minumero;
	}

	$strdest =$numllamado;

	//Conexion al server de llamadas
	$strHost = "190.196.70.167";
	$strUser = "jootes";
	$strSecret = "0chanc3yo";

	// DE AQUI A ABAJO MANTENLO IGUAL
		
	#specify the context to make the outgoing call from.  By default, AAH uses from-internal
	#Using from-internal will make you outgoing dialing rules apply
	$strContext = "discado-jootes";
	$strWaitTime = "30";
	$strPriority = "1";
	$strMaxRetry = "2";
	//$strCallerId = "Publicidad <$strdest>, <$strExten>";

		if (substr($strdest,0,2)=='51') {
			$bodytag = str_replace("51", "99051", $numllamado);
			$strCallerId = $bodytag."@".$strHost;
								$strdest = "990".$strdest;
		}else{
			if (substr($strdest,0,1)=='9') {
					$strCallerId = "909".$strdest."@".$strHost;
					$strdest = "90".$strdest;
			}else{
									$strdest = $strdest;
					$strCallerId = $strdest."@".$strHost;
			}
		}


		echo $strCallerId."<br>";
				echo $strExten."<br>";
	
	$length = strlen($strExten);

	$oSocket = fsockopen($strHost, 5038, $errnum, $errdesc) or die("Connection to host failed");
	fputs($oSocket, "Action: login\r\n");
	fputs($oSocket, "Events: off\r\n");
	fputs($oSocket, "Username: $strUser\r\n");
	fputs($oSocket, "Secret: $strSecret\r\n\r\n");
	fputs($oSocket, "Action: originate\r\n");
	fputs($oSocket, "Channel: $strExten\r\n");
	fputs($oSocket, "WaitTime: $strWaitTime\r\n");
	fputs($oSocket, "CallerId: $strCallerId\r\n");
	fputs($oSocket, "Exten: $strdest\r\n");
	fputs($oSocket, "Context: $strContext\r\n");
	fputs($oSocket, "Priority: $strPriority\r\n\r\n");
	fputs($oSocket, "Action: Logoff\r\n\r\n");
	fputs($socket, "Timeout: 15000\r\n" );
	fclose($oSocket);



?>
