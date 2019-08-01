<?php

class ApiController extends Controller
{

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	 // Members
    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers 
     */
    Const APPLICATION_ID = 'ASCCPE';
    /**
     * Default response format
     * either 'json' or 'xml'
     */
    private $format = 'json';
    /**
     * @return array action filters
     */
    public function filters()
    {
            return array();
    }
    // Actions
    public function actionList()
    {
    }
	
	//optimize images
    public function actionImage(){
        
        //type image
        switch($_POST['type'])
        {
        // Get an instance of the respective model
        case 'classified':
        
            //Here we define the paths where the files will be stored
            $path = realpath( Yii::app( )->getBasePath( )."/../files/classifieds/" )."/";
            $publicPath  = Yii::app( )->getBaseUrl( )."/files/classifieds/";
            $pathThumb = realpath( Yii::app( )->getBasePath( )."/../files/classifieds/thumb/" )."/";
            $publicPathThumb  = Yii::app( )->getBaseUrl( )."/files/classifieds/thumb/";
            
            $filename = $_POST['name'];
            //verify if exist thumb
            if(!file_exists($pathThumb.$filename)) {
                //crear Thumb size
                $image = new EasyImage($path.$filename);
                $image->scaleAndCrop(273,182);
                
                if($image->save($pathThumb.$filename)){
                    //return url thumb  
                    echo '{"url":"'.$publicPathThumb.$filename.'","resized":"new"}'; 
                }else{
                    //return url original image
                    echo '{"url":"'.$publicPath.$filename.'","resized":"false"}';   
                }
                //destroy var image
                $image=NULL;
            }else{
                //return url thumb  
                echo '{"url":"'.$publicPathThumb.$filename.'","resized":"exist"}'; 
            }
                           
            break;
            
        case 'listing':
        
            //Here we define the paths where the files will be stored
            $path = realpath( Yii::app( )->getBasePath( )."/../files/logo/" )."/";
            $publicPath  = Yii::app( )->getBaseUrl( )."/files/logo/";
            $pathThumb = realpath( Yii::app( )->getBasePath( )."/../files/logo/thumbnails/mini/" )."/";
            $publicPathThumb  = Yii::app( )->getBaseUrl( )."/files/logo/thumbnails/mini/";
            
            $filename = $_POST['name'];
            //verify if exist thumb
            if(!file_exists($pathThumb.$filename)) {
                //crear Thumb size
                $image = new EasyImage($path.$filename);
                $image->scaleAndCrop(150,60);
                
                if($image->save($pathThumb.$filename)){
                    //return url thumb  
                    echo '{"url":"'.$publicPathThumb.$filename.'","resized":"new"}'; 
                }else{
                    //return url original image
                    echo '{"url":"'.$publicPath.$filename.'","resized":"false"}';   
                }
                //destroy var image
                $image=NULL;
            }else{
                //return url thumb  
                echo '{"url":"'.$publicPathThumb.$filename.'","resized":"exist"}'; 
            }
                           
            break;
			
		case 'edicion':
        
            //Here we define the paths where the files will be stored
            $path = realpath( Yii::app( )->getBasePath( )."/../files/blog/" )."/";
            $publicPath  = Yii::app( )->getBaseUrl( )."/files/blog/";
            $pathThumb = realpath( Yii::app( )->getBasePath( )."/../files/blog/thumb/" )."/";
            $publicPathThumb  = Yii::app( )->getBaseUrl( )."/files/blog/thumb/";
            
            $filename = $_POST['name'];
            //verify if exist thumb
            if(!file_exists($pathThumb.$filename)) {
                //crear Thumb size
                $image = new EasyImage($path.$filename);
                $image->scaleAndCrop(226,170);
                
                if($image->save($pathThumb.$filename)){
                    //return url thumb  
                    echo '{"url":"'.$publicPathThumb.$filename.'","resized":"new"}'; 
                }else{
                    //return url original image
                    echo '{"url":"'.$publicPath.$filename.'","resized":"false"}';   
                }
                //destroy var image
                $image=NULL;
            }else{
                //return url thumb  
                echo '{"url":"'.$publicPathThumb.$filename.'","resized":"exist"}'; 
            }
                           
            break;
			
		case 'edicion_mini':
        
            //Here we define the paths where the files will be stored
            $path = realpath( Yii::app( )->getBasePath( )."/../files/blog/" )."/";
            $publicPath  = Yii::app( )->getBaseUrl( )."/files/blog/";
            $pathThumb = realpath( Yii::app( )->getBasePath( )."/../files/blog/thumb/mini/" )."/";
            $publicPathThumb  = Yii::app( )->getBaseUrl( )."/files/blog/thumb/mini/";
            
            $filename = $_POST['name'];
            //verify if exist thumb
            if(!file_exists($pathThumb.$filename)) {
                //crear Thumb size
                $image = new EasyImage($path.$filename);
                $image->scaleAndCrop(62,82);
                
                if($image->save($pathThumb.$filename)){
                    //return url thumb  
                    echo '{"url":"'.$publicPathThumb.$filename.'","resized":"new"}'; 
                }else{
                    //return url original image
                    echo '{"url":"'.$publicPath.$filename.'","resized":"false"}';   
                }
                //destroy var image
                $image=NULL;
            }else{
                //return url thumb  
                echo '{"url":"'.$publicPathThumb.$filename.'","resized":"exist"}'; 
            }
                           
            break;
            
        default:
            $this->_sendResponse(501, 
                sprintf('Mode <b>image</b> is not implemented for type <b>%s</b>',
                $_GET['type']) );
                Yii::app()->end();
        }   
        
    }
	
