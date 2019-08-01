<?php 

class db_connection

{

	private $hostname;

	private $username;

	private $password;

	private $dbname;

	private $connection;



	function __construct($hostname, $username, $password, $dbname)

	{

		$this->hostname=$hostname;;

		$this->username= $username;;

		$this->password= $password;;

		$this->dbname= $dbname;;



		$this->connection = new mysqli($hostname, $username, $password,$dbname);

		$this->connection->set_charset("utf8");



		if ($this->connection->connect_error) {

		    die("Falló la conexión: " . $this->connection->connect_error);

		    exit();

		} 

		return "Conexión Exitosa";

	}



	function __destruct ( ){

		$this->connection->close();

	}



	public function query($query=''){

		$output = '';

		if ($this->connection->connect_errno) {

		    printf("Falló la conexión: %s\n", $this->connection->connect_error);

		    exit();

		}





		$request = $this->connection->query($query);



		if (!$request) 

		    $output ="Errormessage: %s\n" . $this->connection->error;

		else{

			if(!$request){

				$message  = '<b>Invalid query:</b><br>' . mysql_error() . '<br><br>';

				die($message);	

			}else{

				if(!is_bool($request))

				{

					try {

						while($r = mysqli_fetch_assoc($request)) {

					    	$output[] = $r;

						}	

					} catch (Exception $e) {

						echo $e;

						echo $query;

					}

				}

				else

					$output= $request;

			}

		}

		return $output;

	}

}



class ApiAnalityc extends db_connection{



	function __construct()	{

		parent::__construct('localhost', 'fierros_guiasuer', 'administrador2', 'fierros_guia2');

	}



	public function actionContactAnalityc($object_id){

		

		if($_POST){

			$email = $_POST['email'];

			$query = "SELECT * FROM pmd_lead WHERE pmd_lead.name LIKE \"%".$email."%\" OR pmd_lead.mail LIKE \"%".$email."%\"";

			$modelLeadVerify = $this->query($query);



			if($modelLeadVerify){

				$this->addLeadCategory($modelLeadVerify);

				$this->addLeadContact($modelLeadVerify,$object_id);

			}

			else{

				$name = $_POST['name'];

				

				$phone = $_POST['phone'];

				$create_date=date("Y-m-d H:i:s"); 



				$query = "INSERT INTO pmd_lead (name ,mail ,phone ,create_date)

							VALUES('$name', '$email', '$phone', '$create_date');";



				$modelLead = $this->query($query);

				

				if($modelLead){

					$query = "SELECT * FROM pmd_lead WHERE pmd_lead.name LIKE \"%".$email."%\" OR pmd_lead.mail LIKE \"%".$email."%\"";

					$modelLead = $this->query($query);

					$this->addLeadCategory($modelLead);

					$this->addLeadContact($modelLead,$object_id);

				}else{

					die("Error registrando el lead");

				}

			}

		}else{

			die("Error al intentar ingresar a la función");

		}

	}



	public function addLeadCategory($model){

		$leadID = $model[0]['id'];

		$category_id = $_POST['CategoriId'];



		$query = "INSERT INTO pmd_lead_category (lead_id,category_id) VALUES($leadID,$category_id);";

		$modelLeadVerify = $this->query($query);

		return 	$modelLeadVerify;

	}

	public function addLeadContact($model,$object_id){

		$lead_id = $model[0]['id'];

		$status_id = '1';

		$data_type_id = '4';

		$create_date = date("Y-m-d H:i:s");

		$body = $_POST['body'];

		$location = $_POST['city'];

		$origin_url = $_POST['url_origin'];

		$ip = $_SERVER['REMOTE_ADDR'];

		$object_type_id = $_POST['object_type'] || $_POST['object_type'] !='' ? $_POST['object_type'] : 1 ;


		$query = "INSERT INTO pmd_contact(lead_id ,object_id ,object_type_id ,status_id ,data_type_id ,create_date ,body ,location ,origin_url ,ip)

				 VALUES($lead_id,$object_id,$object_type_id, $status_id,$data_type_id, '$create_date','$body', '$location','$origin_url','$ip')";

		$modelLeadContact = $this->query($query);

		return 	$modelLeadContact;

	}

}

