<?php /* @var $this Controller */ 
	session_start();
	$sql = 'SELECT * FROM fierros_portal.wp_options
			WHERE option_name LIKE "tw_options";';
	$result = Yii::app()->dbportal->createCommand($sql)->queryAll();
	$tw_options = unserialize($result[0]['option_value']);
?>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="es"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="es"> <!--<![endif]-->
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PZDZKP');</script>
<!-- End Google Tag Manager -->
<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/images/favicon.ico" />
<!-- CSS
================================================== -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/colors/green.css" id="colors">
<?php if(!Yii::app()->user->isGuest){ ?>
	<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/jquery-ui-theme.css">
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
<link rel="stylesheet" type="text/css" href="https://datatables.net/release-datatables/extensions/TableTools/css/dataTables.tableTools.css">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/customDataTable.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/style_custom.css">
<!-- FANCYBOX -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/desarrollo-axioma/jquery.fancybox.css">
<!--RESPONSIVE TABS-->
 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/desarrollo-axioma/responsive-tabs.css">
 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/desarrollo-axioma/style-tabs.css">
 <!-- FUNCIONES AJAX GUIA PROVEEDORES -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/ajaxScripts.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

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
<!-- FANCYBOX -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/desarrollo-axioma/jquery.fancybox.js"></script>
<!--RESPONSIVE TABS-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/desarrollo-axioma/jquery.responsiveTabs.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/desarrollo-axioma/new-banner-style.css">

<!---Graphics----->
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<!---end Graphics----->
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
<script type="text/javascript" charset="utf8" src="https://datatables.net/release-datatables/extensions/TableTools/js/dataTables.tableTools.js"></script> 
<!-- Select Multiple JS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/lib/chosen/chosen.jquery.min.js"></script>
<!-- Select Multiple JS -->
<!--Only authenticate-->
<?php if(!Yii::app()->user->isGuest){ ?>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/css/bootstrap-table.css" rel="stylesheet">
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/bootstrap-table.js"></script>
<?php } ?>
<!--end Only authenticate-->
<!-- MySEO -->
<!-- MySEO Api-->

<script src="/themes/guia/scripts/api.ipinfodb.php"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/scriptMySEO.js?<?php echo rand(1,999); ?>"></script>
<!-- MySEO Api-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/scripts/desarrollo-axioma/banner-scripts.js"></script>


<script type="text/javascript">
	localStorage.setItem('sitekey', '6LehiAoTAAAAAN4sb18vN12ENTPN0naLXaoCVPcW');
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
	
/*<!-- Inicio Código Analytics-->*/
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-4342848-3', 'auto');
      ga('send', 'pageview');
	  /*<!-- Inicio Analytics Rebote-->*/
		setTimeout(ga('send','event','Ajuste de Tasa de Rebote','Mas de 12 segundos de permanencia'),12000);    
      /*<!-- Fin Analytics Rebote-->*/
/* <!-- Fin Código Analytics-->*/

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
<?php if(Yii::app()->user->isGuest){ ?>
<script src="http://coop182.github.io/jquery.dfp.js/jquery.dfp.js"></script>
<script src="https://use.fontawesome.com/cc7b68208b.js"></script>
<?php }?>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PZDZKP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Codigo DFP
================================================== -->

<!-- Banner estatico Flotante
================================================== -->
<?php if(Yii::app()->user->isGuest){  ?>

<!-- Banner estatico Flotante
================================================== Layer-->










<?php  if ($_SESSION['lb-publiciada'] != true) { ?>
<div class="float_banner" id="ban-leyer">
	<button id="iframe-close">X</button>
	<?php echo $tw_options['banner-layer']; ?>
  <?php $_SESSION['lb-publiciada'] = true; ?>	
</div>
<?php } ?>



       
<!-- Banner estatico
================================================== -->

<div id="sectionBannerHome" style="">
	<div id="bannerStatic">
    	<?php echo $tw_options['banner-1024x100'];	?>
    </div>
</div>
<!-- Fin Banner estatico
================================================== -->
<?php } ?>
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
			<a href="<?php echo Yii::app()->request->baseUrl; ?>/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/images/logo_FR_mini.png" alt="<?php echo CHtml::encode($this->pageTitle); ?>" /></a>
		</div>
	</div>
<!-- Navigation
================================================== -->
<div class="thirteen columns navigation">
	<nav id="navigation" class="menu nav-collapse">
    	<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/'), 'visible'=>Yii::app()->user->isGuest),
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
<div id="animated-pauta">

  <div class="banner-container">
    <a href="#animated-pauta">
      <div id="ad-button" class="closed"><i class="fa fa-caret-up" aria-hidden="true"></i>
        Abrir
      </div>
    </a>

    <div class="main-ad-container ad-active">
        <div id="ad-slot-1">
          <div class="banner-barra-fija">
				<?php echo $tw_options['barra-fija-banner']; ?>
          </div>
        </div>
    </div>
  
    <div id="ad-slot-2">
      <?php
      $opcion = isset($tw_options['barra-fija-contenido-tipo'])? $tw_options['barra-fija-contenido-tipo'] : NULL;

      switch ($opcion) {
      	case 'banner': 
            echo '<div class="banner-bf-content">';
              echo (isset($tw_options['barra-fija-contenido-banner'])?$tw_options['barra-fija-contenido-banner']:'');
            echo '</div>';
           break;
      	case 'video': ?>
            <iframe id="barra-fija-video" width="100%" height="315" src="<?php echo $tw_options['barra-fija-contenido-video']; ?>?enablejsapi=1&version=3" frameborder="0" allowfullscreen class="fitvidsignore"></iframe>
            <?php break;
      	default:
      		break;
      }
      ?>
		<p id="cerrar-btn" class="opened display-none">Cerrar</p>

		<p id="abrir-btn" class="closed display-none"><?php echo (isset($tw_options['barra-fija-texto-pesatana'])?$tw_options['barra-fija-texto-pesatana']:'Abrir'); ?></p>
    </div>
  </div>
</div>
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
            <a href="http://fierros.com.co/ediciones/" target="_blank"><img src="http://fierros.com.co/wp-content/uploads/2017/06/ediciones-fierros.png" style="max-width: 280px;" /></a>
            </div>
		</div>
		<div class="three columns">
			<!-- Headline -->
			<h3 class="headline footer">Fierros</h3>
			<span class="line"></span>
			<div class="clearfix"></div>
			<ul class="footer-links">
				<li><a href="http://fierros.com.co/" target="_blank">Fierros</a></li>
                <li><a href="http://fierros.com.co/" target="_blank">Noticias</a></li>
				<li><a href="http://fierros.com.co/ediciones/" target="_blank">Ediciones</a></li>
				<li><a href="/login" target="_blank">Subscripciones Fierros</a></li>
                <li><a href="http://fierros.com.co/paute-con-nosotros/" target="_blank">Paute con Nosotros</a></li>
				<li><a href="http://fierros.com.co/contactenos/" target="_blank">Contáctenos</a></li>
                <li><a href="http://fierros.com.co/pdf/terminos-y-condiciones.pdf" target="_blank">Términos y Condiciones</a></li>
                <li><a href="http://fierros.com.co/pdf/tratamiento-de-datos.pdf" target="_blank">Política de Datos</a></li>
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
						array('label'=>'Cotizar por Categoría', 'url'=>array('/site/vendor'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Agregue su Empresa', 'url'=>array('/listings/create'), 'visible'=>Yii::app()->user->isGuest),
						
					),
				)); ?>
			</ul>

		</div>

		<div class="five columns">
        <h3 class="headline footer">Suscripción NewsLetter FR</h3>
        		
			<span class="line"></span>
			<div class="clearfix"></div>
		<p>
			<!-- Headline -->
	
			<p>Reciba en su email todas nuestras noticias. Suscríbase al boletín electrónico Fierros.</p>
			<a href="http://fierros.com.co/actualizacion-datos/" class="newsletter-btn" target="_blank">Suscribir</a>
        </p>
            <br />
           <p>
            <a href="http://www.axioma.com.co/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/images/logo-axioma-mini.png" /></a>
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
<?php if(Yii::app()->user->isGuest){  ?>
<?php $banner = Banners::model()->findByAttributes(array('id'=>61)); 
		if($banner->code!='null'){echo $banner->code;}
}?>
<?php /* ?>
	<!-- Marketing Manager Tracking Code -->
	<script src="https://app.mirabelsmarketingmanager.com/fp/fps/JsResourse.ashx?encsid=0RIQlHyQzaE,&enccid=rlyLZOK_m-4," type="text/javascript"></script>
	<script type="text/javascript">
		
		var _paq = _paq || [];
		getEmailId(trackAnaluticsOfPiwik);
		
		function trackAnaluticsOfPiwik(fpr) {
			_paq.push(['setCustomVariable', 1, 'eid', fpr.em, 'visit']);_paq.push(['setCustomVariable', 2, 'didr', fpr.fp, 'visit']);
			_paq.push(['setCustomVariable', 3, 'twth', fpr.tw, 'visit']);_paq.push(['setCustomVariable', 4, 'ftype', fpr.frmtype, 'visit']);
			_paq.push(['trackPageView']);_paq.push(['enableLinkTracking']);
		}
		
		(function() {
			var u=(("https:" == document.location.protocol)  ? "https" : "http") + "://www.mirabelanalytics.com/mmwap/";
			_paq.push(['setTrackerUrl', u+'lnktrk.php']);
			_paq.push(['setSiteId', 192]);
			var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
			g.defer=true; g.async=true; g.src=u+'lnktrk.js'; s.parentNode.insertBefore(g,s);
		})();
		
	</script>
	<noscript><p><img src="http://www.mirabelanalytics.com/mmwap/lnktrk.php?idsite=192" style="border:0;" alt="" /></p></noscript>
	<!-- End Marketing Manager Tracking Code -->
<?php */ ?>
</body>

<script>

$(document).ready(function(e) {
	var left = ($(window).width()/2)-260;
		var top = (screen.height/2)-290;
		$('div.float_banner').append('<style>div.float_banner>div>div>iframe{position:absolute;width: 520px;height: 500px;margin-left:'+left+'px  !important;top:'+top+'px  !important;z-index: 999999999 !important;}</style>');
    });0

	$(window).on('load', function(event) {
		function removeFloat() {
            $('div.float_banner').remove();
        }
		event.preventDefault();

        if($('.float_banner iframe').contents().find('.img_ad').length > 0)
        {
            $('div.float_banner').show();
        
            remv=setInterval(removeFloat, 15200);

            setTimeout(function(){
                var total_top = $('.float_banner iframe').position().top -10;
                var total_left = $('.float_banner iframe').offset().left+$('.float_banner iframe').width()-70;
                $('#iframe-close').css({
                  top: total_top+'px',
                  left: total_left+'px',
                  display: 'block'
               });
            },500);
        }

		

		$(document).on('click', '#iframe-close', function(event) {
		    event.preventDefault();
		    $('.float_banner').remove();

		});
	});

</script>
</html>