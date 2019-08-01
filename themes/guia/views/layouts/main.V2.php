<?php /* @var $this Controller */ 
function getIP() { 
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
       $ips = $_SERVER['HTTP_X_FORWARDED_FOR']; 
    }  
    elseif (isset($_SERVER['HTTP_VIA'])) { 
       $ips = $_SERVER['HTTP_VIA']; 
    }  
    elseif (isset($_SERVER['REMOTE_ADDR'])) { 
       $ips = $_SERVER['REMOTE_ADDR']; 
    } 
    else {  
       $ips = "unknown"; 
    } 
     
    return $ips; 

}
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="es"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="es"> <!--<![endif]-->
<head>
<!-- Basic Page Needs
================================================== -->
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta charset="utf-8">

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="robots" content="index, follow" />
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/images/favicon.ico" />
<!-- CSS
================================================== -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/colors/green.css" id="colors">
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/jquery-ui-theme.css">
<!-- DataTables CSS -->
 <link rel="stylesheet" type="text/css" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/libraries/DataTables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/libraries/Responsive/css/responsive.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/libraries/TableTools/css/dataTables.tableTools.css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/customDataTable.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/style_custom.css">

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<!-- Java Script
================================================== -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/jquery.superfish.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/jquery.royalslider.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/responsive-nav.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/hoverIntent.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/isotope.pkgd.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/chosen.jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/jquery.tooltips.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/jquery.magnific-popup.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/jquery.pricefilter.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/custom.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/bootstrap.min.js"></script>
<!-- WYSIWYG Editor -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/jquery.sceditor.bbcode.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/jquery.sceditor.js"></script>
<!-- WYSIWYG Editor -->
<!---Graphics----->
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<!---end Graphics----->
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/libraries/DataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/libraries/Responsive/js/dataTables.responsive.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/libraries/TableTools/js/dataTables.tableTools.js"></script> 
<!-- Select Multiple JS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/lib/chosen/chosen.jquery.min.js"></script>
<!-- Select Multiple JS -->
<!--Only authenticate-->
<? if(!Yii::app()->user->isGuest){ ?>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/bootstrap-table.css" rel="stylesheet">
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/bootstrap-table.js"></script>
<? } ?>

<?php if(Yii::app()->user->isGuest){ ?>
<script src="http://coop182.github.io/jquery.dfp.js/jquery.dfp.js"></script>

<?php }?>

<!--end Only authenticate-->
<!-- MySEO Api-->
<!--Jorge Carrillo: Update 21-10-2015 -> Deprecated that conflict in webforms-->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/api.ipinfodb.php"></script>-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/scriptMySEO.php"></script>
<!-- MySEO Api-->

<script type="text/javascript">
	localStorage.setItem('sitekey', '6LeMZwoTAAAAAPAajoQeU7u2q5uYIE3Mb2jxpfQk');
	var RecaptchaOptions = {
		theme : 'blackglass',
		lang : 'es',
	 };
  var onloadCallback = function() {
	grecaptcha.render('html_element', {
	  'sitekey' : localStorage.getItem('sitekey'),
	  'callback' : function(response) {
          console.log(response);
        }
	});
  };
	  
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-4342848-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

$(document).ready( function () {
	//<!-- DataTables --> 
	tbl_options =  {
		responsive: true,
		paging: true,
		searching: true,
    	ordering:  true,
		order: [[ 2, "desc" ]],
		language: {"url": "//cdn.datatables.net/plug-ins/f2c75b7247b/i18n/Spanish.json"},
	};
	tbl_optionsCountry =  {
		responsive: true,
		paging: true,
		searching: true,
    	ordering:  true,
		order: [[ 0, "desc" ]],
		language: {"url": "//cdn.datatables.net/plug-ins/f2c75b7247b/i18n/Spanish.json"}
	};
	tbl_optionsLead =  {
		responsive: true,
		paging: true,
		searching: false,
    	ordering:  true,
		order: [[ 4, "desc" ]],
		language: {"url": "//cdn.datatables.net/plug-ins/f2c75b7247b/i18n/Spanish.json"},
	};
	//init tables
	$('table.tbl_admin').dataTable(tbl_options);
	$('.tbl_country').DataTable(tbl_optionsCountry);
	$('table.tbl_admin_lead').dataTable(tbl_optionsLead);
	
	//<!-- DatePicker --> 
	initDatepicker();//scriptMySEO.js
} );
</script>

</head>

<body>
<? if(Yii::app()->user->isGuest){  ?>
<!-- Banner estatico Flotante
================================================== Layer-->
  <div class="float_banner">
<?php $banner = Banners::model()->findByAttributes(array('id'=>63)); 
			if($banner->code!='null'){echo $banner->code;}
		?>
        </div>
        
      <script>
			$(document).ready(function(e) {
                    var left = ($(window).width()/2)-260;
					var top = (screen.height/2)-290;
					$('div.float_banner').append('<style>div.float_banner>div>div>iframe{position:absolute;width: 520px;height: 500px;margin-left:'+left+'px  !important;top:'+top+'px  !important;z-index: 999999999 !important;}</style>');
					$('div.float_banner').closed
					remv=setInterval(removeFloat, 15200);
					function removeFloat() {
                        $('div.float_banner').remove();
						console.log('removed');
						clearInterval(remv);
                    }
				
                });
				
				$('#dclk_overlay_1892131985').on({
					  click: function() {
						event.preventDefault();
						console.log('item clicked');
					  },
					  mouseenter: function() {
						console.log('enter!');
					  }
				});
				
			</script>
            
            
          
<!-- Banner estatico
================================================== -->
<div id="sectionBannerHome" style="">
	<div id="bannerStatic">
    	<?php $banner = Banners::model()->findByAttributes(array('id'=>62)); 
			if($banner->code!='null'){echo $banner->code;}
		?>
    </div>
</div>
<!-- Fin Banner estatico
================================================== -->
 <? } ?>
