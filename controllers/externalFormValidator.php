<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if($_GET['function'] == 'validate1') {
		$hasError = false;
		$listingForm = $_POST['ListingForm'];
		$name = $_POST['ListingForm']['name'];
		$email = $_POST['ListingForm']['email'];
		$phone = $_POST['ListingForm']['phone'];
		$city = $_POST['ListingForm']['city'];
		$CategoriId = $_POST['ListingForm']['CategoriId'];
		$body = $_POST['ListingForm']['body'];

		$url_origin = $_POST['url_origin'];
		$object_type = $_POST['object_type'];
		$object_id = $_POST['object_id'];
		

		$outputArray = Array("emailErr"=>"",
							"nameErr" => "",
							"telErr" => "",
							"cityErr" => "",
							"bodyErr" => "");

		if($name == '' || !preg_match("/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i",$name)){
			$hasError = true;
			$outputArray["nameErr"] = "Ingresar Nombre valido";
		}
		if($email == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)){
			$hasError = true;
			$outputArray["emailErr"] = "Ingresar Email valido";
		}

		if($phone == '' || !preg_match("/^[0-9 -]+$/i",$phone)){
			$hasError = true;
			$outputArray["telErr"] = "Ingresar Teléfono valido";
		}

		if($city == '' || !preg_match("/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i",$city)){
			$hasError = true;
			$outputArray["cityErr"] = "Ingresar Ciudad valida";
		}

		if($body == '' || !preg_match("/^[a-z 0-9 áéíóúñüÁÉÍÓÚÑÜ,.\"]+$/i",$body)){
			$hasError = true;
			$outputArray["bodyErr"] = "Ingresar Comentario valido";
		}

		if(!$hasError){
			echo "showLightBox";
		}else{
			$output = json_encode($outputArray);
			echo $output;	
		}
	}
	if($_GET['function'] == 'sendMail') {
		$hasError = false;
		$providerChecks=$_POST['check-provider'];
		$providerMails=$_POST['mailing-provider'];
		$providerTel=$_POST['tel-provider'];
		$providerTitles=$_POST['title-provider'];
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$city = $_POST['city'];
		$CategoriId = $_POST['CategoriId'];
		$CatName = $_POST['CatName'];
		$CatURL = $_POST['CatURL'];
		$body = $_POST['body'];

		$url_origin = $_POST['url_origin'];
		$object_type = $_POST['object_type'];
		$object_id = $_POST['object_id'];

		$productName = "";

		if(isset($_POST['productName'])){
			if($_POST['productName']!= ""){
				$productName = $_POST['productName'];
			}
		}

		$subject_cliente ="Cotización Cliente - Guía de proveedores de ferreterias construcción eléctricos e industriales!";
		$email_subject = "Cotización - Guía de proveedores de ferreterias construcción eléctricos e industriales!";

		$adminMailing="ebusiness@axioma.com.co, mpena@axioma.com.co, hsalvador@axioma.com.co,trafficker@revistalabarra.com,ihincapie@revistalabarra.com, desarrolladorback@revistalabarra.com, desarrolladorfront@revistalabarra.com,  gerente@revistafierros.com,";

		if($name == '' || !preg_match("/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i",$name)
			|| $email == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)
			|| $phone == '' || !preg_match("/^[0-9 -]+$/i",$phone)
			|| $city == '' || !preg_match("/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i",$city)){
			die("Error_fields");
		}

		if ($body == '' || !preg_match("/^[a-z 0-9 áéíóúñüÁÉÍÓÚÑÜ,.\"]+$/i",$body)) {
			die("Error_body");
		}
		
		if(count($providerChecks) <= 0){
			die("SendBronzeMail");
		}

		require_once('../protected/components/messageContactForm.php');
		require_once('external-guiaAnalitica.php');

		$headers= 'MIME-Version: 1.0' . "\r\n";
		$headers.= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers.= 'From: Revista Fierros<fierros@fie.fierros.com.co>'."\r\n";

		$apiAnalityc = new ApiAnalityc();

		foreach ($providerChecks as $key => $value) {
			$mailTo = $adminMailing . ",".$providerMails[$key];
			
			// print_r($_SERVER['REMOTE_ADDR']);
			// die();

			
			$formProveedor= formularioProveedor_recomendado($name,$email,$phone,$city,$body,"",$providerTitles[$key],$CatName,$CatURL,$productName);

			if($body == "prueba" || $email == "desarrolladorback@revistalabarra.com" || $name =="prueba"){
				$mailTo="desarrolladorback@revistalabarra.com,ebusiness@axioma.com.co";
			}

			$formCliente=formularioCliente($name,$providerTitles[$key],$Pagina, $providerMails[$key],$providerTel[$key]);
			$result = mail($mailTo, $subject_cliente, $formProveedor, $headers);
			
			if(!$result) {   
				die("Error_mail");
			} else {
				$apiAnalityc->actionContactAnalityc($key);
				mail($email, $email_subject, $formCliente, $headers);
			}
		}
		die("Success_mail");
	}
}

