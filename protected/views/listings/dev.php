<?php
/* @var $this ListingsController */
/* @var $model Listings */
$publickey = "6LcjjwETAAAAAABVhWdgfu9i7_K0m3PLTNB1Vk8Q"; // you got this from the signup page

$this->breadcrumbs=array(
	'Listings'=>array('index'),
	$model->title,
);

$categories = Categories::model()->findByAttributes(array('id'=>$model->primary_category_id)); 
 
 	
if($categories->parent_id>1){
	$categoriePadre = Categories::model()->findByAttributes(array('id'=>$categories->parent_id)); 
}

$titleCategories="";

if($categories!=""){
	$titleCategories.= $categories->title." - ";
}
if($categoriePadre!=""){
	$titleCategories.= $categoriePadre->title." - ";
}
//get current pagination products
$re = "%^(.*)Classifieds_page\/(.*)$%"; 
$str = $_SERVER['REQUEST_URI'];
if(preg_match($re, $str, $matches)){
    $uriVar = 'Classifieds_page/'.$matches[2];
    $pageProducts = 'Prod. Pág. '.$matches[2];
}else{
    $uriVar = NULL;
    $pageProducts = NULL;   
}
 
$nameSite = strtr($model->title,Yii::app()->params->unwanted_array).' - '.$titleCategories.$pageProducts." - ".Yii::app()->name;
Yii::app()->clientScript->registerLinkTag('canonical',NULL,'http://'.$_SERVER['HTTP_HOST'].'/guia/'.CHtml::encode($model->friendly_url).'.html'.(isset($uriVar)?'?'.$uriVar:''),NULL);
Yii::app()->clientScript->registerLinkTag('shortlink',NULL,'http://'.$_SERVER['HTTP_HOST'].'/guia/listings/view/id/'.$model->id.(isset($uriVar)?'/'.$uriVar:''),NULL);
$this->setPageTitle($nameSite);

Yii::app()->clientScript->registerMetaTag($model->meta_description, 'Description');
Yii::app()->clientScript->registerMetaTag($model->meta_keywords, 'keywords');
if($model->latitude && $model->longitude && $model->latitude != 0 && $model->longitude != 0){ 
Yii::app()->clientScript->registerMetaTag($model->latitude.';'.$model->longitude, 'geo.position');
}
?>
<script type="text/javascript">
	/*$(document).ready(function(){
	localStorage.setItem('object_id', '<? echo $model->id; ?>');
	localStorage.setItem('object_id_tmp', '<? echo $model->id; ?>');
	localStorage.setItem('object_type', '1');
	localStorage.setItem('object_type_tmp', '1');
	localStorage.setItem('data_type','3');
	localStorage.setItem('data_type_tmp','3');
    $(".btn-primary").popover({placement : 'top'});
});*/