    public function actionView()
    {
		//echo 'View '.$_GET['model'];
		//var_dump($_GET);
		switch($_GET['model'])
    	{
        // Get an instance of the respective model
		case 'measure':
			preg_match('%^(.*)\/(.*)\.html$%', $_POST['url'], $matches);
            echo '{"object_id":"'.$_POST['object_id'].'","url":"'.$matches[2].'"}';                 
            break;
        default:
            $this->_sendResponse(501, 
                sprintf('Mode <b>view</b> is not implemented for model <b>%s</b>',
                $_GET['model']) );
                Yii::app()->end();
    	}
    }
    public function actionCreate(){
		//var_dump($_GET);
		switch($_GET['model'])
    	{
        // Get an instance of the respective model
        case 'measure':
            $model = new Measure;
			
			if(!isset($_POST['client_ip']))
			$model->client_ip = $_REQUEST['REMOTE_ADDR'];
			else
			$model->client_ip = $_POST['ip'];
			
			if(!isset($_POST['url_origin']))
			$model->url_origin = $_REQUEST['REMOTE_ADDR'];
			else
			$model->url_origin = $_POST['url_origin'];
			//echo '{"schedule":"'.$model->id.'"}';                 
            break;
        default:
            $this->_sendResponse(501, 
                sprintf('Mode <b>create</b> is not implemented for model <b>%s</b>',
                $_GET['model']) );
                Yii::app()->end();
    	}
	$msg="Antes";
    // Try to assign POST values to attributes
    foreach($_POST as $var=>$value) {
			$msg .='<br>var: '.$var." value:".$value."";
        if($var!='model'){
		// Does the model have this attribute? If not raise an error
        if($model->hasAttribute($var)){
            $model->$var = $value;
			if(preg_match('%^(.*)\/(.*)\.html$%', $value, $matches))
			$model->$var = $matches[2];
		}
        else
            $this->_sendResponse(500, 
                sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var,
                $_GET['model']) );
		}
				
    }
	if(!isset($model->data_type_id) || $model->data_type_id==''){
		$model->data_type_id='5';
	}
	$model->create_date = date("Y-m-d H:i:s"); 
	if($model->client_ip!=''){
    // Try to save the model
		if($model->save())
			$this->_sendResponse(200, CJSON::encode($model));
		else {
			// Errors occurred
			$msg .= "<h1>Error</h1>";
			$msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
			$msg .= "<ul>";
			foreach($model->errors as $attribute=>$attr_errors) {
				$msg .= "<li>Attribute: $attribute</li>";
				$msg .= "<ul>";
				foreach($attr_errors as $attr_error)
					$msg .= "<li>$attr_error</li>";
				$msg .= "</ul>";
			}
			$msg .= "</ul>";
			$this->_sendResponse(500, $msg );
		}
	}else{
		$msg .= "<h1>Error</h1>";
			$msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
			$msg .= "<ul>";
			foreach($model->errors as $attribute=>$attr_errors) {
				$msg .= "<li>Attribute: $attribute</li>";
				$msg .= "<ul>";
				foreach($attr_errors as $attr_error)
					$msg .= "<li>$attr_error</li>";
				$msg .= "</ul>";
			}
			$msg .= "</ul>";
			$this->_sendResponse(500, $msg );
	}
    }
    public function actionUpdate()
    {
    }
    public function actionDelete()
    {
		//
		
		//var_dump($_GET);
		switch($_GET['model'])
    	{
        // Get an instance of the respective model
        default:
            $this->_sendResponse(501, 
                sprintf('Mode <b>view</b> is not implemented for model <b>%s</b>',
                $_GET['model']) );
                Yii::app()->end();
    	}
    }
	
	
	