<!-- Wrapper -->
<div id="wrapper">
<!-- Header
================================================== -->
<header id="header">
<!-- Container -->
<div class="container">

	<!-- Logo / Mobile Menu -->
	<div class="three columns">
		<div id="logo">
			<a href="<?php echo Yii::app()->request->baseUrl; ?>/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/images/logo.png" alt="<?php echo CHtml::encode($this->pageTitle); ?>" /></a>
		</div>
	</div>
<!-- Navigation
================================================== -->
<div class="thirteen columns navigation">
	<nav id="navigation" class="menu nav-collapse">
    	<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Categorías', 'url'=>array('/browse_categories.php'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Ubicaciones', 'url'=>array('/browse_locations.php'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Proveedores', 'url'=>array('/listings'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Productos', 'url'=>array('/classifieds'), 'visible'=>Yii::app()->user->isGuest),
			
				array('label'=>'Visitas', 'url'=>array('/measure'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Cotizaciones', 'url'=>array('/contact/'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Cerrar Sesión ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
		
		</ul>
	</nav>
</div>
</div>
<!-- Container / End -->
</header>
<!-- Slider
<!-- Content
================================================== -->
<div class="">
    <!-- Contenido Yii -->
    	<?php echo $content; ?>
    <!-- Fin de Contenido -->
</div>
<!-- Container / End -->
<div class="margin-top-5"></div>
</div>
<!-- Wrapper / End -->
<!-- Footer
================================================== -->
<div id="footer">
	<!-- Container -->
	<div class="container">
		<div class="five columns">
			<!-- Headline -->
			<h3 class="headline footer">Última Edición</h3>
			<span class="line"></span>
			<div class="clearfix"></div>
			<div id="image-footer">
            <a href="/ediciones-texto" target="_blank"><img src="/sites/default/files/styles/portada-edicion/public/field/tb_rss_feed/portada.JPG" style="max-width: 148px;" /></a>
            </div>
		</div>
		<div class="three columns">
			<!-- Headline -->
			<h3 class="headline footer">La Barra</h3>
			<span class="line"></span>
			<div class="clearfix"></div>
			<ul class="footer-links">
				<li><a href="/" target="_blank">Revista La Barra</a></li>
                <li><a href="/noticias" target="_blank">Noticias</a></li>
				<li><a href="/ediciones-texto" target="_blank">Ediciones</a></li>
				<li><a href="/store_products" target="_blank">Subscripciones La Barra</a></li>
                <li><a href="/content/paute-con-nosotros" target="_blank">Paute con Nosotros</a></li>
				<li><a href="/contact" target="_blank">Contáctenos</a></li>
                <li><a href="/términos-y-condiciones" target="_blank">Términos y Condiciones</a></li>
                <li><a href="/política-de-datos" target="_blank">Política de Datos</a></li>
			</ul>
		</div>
		<div class="three columns">

			<!-- Headline -->
			<h3 class="headline footer">Mapa del Sitio</h3>
			<span class="line"></span>
			<div class="clearfix"></div>

			<ul class="footer-links">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Inicio', 'url'=>array('/')),
						array('label'=>'Categorías', 'url'=>array('/browse_categories.php')),
						array('label'=>'Ubicaciones', 'url'=>array('/browse_locations.php')),
						array('label'=>'Proveedores', 'url'=>array('/listings')),
						array('label'=>'Productos', 'url'=>array('/classifieds')),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Cotizar por Categoría', 'url'=>array('/vendor.php'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Agregue su Empresa', 'url'=>array('/listings/create'), 'visible'=>Yii::app()->user->isGuest),
						
					),
				)); ?>
			</ul>

		</div>

		<div class="five columns">
        <h3 class="headline footer">Suscripción NewsLetter LB</h3>
        		
			<span class="line"></span>
			<div class="clearfix"></div>
		<p>
			<!-- Headline -->
	
			<p>Reciba en su email todas nuestras noticias. Suscríbase al boletín electrónico La Barra.</p>
			<a href="/content/suscripcion-al-boletin" class="newsletter-btn" target="_blank">Suscribir</a>
        </p>
            <br />
           <p>
            <a href="http://www.axioma.com.co/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/images/logo-axioma.png" /></a>
            </p>
		</div>

	</div>
	<!-- Container / End -->

</div>
<!-- Footer / End -->

<!-- Footer Bottom / Start -->
<div id="footer-bottom">

	<!-- Container -->
	<div class="container">

		<div class="eight columns">© Copyright <?php echo date('Y'); ?> | <a href="http://www.axioma.com.co/" target="_blank">Axioma Comunicaciones</a>. Derechos reservados.</div>

	</div>
	<!-- Container / End -->
</div>
<!-- Footer Bottom / End -->
<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>
<!-- Codigo 
================================================== -->


		<?php $banner = Banners::model()->findByAttributes(array('id'=>61)); 

		if($banner->code!='null'){echo $banner->code;}

		?>
</body>
<script>

/*<!--Jorge Carrillo: Update 21-10-2015 -> Deprecated that conflict in webforms-->
$(document).ready(function(e) {
	var visited = false;
	var timeout = setInterval(visitor(), 1000);
	function visitor(){
		if(data_country.getField('statusCode') == 'OK'){
			if(!visited){
				
				clearInterval(timeout);
				visited = true;	
			}
		}else{
			data_country.checkcookie(callback);
		}
		
	}    
});*/
</script>
		
</html>