var codeCSS = '<style>hr,input[type=search]{box-sizing:content-box;moz-box-sizing:content-box;webkit-box-sizing:content-box}:after,:before,input[type=checkbox],input[type=radio]{box-sizing:border-box;webkit-box-sizing:border-box}* Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE) */html,html{font-family:sans-serif;ms-text-size-adjust:100%;webkit-text-size-adjust:100%}.modal .form-control{border:none}.modal input-group-addon{border-radius:10px 0 0 10px}.input-group{border-collapse:separate;display:table;position:relative;width:80%}.input-group-addon{background-color:#eee;border:none;border-radius:10px;color:#555;font-size:14px;font-weight:400;line-height:1;padding:6px 10px;text-align:center}legend,td,th{padding:0}.input-group-addon,.input-group-btn{vertical-align:middle;white-space:nowrap;width:1%}.input-group .form-control,.input-group-addon,.input-group-btn{display:table-cell}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.btn-group>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn-group:not(:last-child)>.btn,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-bottom-right-radius:0;border-top-right-radius:0}hr,img,legend{border:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,optgroup,strong{font-weight:700}dfn{font-style:italic}h1{font-size:2em;margin:.67em 0}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}.modal-body,img{vertical-align:middle}sup{top:-.5em}sub{bottom:-.25em}.modal,.modal-backdrop{bottom:0;left:0;right:0;top:0}svg:not(:root){overflow:hidden}hr{height:0;border-top:1px solid #eee;margin-bottom:20px;margin-top:20px}pre,textarea{overflow:auto}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}button,input,optgroup,select,textarea{font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type=button],input[type=reset],input[type=submit]{cursor:pointer;webkit-appearance:button}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input[type=checkbox],input[type=radio]{moz-box-sizing:border-box;padding:0}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{height:auto}input[type=search]{webkit-appearance:textfield}*,:after,:before{moz-box-sizing:border-box}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{webkit-appearance:none}table{border-collapse:collapse;border-spacing:0}button,input,select,textarea{font-family:inherit;font-size:inherit;line-height:inherit}a:focus,a:hover{text-decoration:underline}a:focus{outline:dotted thin;outline-offset:-2px}.img-responsive{display:block;height:auto;max-width:100%}.img-rounded{border-radius:6px}.img-thumbnail{border-radius:4px;display:inline-block;height:auto;line-height:1.42857143;max-width:100%;o-transition:all .2s ease-in-out;padding:4px;transition:all .2s ease-in-out;webkit-transition:all .2s ease-in-out}.img-circle{border-radius:50%}.sr-only{border:0;clip:rect(0,0,0,0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px}.sr-only-focusable:active,.sr-only-focusable:focus{clip:auto;height:auto;margin:0;overflow:visible;position:static;width:auto}.modal,.modal-open{overflow:hidden}[role=button]{cursor:pointer}.modal{display:none;outline:0;position:fixed;webkit-overflow-scrolling:touch;z-index:1050}.modal.fade .modal-dialog{ms-transform:translate(0,-25%);o-transform:translate(0,-25%);o-transition:-o-transform .3s ease-out;transform:translate(0,-25%);transition:transform .3s ease-out;webkit-transform:translate(0,-25%);webkit-transition:-webkit-transform .3s ease-out}.modal.in .modal-dialog{ms-transform:translate(0,0);o-transform:translate(0,0);transform:translate(0,0);webkit-transform:translate(0,0)}.modal-open .modal{overflow-x:hidden;overflow-y:auto}.modal-dialog{margin:10px;position:relative;width:auto}.modal-content{background-clip:padding-box;background-color:#fff;border:1px solid #999;border:1px solid rgba(0,0,0,.2);border-radius:6px;box-shadow:0 3px 9px rgba(0,0,0,.5);outline:0;position:relative;webkit-background-clip:padding-box;webkit-box-shadow:0 3px 9px rgba(0,0,0,.5)}.modal-backdrop{background-color:#FFF;position:fixed;z-index:1040}.modal-backdrop.fade{filter:alpha(opacity=0);opacity:0}.modal-backdrop.in{filter:alpha(opacity=50);opacity:.5}.modal-header{border-bottom:1px solid #e5e5e5;padding:15px}.modal .close{background-color:#5B5B5F;border-color:#5B5B5F;border-radius:100px;color:#fff;float:right;font-size:50px;font-weight:700;height:45px;margin:-15px;width:45px}.modal-title{line-height:1.42857143;margin:0}.modal-body{background-color:#8DC63F;border-radius:6px;color:#fff;height:100%;padding:15px;text-align:center}.modal-footer{border-top:1px solid #e5e5e5;padding:15px;text-align:right}.modal-footer .btn+.btn{margin-bottom:0;margin-left:5px}.modal-footer .btn-group .btn+.btn{margin-left:-1px}.modal-footer .btn-block+.btn-block{margin-left:0}.modal-scrollbar-measure{height:50px;overflow:scroll;position:absolute;top:-9999px;width:50px}@media (min-width:768px){.modal-dialog{margin:30px auto;width:600px}.modal-content{box-shadow:0 5px 15px rgba(0,0,0,.5);webkit-box-shadow:0 5px 15px rgba(0,0,0,.5)}.modal-sm{width:300px}}@media (min-width:992px){.modal-lg{width:900px}}.clearfix:after,.clearfix:before,.modal-footer:after,.modal-footer:before,.modal-header:after,.modal-header:before{content:" ";display:table}.clearfix:after,.modal-footer:after,.modal-header:after{clear:both}.center-block{display:block;margin-left:auto;margin-right:auto}.pull-right{float:right!important}.pull-left{float:left!important}.hide{display:none!important}.show{display:block!important}.invisible{visibility:hidden}.text-hide{background-color:transparent;border:0;color:transparent;font:0/0 a;text-shadow:none}.hidden{display:none!important}.modal-dialog,.modal:before{display:inline-block;vertical-align:middle}.affix{position:fixed}.modal{text-align:center}@media screen and (min-width:768px){.modal:before{content:" ";display:inline-block;height:100%;vertical-align:middle}}.modal-dialog{text-align:left;background:0 0;border:none;box-shadow:none}.modal:before{content:" ";height:100%}.input-lg{border-radius:6px;font-size:18px;height:46px;line-height:1.3333333;padding:10px 16px}.modal .form-control{background-color:#fff!important;background-image:none;border-radius:4px;box-shadow:inset 0 1px 1px rgba(0,0,0,.075);color:#555!important;display:inline-block!important;o-transition:border-color ease-in-out .15s,box-shadow ease-in-aout .15s;transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);webkit-transition:border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s}.modal .title{color:#fff;font-size:24px;font-weight:700;line-height:31px}.modal form{display:inline-flex;margin:auto;width:80%}button.btn.newsletter{background-color:#008639;border-radius:0 10px 10px 0;display:inline-block;font-size:20px;margin:0 0 0 -27px;width:25%}input.form-control.input-lg.newsletter{border-radius:0}.modal small{color:#008639;display:inline-block;font-weight:800;line-height:13px;text-align:left;width:80%}</style>';