//Registro Vendor Categoria 
	public function actionContactAnalitycVendor($post_array,$Listings){
		if($post_array){
			$modelLeadVerify = Lead::model()->findByAttributes(array('mail'=>$post_array['ContactForm']['email']));
			if($modelLeadVerify->mail == $post_array['ContactForm']['email'] ){
				ApiController::addLeadCategoryVendor($modelLeadVerify,$post_array);
			if(count($Listings)>0){
				ApiController::addLeadContactVendor($modelLeadVerify,$post_array,$Listings);
			}
			}else{
				$modelLead = new Lead;
				$modelLead->attributes=$post_array['ContactForm'];
				$modelLead->mail=$post_array['ContactForm']['email'];
				$modelLead->id='';
				$modelLead->create_date=date("Y-m-d H:i:s"); 
				$modelLead->ip = $_SERVER['REMOTE_ADDR'];
				$modelLead->cedula = $post_array['ContactForm']['cedula'];
				
				if($modelLead->save()){
					$modelLead = Lead::model()->findByAttributes(array('mail'=>$modelLead->mail));
					ApiController::addLeadCategoryVendor($modelLead,$post_array);
				if(count($Listings)>0){
					ApiController::addLeadContactVendor($modelLead,$post_array,$Listings);
				}
				}else{
					$msg .= "<h1>Error</h1>";
					$msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
					$msg .= "<ul>";
					foreach($modelLead->errors as $attribute=>$attr_errors) {
						$msg .= "<li>Attribute: $attribute</li>";
						$msg .= "<ul>";
						foreach($attr_errors as $attr_error)
							$msg .= "<li>$attr_error</li>";
						$msg .= "</ul>";
					}
					$msg .= "</ul>";
					$this->_sendResponse(500, $msg );
				}
			}
		}else{
			$msg .= "<h1>Error</h1>";
			$msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
			$msg .= "<ul>";
			foreach($model->errors as $attribute=>$attr_errors) {
				$msg .= "<li>Attribute: $attribute</li>";
				$msg .= "<ul>";
				foreach($attr_errors as $attr_error)
					$msg .= "<li>$attr_error</li>";
				$msg .= "</ul>";
			}
			$msg .= "</ul>";
			$this->_sendResponse(500, $msg );
		}		
	}	
	
//Registro Cotice aqu�. producto, Proveedores	
	public function actionContactAnalityc($post_array){
		if($post_array){
			$modelLeadVerify = Lead::model()->findByAttributes(array('mail'=>$post_array['ListingForm']['email']));
			if($modelLeadVerify->mail == $post_array['ListingForm']['email'] ){
				ApiController::addLeadCategory($modelLeadVerify,$post_array);
				ApiController::addLeadContact($modelLeadVerify,$post_array);
			}else{
				$modelLead = new Lead;
				$modelLead->attributes=$post_array['ListingForm'];
				$modelLead->mail=$post_array['ListingForm']['email'];
				$modelLead->id='';
				$modelLead->create_date=date("Y-m-d H:i:s"); 
				$modelLead->ip = $_SERVER['REMOTE_ADDR'];
				$modelLead->cedula = $post_array['ListingForm']['cedula'];
				
				if($modelLead->save()){
					$modelLead = Lead::model()->findByAttributes(array('mail'=>$modelLead->mail));
					ApiController::addLeadCategory($modelLead,$post_array);
					ApiController::addLeadContact($modelLead,$post_array);
				}else{
					$msg .= "<h1>Error</h1>";
					$msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
					$msg .= "<ul>";
					foreach($modelLead->errors as $attribute=>$attr_errors) {
						$msg .= "<li>Attribute: $attribute</li>";
						$msg .= "<ul>";
						foreach($attr_errors as $attr_error)
							$msg .= "<li>$attr_error</li>";
						$msg .= "</ul>";
					}
					$msg .= "</ul>";
					$this->_sendResponse(500, $msg );
				}
			}
		}else{
			$msg .= "<h1>Error</h1>";
			$msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
			$msg .= "<ul>";
			foreach($model->errors as $attribute=>$attr_errors) {
				$msg .= "<li>Attribute: $attribute</li>";
				$msg .= "<ul>";
				foreach($attr_errors as $attr_error)
					$msg .= "<li>$attr_error</li>";
				$msg .= "</ul>";
			}
			$msg .= "</ul>";
			$this->_sendResponse(500, $msg );
		}		
	}
	
	public function addLeadContactVendor($model,$post_array,$Listings){
		$modelLeadContact = new Contact;
		$ciudades="";
		foreach($post_array['ContactForm']['city'] as $ciudad){
			$modeLocations=Locations::model()->findByPk($ciudad);
			$ciudades.= $modeLocations->title.",";
		}
		foreach($Listings as $listing){
			$modelLeadContact = new Contact;
			$modelLeadContact->lead_id = $model->id;
			$modelLeadContact->object_id = $listing['idListing'];
			$modelLeadContact->object_type_id = 1;
			$modelLeadContact->status_id = '1';
			$modelLeadContact->data_type_id = '6';
			$modelLeadContact->create_date = date("Y-m-d H:i:s");
			$modelLeadContact->body = $post_array['ContactForm']['body'];
			$modelLeadContact->location = $ciudades;
			$modelLeadContact->origin_url = $post_array['url_origin'];
			$modelLeadContact->ip = $_SERVER['REMOTE_ADDR'];
			if(!$modelLeadContact->save()){
				$msg .= "<h1>Error</h1>";


				$msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
				$msg .= "<ul>";
				foreach($modelLeadContact->errors as $attribute=>$attr_errors) {
					$msg .= "<li>Attribute: $attribute</li>";
					$msg .= "<ul>";
					foreach($attr_errors as $attr_error)
						$msg .= "<li>$attr_error</li>";
					$msg .= "</ul>";
				}
				$msg .= "</ul>";
				$this->_sendResponse(500, $msg );
			}
		}
	}
	
	public function addLeadContact($model,$post_array){
		/*echo "Modelo";
		var_dump($model);
		echo "<br />";
		echo "POST";
		var_dump($post_array);*/
		
		
		$modelLeadContact = new Contact;
		$modelLeadContact->lead_id = $model->id;
		$modelLeadContact->object_id = $post_array['object_id'];
		$modelLeadContact->object_type_id = $post_array['object_type'];
		$modelLeadContact->status_id = '1';
		$modelLeadContact->data_type_id = '4';
		$modelLeadContact->create_date = date("Y-m-d H:i:s");
		$modelLeadContact->body = $post_array['ListingForm']['body'];
		$modelLeadContact->location = $post_array['ListingForm']['city'];
		$modelLeadContact->origin_url = $post_array['url_origin'];
		$modelLeadContact->ip = $_SERVER['REMOTE_ADDR'];
		if(!$modelLeadContact->save()){
			$msg .= "<h1>Error</h1>";
			$msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
			$msg .= "<ul>";
			foreach($modelLeadContact->errors as $attribute=>$attr_errors) {
				$msg .= "<li>Attribute: $attribute</li>";
				$msg .= "<ul>";
				foreach($attr_errors as $attr_error)
					$msg .= "<li>$attr_error</li>";
				$msg .= "</ul>";
			}
			$msg .= "</ul>";
			$this->_sendResponse(500, $msg );
		}
	}
	public function addLeadCategory($model,$post_array){
		$modelCategoryLead = new LeadCategory;
		$modelCategoryLead->lead_id = $model->id;
		$modelCategoryLead->category_id = $post_array['ListingForm']['CategoriId'];
		if(!$modelCategoryLead->save()){
			$msg .= "<h1>Error</h1>";
			$msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
			$msg .= "<ul>";
			foreach($modelCategoryLead->errors as $attribute=>$attr_errors) {
				$msg .= "<li>Attribute: $attribute</li>";
				$msg .= "<ul>";
				foreach($attr_errors as $attr_error)
					$msg .= "<li>$attr_error</li>";
				$msg .= "</ul>";
			}
			$msg .= "</ul>";
			$this->_sendResponse(500, $msg );
		}
	}
	
	
	public function addLeadCategoryVendor($model,$post_array){
		$modelCategoryLead = new LeadCategory;
		$modelCategoryLead->lead_id = $model->id;
		"categoriass".$modelCategoryLead->category_id = $post_array['ContactForm']['CategoriId'][0];
		if(!$modelCategoryLead->save()){
			$msg .= "<h1>Error</h1>";
			$msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
			$msg .= "<ul>";
			foreach($modelCategoryLead->errors as $attribute=>$attr_errors) {
				$msg .= "<li>Attribute: $attribute</li>";
				$msg .= "<ul>";
				foreach($attr_errors as $attr_error)
					$msg .= "<li>$attr_error</li>";
				$msg .= "</ul>";
			}
			$msg .= "</ul>";
			$this->_sendResponse(500, $msg );
		}
	}
	
	private function _sendResponse($status = 200, $body = '', $content_type = 'text/html')
{
    // set the status
    $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
    header($status_header);
    // and the content type
    header('Content-type: ' . $content_type);
 
    // pages with body are easy
    if($body != '')
    {
        // send the body
        echo $body;
    }
    // we need to create the body if none is passed
    else
    {
        // create some body messages
        $message = '';
 
        // this is purely optional, but makes the pages a little nicer to read
        // for your users.  Since you won't likely send a lot of different status codes,
        // this also shouldn't be too ponderous to maintain
        switch($status)
        {
            case 401:
                $message = 'You must be authorized to view this page.';
                break;
            case 404:
                $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
                break;
            case 500:
                $message = 'The server encountered an error processing your request.';
                break;
            case 501:
                $message = 'The requested method is not implemented.';
                break;
        }
 
        // servers don't always have a signature turned on 
        // (this is an apache directive "ServerSignature On")
        $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];
 
        // this should be templated in a real-world solution
        $body = '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
</head>
<body>
    <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
    <p>' . $message . '</p>
    <hr />
    <address>' . $signature . '</address>
</body>
</html>';
 
        echo $body;
    }
    Yii::app()->end();
}


private function _getStatusCodeMessage($status)
{
    // these could be stored in a .ini file and loaded
    // via parse_ini_file()... however, this will suffice
    // for an example
    $codes = Array(
        200 => 'OK',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
    );
    return (isset($codes[$status])) ? $codes[$status] : '';
}


private function _checkAuth()
{
    // Check if we have the USERNAME and PASSWORD HTTP headers set?
    if(!(isset($_SERVER['HTTP_X_USERNAME']) and isset($_SERVER['HTTP_X_PASSWORD']))) {
        // Error: Unauthorized
        $this->_sendResponse(401);
    }
    $username = $_SERVER['HTTP_X_USERNAME'];
    $password = $_SERVER['HTTP_X_PASSWORD'];
    // Find the user
    $user=User::model()->find('LOWER(username)=?',array(strtolower($username)));
    if($user===null) {
        // Error: Unauthorized
        $this->_sendResponse(401, 'Error: User Name is invalid');
    } else if(!$user->validatePassword($password)) {
        // Error: Unauthorized
        $this->_sendResponse(401, 'Error: User Password is invalid');
    }
}
}