var codeHtml = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modalNewsletter">Large modal</button>'+
				'<div class="modal fade modalNewsletter" id="modalNewsletter" tabindex="-1" role="dialog" aria-labelledby="Modal Newsletter">'+
				  '<div class="modal-dialog">'+
					'<div class="modal-content">'+
						'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
					  '<div class="modal-body">'+
						'<h1 class="title">ENCUENTRE LAS NOTICIAS MÁS IMPORTANTES DEL SECTOR DE LA INDUSTRIA DE ALIMENTOS EN SU CORREO</h1>'+
						'<form name="formNewsletter" id="formNewsletter" action="/suscripcion-al-newsletter" method="post">'+
							'<div class="input-group">'+
								'<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>'+
								'<input type="email" name="NewsletterFormModal[email]" id="NewsletterFormModal_email" class="form-control input-lg newsletter" placeholder="Ingrese su correo electrónico" aria-hidden="true" required ></i>">'+
								'<!-- Area -->'+
								'<input type="hidden" name="NewsletterFormModal[area]" id="NewsletterFormModal_area" value="General - Todos">'+
								'<!-- industria-->'+
								'<input type="hidden" name="NewsletterFormModal[industria]" id="NewsletterFormModal_industria" value="General - Todos">'+
								'<input type="hidden" value="modal" name="ajax" id="ajax">'+
							'</div>'+
							'<button type="submit" class="btn newsletter">Envíar</button>'+
						'</form>'+
						'<small>*Al suscribirse está aceptando que de forma segura y confidencial su ingreso a nuestra base de datos de comunicación propia y de terceros.</small>'+
					  '</div>'+
					'</div><!-- /.modal-content -->'+
				  '</div><!-- /.modal-dialog -->'+
				'</div><!-- /.modal -->';
	
function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname+"="+cvalue+"; "+expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(cname) {
    var user=getCookie(cname);
    if (user != "") {
        return user;
    } else {
       return false;
    }
}

function openModal(){
	var cname = "modalNewsletter";
	if(checkCookie(cname)==false){
		$('#modalNewsletter').modal('show');
		setCookie(cname, true, 8);
	}
	
	console.info('hola');
}

$(document).ready(function(e) {
	$('body').append(codeHtml);
	$('body').append(codeCSS);
    modalInt = setTimeout(function() { openModal(); }, 20000);
	var frm = $('#formNewsletter');
	frm.submit(function(e) {
        e.preventDefault();
		$.ajax({
			type: frm.attr('method'),
			url: frm.attr('action'),
			data: frm.serialize(),
			dataType:"json",
			cache:false,
			success: function (data) {
				var success = data.success;
				var error = data.error;
				if(success.length > 0){
					$('.modal-body').html('<h1 class="title">'+success+'</h1>');
					$('#modalNewsletter').modal('handleUpdate');
					setTimeout(function() { $('#modalNewsletter').modal('hide'); }, 5000);
				}
				
				if(error.length > 0){
					$('.modal-body').html('<h1 class="error">'+error+'</h1>');
					$('#modalNewsletter').modal('handleUpdate');
					setTimeout(function() { $('#modalNewsletter').modal('hide'); }, 5000);
				}
			},
			error: function(){
				$('.modal-body').html('<h1 class="error">Lo sentimos no pudimos procesar tu solicitud. Vuelve a intarlo más tarde.</h1>');
				$('#modalNewsletter').modal('handleUpdate');
				setTimeout(function() { $('#modalNewsletter').modal('hide'); }, 5000);
			}
		});
    });
});
</script>
           

<?php if($model->template_file!=""){?>
<!-- INICIO DE PLANTILLA PARA ORO Y PLATA-->
<!-- Código DiV de la plantilla-->

<div id="wrapper">
<div class="recipeBackground1">

</div>

<!-- Content ================================================== -->
<div class="container">
	<!-- Recipe -->
	<div class="twelve columns">
	<div class="alignment">
		<!-- Header -->
		<section class="recipe-header">
         
			<div class="title-alignment">
				<h1><?php echo $model->title; ?> - <?php echo $model->listing_address2; ?></h1>
			<!--	<div class="rating four-stars">
					<div class="star-rating"></div>
					<div class="star-bg"></div>
				</div>-->
				<!--<span><a href="#reviews">(2 reviews)</a></span>-->
			</div>
		</section>
        
        
            <!-- Slider -->
            
      <?php 
	  	$dataArray = $classifiedsDataProvider->getData();
	 	if(count($dataArray)>0){?>
		<div class="recipeSlider rsDefault">
       <?php
		
			foreach ($dataArray as $data){
		?>
           <?php $modelImage = ClassifiedsImages::model()->findByAttributes(array('classified_id'=>$data->id));
						if($modelImage===null){
							
						}else{
							for($i=0; $i<count($modelImage); $i++){?>
					
						<img itemprop="image" class="rsImg" src="/<?php echo "files/classifieds/".CHtml::encode($data->id).'-'.$modelImage->id.".".$modelImage->extension;?>" alt="<?php echo $data->title;?> | Imagen <?php echo $modelImage->id; ?>" />
					<?php } 
							}?>
             
        <?php }?>
		</div>
        <?php }?>
        
        
		<!-- Details -->
		<section class="recipe-details" >
        
        <div class="inform-proveedor">
			<ul>
				<li>
                	<strong itemprop="recipeYield" class="direccion-proveedor"><?php echo $model->listing_address1; ?></strong>
                </li>
               <?php /*?> <li>
               	 	<strong itemprop="prepTime"><?php echo $model->mail;?></strong>		
                </li><?php */?>
           <div class="popover-listings">    
                 <li> 
                <?php if($model->www!=""){?>     
                      <div class="container-mas-informacion1"> 
               <button id="btn_web_popover" type="button" class="btn btn-primary popover-show" 
                  title="" data-container="body" 
                  data-toggle="popover" 
                  data-content="<a href='<?php echo $model->www; ?>' target='_blank'><?php echo $model->www; ?></a>"
  				  data-html="true">
                    Website
               </button>
               </div>
               <?php }?>
                    
                     <?php /*?><strong itemprop="calories"><?php echo $model->www;?></strong><?php */?>
                     
                </li>
                    
                    <!--<li><strong itemprop="prepTime">15 min</strong></li>
                    <li>Calories: <strong itemprop="calories">112 kcal</strong></li>-->
               <li>     
                <?php if($model->phone!=""){?>
               <div class="container-mas-informacion" id="btn_phone_popover"> 
               <button id="btn_phone_popover" type="button" class="btn btn-primary popover-show" 
                  title="" data-container="body" 
                  data-toggle="popover" 
                  data-content="<?php echo $model->phone; ?>">
                    Tel&eacute;fono
               </button>
               </div>
               <?php }?>
               </li>
               <li>
               	<div class="container-mas-informacion">
                	<a href="#productos" class="btn btn-primary popover-show" style="color:white" id="btn_products">Productos</a>
                </div>
               </li>
           </div>
           
			</ul>
         </div>   
	
		</section>

		<!-- Text -->
         <p class="categorias-proveedor"><strong color:#00FF00>Categoría: </strong>
         	<a href="/guia/category/<?php echo CHtml::encode($categories->friendly_url); ?>/">
			<?php echo CHtml::encode($categories->title);?> </a>
				<?php if($categoriePadre!=""){ ?>
					 >> <a href="/guia/category/<?php echo CHtml::encode($categoriePadre->friendly_url); ?>"><?php echo CHtml::encode($categoriePadre->title); ?></a>
			<?php	}
			?>
            
         </p>
         
		<div itemprop="description"><?php echo $model->description; ?></div>
        <!-- Responsive iFrame -->
        <?php if($model->latitude && $model->longitude && $model->latitude != 0 && $model->longitude != 0){ ?>
        <div class="Flexible-container">
        <!-- Mapa -->
        	<iframe width="425" height="200" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $model->latitude ?>%2C<?php echo $model->longitude ?>&key=AIzaSyCo0TST_wE8hukN7QZssmLLY-nqbki1xX8"></iframe>
            <!-- Fin Mapa -->
        </div>
        <?php
		}
		?>
		<div class="recipe-container">  
			<div class="ingredients-container">
				<!-- Ingredients -->
			<?php if($model->custom_4!=""){?>	
                <h3>Clientes Importantes</h3>
					<?php echo $model->custom_4; ?>
               <br />
            <?php }?>

			<?php if($model->custom_5!=""){?>               
             <h3>Ciudades de Cubrimiento</h3>
             	<p>
				<?php echo $model->custom_5; ?>
               </p>
            <?php }?>
           
				
			</div> 

			<div class="directions-container">
            
				 <?php if($model->custom_2!=""){?>       
			 		 <h3>Marcas que Representa</h3>
				<?php echo $model->custom_2; ?>
               		<br />
            	<?php }?>
                
                <?php if($model->custom_3!=""){?>       
			 		 <h3>Línea de Productos y Servicios</h3>
				<?php echo $model->custom_3; ?>
               		<br />
            	<?php }?>
                 
			</div>

		</div>
		<div class="clearfix"></div>
        <?php 
			$imgPinter='';
			if($model->logo_extension!=""){
			 $imgPinter = "http://".$_SERVER['SERVER_NAME']."/files/logo/".CHtml::encode($model->id).'.'.CHtml::encode($model->logo_extension); 
			}
		?>
        
		<!-- Share Post -->
	<ul class="share-post">
                  <!-- Facebook -->
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://<?php  echo $_SERVER['SERVER_NAME']; ?>/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html&t=<?php echo $nameSite ?>"
   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" class="facebook-share">Facebook</a></li>
   
   				<!-- Twitter -->
                    <li><a href="https://twitter.com/share?url=http://<?php  echo $_SERVER['SERVER_NAME']; ?>/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html&text=<?php echo $nameSite; ?>"
   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"target="_blank" class="twitter-share">Twitter</a></li>
   
   				<!-- Google Plus -->
                    <li><a href="https://plus.google.com/share?url=http://<?php  echo $_SERVER['SERVER_NAME']; ?>/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html"
   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;" target="_blank" class="google-plus-share">Google Plus</a></li>
   
   				<!-- Pinterest -->
   					<li><a href="https://pinterest.com/pin/create/button/?url=http://<?php  echo $_SERVER['SERVER_NAME']; ?>/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html&media=<?php echo $imgPinter ?>&description=<?php echo $nameSite ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;" target="_blank" class="pinterest-share">Pinterest</a></li>
                </ul>
		<div class="clearfix"></div>
		<!-- Meta 
  		<div class="post-meta">
			By <a href="#" itemprop="author">Sandra Fortin</a>, on
			<meta itemprop="datePublished" content="2014-30-10">30th November, 2014</meta>
		</div>  
-->
		<div class="margin-bottom-40"></div>
	<?php $dataArrayClassifieds = $classifiedsDataProvider->getData(); 
		  if(count($dataArrayClassifieds>0)){;
	
	?>        
		<!-- Headline -->
        <div id="productos">
 		<h3 class="headline">Nuestros Productos</h3>
		<span class="line margin-bottom-35"></span>
		<div class="clearfix"></div>

		
        <div class="related-posts">
		<div class="isotope">

		<?php 
		//if pagining
            $params=$_GET[$classifiedsDataProvider->pagination->pageVar]-1;
            if(isset($params)&&$params>=0){
                $classifiedsDataProvider->pagination->setCurrentPage($params);
            }
			
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$classifiedsDataProvider,
			'itemView'=>'/classifieds/_view',
			'enablePagination' => true,
			'enableSorting' => false,
			'template' => '{items}{pager}',
			)); ?>
		</div>
        </div>
        <?php }?>
        </div>
		<div class="clearfix"></div>


		<div class="margin-top-15"></div>

	
	</div>
	</div>

<!-- Sidebar ================================================== -->
<div class="four columns">
	<!-- Search Form -->
	<div class="widget search-form">
		<div class="toggler">
		<nav class="search" id="searchCustom">
        <?php
		echo CHtml::beginForm(CHtml::normalizeUrl(array('/listings/index')), 'get', array('id'=>'filter-form'))
		. CHtml::submitButton('', array('name'=>'', 'class'=>'fa fa-search'))
		. CHtml::textField('keyword', (isset($_GET['keyword'])) ? $_GET['keyword'] : '', array('id'=>'keyword', 'placeholder'=>'¿Qué Buscas?', 'required'=>'required', 'minlength'=>'3'))
		. CHtml::endForm();
		
		Yii::app()->clientScript->registerScript('search',
			"var ajaxUpdateTimeout;
			var ajaxRequest;
			$('input#string').keyup(function(){
				ajaxRequest = $(this).serialize();
				clearTimeout(ajaxUpdateTimeout);
				ajaxUpdateTimeout = setTimeout(function () {
					$.fn.yiiListView.update(
		// this is the id of the CListView
						'ajaxListView',
						{data: ajaxRequest}
					)
				},
		// this is the delay
				300);
			});"
		);
		
		?>
		</nav>
        </div>
        
		<div class="clearfix"></div>
	</div>
    
	<!-- Banner 250x250 -->
    <div class="widget">
        <p>
            <img src="/themes/guia/images/250x250.jpg" />
        </p>
	</div>
	<!-- Author Box -->
	<div class="widget">
    
		<div class="author-box">
            <?php if($model->logo_extension!=""){?>
              
				<div class="logo-form-contact">
                <?php 
					$idImg = uniqid($model->id);
				?>
                <img rel="image_src" class="logo-form" id="img<?php echo $idImg; ?>" src="/themes/guia/images/loading_EO_mini.gif" alt="<?php echo strtr($data->title,Yii::app()->params->unwanted_array ); ?>" />
                <script> 
					//optimize logo image
					imageAPi('<?php echo $idImg; ?>','<?php echo CHtml::encode($model->id).'.'.CHtml::encode($model->logo_extension); ?>','listing');
				</script>
                </div>
             	
          <?php } ?>
			
            <h3 class="headline">Cotice con Nosotros</h3>
            <div class="clearfix"></div>

     	 <?php $form=$this->beginWidget("CActiveForm"); ?> 
         	<form id="add-review" class="add-comment">
             <div class="errors-form">
				<?php if($form->error($listingForm,'name')){echo "Ingresar Nombre valido <br />"; }?>
                <?php if($form->error($listingForm,'email')){ echo "Ingresar Email valido <br />"; }?>
                <?php if($form->error($listingForm,'city')){echo "Ingresar Ciudad valido <br />"; } ?>
               	<?php if($form->error($listingForm,'body')){echo "Ingresar Comentario valido <br />"; } ?>
                
           
             </div>
			<fieldset>
            <div>
					<?php echo $form->labelEx($listingForm,'Nombre:'); ?><span>*</span>
					<?php echo $form->textField($listingForm, "name", array('required'=>'required'));?>
			</div>
            	
			<div>
					<?php echo $form->labelEx($listingForm,'Email:'); ?><span>*</span>
					<?php echo $form->textField($listingForm, "email", array('required'=>'required'));?>
		    </div>
             <div>
					<?php echo $form->labelEx($listingForm,'Tel&eacute;fono:'); ?><span>*</span>
					<?php echo $form->textField($listingForm, "phone", array('required'=>'required'));?>
			</div>
            <div>
					<?php echo $form->labelEx($listingForm,'Ciudad:'); ?><span>*</span>
					<?php echo $form->textField($listingForm, "city", array('required'=>'required'));?>
			</div>
            <div>
					<?php echo $form->labelEx($listingForm,'Comentario'); ?><span>*</span>
                    <?php echo $form->hiddenField($listingForm,'CategoriId',array('type'=>"hidden", 'value'=>$model->primary_category_id)); ?>
					<?php echo $form->textArea($listingForm,'body',array('rows'=>6,'required'=>'required')); ?>
			</div>
                       <span class="line margin-bottom-0"></span>
           <div class="captcha1">

           	 <label>Captcha:</label><span>*</span>
            		<?php
					
					 echo recaptcha_get_html($publickey);?>
					 
					 <?php echo '<div class="error-captcha">'.$resp5.'</div>';  ?>					 

            </div>               
             
             	<div id="condiciones">
               		<span id="aceptar">*</span><input type="radio" value="1" required="required" class="termino" checked="checked"></input>Acepto &nbsp;<a href="/terminos-y-condiciones.htm">T&eacute;rminos Condiciones</a> y <a href="/politica-de-dtos.htm">Tratamientos de Datos</a>
                </div>
                        
			</fieldset>
            <span class="line margin-bottom-0"></span>     
           
           
            <?php echo CHtml::submitButton('Enviar', array("class"=>"button medium color")); ?>
			<div class="clearfix"></div>

		</form>       
       		
            
         <?php $this->endWidget();?>
          <!-- Add Comment Form -->
	
				
           </div>	 
	</div>
    <!-- Baner estatico 250x600-->
	<div class="widget">
    	<p>
    		<img src="/themes/guia/images/250x600.jpg" />
        </p>
    </div>

	
</div>
</div>
<!-- Container / End -->
</div>
<!-- FIN DE PLANTILLA PARA ORO Y PLATA-->
<?php }?>

<?php if($model->template_file==""){?>

<!-- ================================================================ -->
<!-- INICIO DE PLANTILLA BRONCE -->
<!-- Código DiV de la plantilla-->
<div id="wrapper">

<!-- Recipe Background -->
<div class="recipeBackground1">
		
</div>
<!-- Content ================================================== -->
<div class="container">
	<!-- Recipe -->
	<div class="twelve columns">
	<div class="alignment">

		<!-- Header -->
		<section class="recipe-header">
         
			<div class="title-alignment">
				<h1><?php echo $model->title; ?> - <?php echo $model->listing_address2; ?></h1>
			<!--	<div class="rating four-stars">
					<div class="star-rating"></div>
					<div class="star-bg"></div>
				</div>-->
				<!--<span><a href="#reviews">(2 reviews)</a></span>-->
			</div>
		</section>
	
		<!-- Details -->
		<section class="recipe-details" itemprop="nutrition">
        
          <div class="inform-proveedor">
			<ul>
				<ul>
				  <li>
				    <strong itemprop="recipeYield" class="direccion-proveedor"><?php echo $model->listing_address1; ?></strong>
			      </li>
			  </ul>
			</ul>
            </div>
           <?php if($model->phone!=""){?>   
               <div class="container-mas-informacion"> 
               <button type="button" class="btn btn-primary popover-show" 
                  title="" data-container="body" 
                  data-toggle="popover" 
                  data-content="<?php echo $model->phone; ?>"
                  id="btn_phone_popover">
                    Tel&eacute;fono
               </button>
           </div>
           <?php }?>
        
        
			<div class="clearfix"></div>
		</section>

		<p class="categorias-proveedor"><strong color:#00FF00>Categoría: </strong>
         	<a href="/guia/category/<?php echo CHtml::encode($categories->friendly_url); ?>/">
			<?php echo CHtml::encode($categories->title);?> </a>
				<?php if($categoriePadre!=""){ ?>
					 >> <a href="/guia/category/<?php echo CHtml::encode($categoriePadre->friendly_url); ?>"><?php echo CHtml::encode($categoriePadre->title); ?></a>
			<?php	}
			?>
            
         </p>
		<!-- Text -->
		<p itemprop="description" class="description"><?php echo $model->description_short; ?></p>

		
		<div class="clearfix"></div>


		<?php 
			$imgPinter='';
			if($model->logo_extension!=""){
			 $imgPinter = "http://".$_SERVER['SERVER_NAME']."/files/logo/".CHtml::encode($model->id).'.'.CHtml::encode($model->logo_extension); 
			}
		?>
		<!-- Share Post -->
		<ul class="share-post">
                  <!-- Facebook -->
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://<?php  echo $_SERVER['SERVER_NAME']; ?>/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html&t=<?php echo $nameSite ?>"
   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" class="facebook-share">Facebook</a></li>
   
   				<!-- Twitter -->
                    <li><a href="https://twitter.com/share?url=http://<?php  echo $_SERVER['SERVER_NAME']; ?>/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html&text=<?php echo $nameSite; ?>"
   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"target="_blank" class="twitter-share">Twitter</a></li>
   
   				<!-- Google Plus -->
                    <li><a href="https://plus.google.com/share?url=http://<?php  echo $_SERVER['SERVER_NAME']; ?>/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html"
   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;" target="_blank" class="google-plus-share">Google Plus</a></li>
   
   				<!-- Pinterest -->
   					<li><a href="https://pinterest.com/pin/create/button/?url=http://<?php  echo $_SERVER['SERVER_NAME']; ?>/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html&media=<?php echo $imgPinter ?>&description=<?php echo $nameSite ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;" target="_blank" class="pinterest-share">Pinterest</a></li>
                </ul>
		<div class="clearfix"></div>
		<br />
        <div class="banner2">
            <p>
            	<img src="/themes/guia/images/700x100.jpg" />
            </p>
		</div>
		
		<!-- Meta 
  		<div class="post-meta">
			By <a href="#" itemprop="author">Sandra Fortin</a>, on
			<meta itemprop="datePublished" content="2014-30-10">30th November, 2014</meta>
		</div>  
-->

		<div class="margin-bottom-40"></div>
		<!-- Add Comment ================================================== -->

	</div>
	</div>


<!-- Sidebar ================================================== -->
<div class="four columns">
	<!-- Search Form -->
	<div class="widget search-form">
		<div class="toggler">
		<nav class="search" id="searchCustom">
        <?php
		echo CHtml::beginForm(CHtml::normalizeUrl(array('/listings/index')), 'get', array('id'=>'filter-form'))
		. CHtml::submitButton('', array('name'=>'', 'class'=>'fa fa-search'))
		. CHtml::textField('keyword', (isset($_GET['keyword'])) ? $_GET['keyword'] : '', array('id'=>'keyword', 'placeholder'=>'¿Qué Buscas?', 'required'=>'required', 'minlength'=>'3'))
		. CHtml::endForm();
		
		Yii::app()->clientScript->registerScript('search',
			"var ajaxUpdateTimeout;
			var ajaxRequest;
			$('input#string').keyup(function(){
				ajaxRequest = $(this).serialize();
				clearTimeout(ajaxUpdateTimeout);
				ajaxUpdateTimeout = setTimeout(function () {
					$.fn.yiiListView.update(
		// this is the id of the CListView
						'ajaxListView',
						{data: ajaxRequest}
					)
				},
		// this is the delay
				300);
			});"
		);
		
		?>
		</nav>
        </div>
        
		<div class="clearfix"></div>
	</div>
	<!-- Banner 250x250 -->
    <div class="widget">
        <p>
            <img src="/themes/guia/images/250x250.jpg" />
        </p>
	</div>
	<!-- Author Box -->
	<div class="widget">
			<div class="author-box">
              <?php if($model->logo_extension!=""){?>
                <!--<span class="contact"><a href="mailto:sandra@chow.com">sandra@chow.com</a></span>-->
                <h3 class="headline">Cotice con<br />Nosotros</h3><div class="clearfix"></div>
<div class="logo-form-contact">
                <img src="/files/logo/<?php echo CHtml::encode($model->id).'.'.CHtml::encode($model->logo_extension); ?>" alt="<?php echo $model->title; ?>" rel="image_src" class="logo-form">
                </div>
             
          <?php }else{?>
           		<h3 class="headline">Cotice con<br />Nosotros</h3><div class="clearfix"></div>
          <?php }?>


     	 <?php $form=$this->beginWidget("CActiveForm"); ?> 
         	<form id="add-review" class="add-comment">
             <div class="errors-form">
				<?php if($form->error($listingForm,'name')){echo "Ingresar Nombre valido <br />"; }?>
                <?php if($form->error($listingForm,'email')){ echo "Ingresar Email valido <br />"; }?>
                <?php if($form->error($listingForm,'city')){echo "Ingresar Ciudad valido <br />"; } ?>
               	<?php if($form->error($listingForm,'body')){echo "Ingresar Comentario valido <br />"; } ?>
                
           
             </div>
			<fieldset>
            <div>
					<?php echo $form->labelEx($listingForm,'Nombre:'); ?><span>*</span>
					<?php echo $form->textField($listingForm, "name", array('required'=>'required'));?>
			</div>
            	
			<div>
					<?php echo $form->labelEx($listingForm,'Email:'); ?><span>*</span>
					<?php echo $form->textField($listingForm, "email", array('required'=>'required'));?>
		    </div>
             <div>
					<?php echo $form->labelEx($listingForm,'Tel&eacute;fono:'); ?><span>*</span>
					<?php echo $form->textField($listingForm, "phone", array('required'=>'required'));?>
			</div>
            <div>
					<?php echo $form->labelEx($listingForm,'Ciudad:'); ?><span>*</span>
					<?php echo $form->textField($listingForm, "city", array('required'=>'required'));?>
			</div>
            <div>
					<?php echo $form->labelEx($listingForm,'Comentario'); ?><span>*</span>
                    <?php echo $form->hiddenField($listingForm,'CategoriId',array('type'=>"hidden", 'value'=>$model->primary_category_id)); ?>
					<?php echo $form->textArea($listingForm,'body',array('rows'=>6, 'required'=>'required')); ?>
			</div>
                       <span class="line margin-bottom-0"></span>
           <div class="captcha1.1">

           	 <label>Captcha:</label><span>*</span>
            		<?php
					
					 echo recaptcha_get_html($publickey);?>
					 
					 <?php echo '<div class="error-captcha">'.$resp5.'</div>';  ?>
					 

            </div>
            
            <div id="condiciones">
               		 <input type="radio" value="1" required="required" class="termino" checked="checked"></input><span id="aceptar">*</span>Acepto &nbsp;<a href="/terminos-y-condiciones.htm">T&eacute;rminos Condiciones</a> y <a href="/politica-de-dtos.htm">Tratamientos de Datos</a>
                </div>
            
			</fieldset>
            <span class="line margin-bottom-0"></span>
            
           
            <?php echo CHtml::submitButton('Enviar', array("class"=>"button medium color")); ?>
			<div class="clearfix"></div>

		</form>
            
         <?php $this->endWidget();?>
          <!-- Add Comment Form -->
	
				
           </div>	 
	</div>	<!-- Banner 250x250 -->
	<div class="widget">
        <p>
        	<img src="/themes/guia/images/250x250.jpg" />
        </p>
	</div>
	<!-- Baner estatico 250x600-->
	<div class="widget">
    	<p>
    		<img src="/themes/guia/images/250x600.jpg" />
        </p>
    </div>
	</div>
</div>
<!-- Container / End -->
</div>
<!-- FIN DE PLANTILLA BRONCE-->

<?php }?>