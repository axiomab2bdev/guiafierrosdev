<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Guía de proveedores de ferreterias construcción eléctricos e industriales',
	'language'=>'es',
	'theme'=>'guia',

	// preloading 'log' component

	'preload'=>array('log'),
	// autoloading model and component classes

	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.controllers.*',
		'ext.yii-mail.YiiMailMessage',
		'application.extensions.EasyImage.EasyImage',

	),
	'modules'=>array(

		// uncomment the following to enable the Gii tool
		/*'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'pass',

			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('190.9.*','::1'),

		),*/
	),

	// application components

	'components'=>array(
		 'mail' => array(

            'class' => 'ext.yii-mail.YiiMail',

            'transportType' => 'pop',

            'transportOptions' => array(

                'host' => 'pop.gmail.com',

                'encryption' => 'ssl',

                'username' => 'xxxxx',

                'password' => 'xxxxx',

                'port' => 995,

            ),

            'viewPath' => 'application.views.mails',

        ),

		'user'=>array(

			// enable cookie-based authentication

			'allowAutoLogin'=>true,

		),



		// uncomment the following to enable URLs in path-format


		'urlManager'=>array(

			'urlFormat'=>'path',

			'showScriptName'=>false,

			'rules'=>array(

				/*

				'<controller:\w+>/<id:\d+>'=>'<controller>/view',

				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',

				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

				*/

				array(

					'class' => 'application.components.ListingURLRule',

					'connectionID' => 'db',

					),

			),

		),

		// database settings are configured in database.php

		'db'=>require(dirname(__FILE__).'/database.php'),

		'dbportal' => array(
			'connectionString' => 'mysql:host=localhost;dbname=fierros_portal',
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'class' => 'CDbConnection'
		),

		'errorHandler'=>array(

			// use 'site/error' action to display errors

			'errorAction'=>'site/error',

		),


		'log'=>array(

			'class'=>'CLogRouter',

			'routes'=>array(

				array(

					'class'=>'CFileLogRoute',

					'levels'=>'error, warning',

				),

				// uncomment the following to show log messages on web pages

				/*

				array(

					'class'=>'CWebLogRoute',

				),

				*/

			),

		),



	),

	// application-level parameters that can be accessed

	// using Yii::app()->params['paramName']

	'params'=>array(

		'keywords'=>'cinta adhesiva doble cara,  cinta de embalar,  cinta doble cara,  cinta antideslizante,  cerradurasde seguridad,  chapas de seguridad ,  cerraduras yale,  cerraduras de seguridad para puertas,  cerradura de seguridad,  cerraduras de seguridad precios,  cerraduras seguridad,  cerraduras electronicas para hoteles,  pisos de madera precios,  iluminacion led hogar,  perfiles estructurales galvanizados,  perfiles estructurales de hierro,  postes para cerca,  hierro corrugado para construccion,  vinilo 3m,  cinta adhesivo,  cinta de doble cara 3m,  cinta adhesiva reflectante,  acero inoxidable,  aceros inoxidables,  estructuras de acero,  ventanas en aluminio, diseÑo de ventanas de aluminio,  cerrajeros,  cerrajerias,  candados de seguridad,  cerraduras electronicas,  herrajes para cocina, cerraduras  magneticas,  ventanas metalicas,  ventanas de aluminio,  ventanas en aluminio,  ventanas en pvc,  puertas de vidrio,  aluminio para ventanas,  ventanas de seguridad,  ventanas precios,  precios casas prefabricadas,  muebles para lavamanos,  cocinas integrales,  decoracion de interiores,  disenos de banos,  pisos de madera precios,  lamparas de pared,  lamparas de pie,  lamparas para exteriores,  lamparas techo,  iluminacion hogar,  tiendas de iluminacion,  colgantes de iluminacion,  iluminacion cocinas modernas,  iluminacion fabrica,  iluminacion precios,  lamparas para living,  compresores de aire,  mini compresor,  ingersoll rand air compressor, fabrica de guantes industriales, fabricantes de guantes industriales,  guantes anti cortes industrial,  guantes desechables precio,  guantesde vinilo precio,  accesorios acero inoxidable, acero inoxidable, accesorios inoxidables,  ferreteria,  tejas plásticas,  cerca electrica,  malla hexagonal,  velcro,  cinta aislante,  ferreterias,  ferreteria industrial,  ferretería sbogota,  ferreterias,  productos de ferreteria,  herramientas de ferreteria,  ferreteria online,  nombres de ferreterias,  ferreterias en bogota,  ferreteria americana,  ferreteria virtual,  productos de ferreteria en general,  catalogo herramientas,  ferreterias mayoristas,  cables,  lamina de acero,  tubos de acero,  estructuras metalicas,  acerosaleados,  galvanizado,  hierro, hierrogalvanizado, perfiles metalicos,  aluminios,  cerraduras electricas, ventanas, remodelación,  griferia,  cocinas modernas,  tornillo inoxidable,  tornillos en bogota,  herramientas bosch,  clavos para cemento,  tuercas seguridad, madera,  iluminaciones,  proveedores de ferreterias, productos de ferreteria en general,  ferreteria industrial,  productos de ferreteria,  productos ferreteria, lamina de acero al carbon, tornilleria, compresores, guante nitrilo,  guantes de latex por mayor,  accesorios sanitarios,  grifería para baÑo,  tubos pvc,  valvulas',


		// Social Networks
		//Sample social configuration 
			//url_profile: https://www.facebook.com/my_profile
			//'facebook'=>'my_profile', only use name profile 
			//**** Bad implemetation 'facebook'=>'https://www.facebook.com/my_profile'
		'facebook'=>'revistafierros',
		'twitter'=>'revista_fierros',
		'googleplus'=>'',
		'youtube'=>'FierrosColombia',
		'linkedin'=>'company/fierros-la-comunidad-de-negocios-para-el-sector-ferretero-',
		

		// this is used in site ediciones for symbols
		'unwanted_array' => array(	'&Agrave;'=>'À','&Aacute;'=>'Á','&Acirc;'=>'Â','&Atilde;'=>'Ã','&Auml;'=>'Ä','&Egrave;'=>'È', 
									'&Eacute;'=>'É','&Ecirc;'=>'Ê','&Euml;'=>'Ë','&Igrave;'=>'Ì','&Iacute;'=>'Í','&Icirc;'=>'Î',
									'&Iuml;'=>'Ï', '&Ograve;'=>'Ò','&Oacute;'=>'Ó','&Ocirc;'=>'Ô','&Otilde;'=>'Õ','&Ouml;'=>'Ö',
									'&Ugrave;'=>'Ù','&Uacute;'=>'Ú', '&Ucirc;'=>'Û','&Uuml;'=>'Ü',
									'&agrave;'=>'à','&aacute;'=>'á','&acirc;'=>'â','&atilde;'=>'ã','&auml;'=>'ä','&egrave;'=>'è', 
									'&eacute;'=>'é','&Ecirc;'=>'ê','&euml;'=>'ë','&igrave;'=>'ì','&iacute;'=>'í','&icirc;'=>'î',
									'&iuml;'=>'ï', '&ograve;'=>'ò','&oacute;'=>'ó','&ocirc;'=>'ô','&otilde;'=>'õ','&ouml;'=>'ö',
									'&ugrave;'=>'ù','&uacute;'=>'ú', '&ucirc;'=>'û','&uuml;'=>'ü',
									'&yacute;'=>'ý','&Yacute;'=>'Ý','&ntilde;'=>'ñ', '&Ntilde;'=>'Ñ', 
									
									'Ã¡'=>'á','Ã©'=>'é','Ã­'=>'í','Ã³'=>'ó','Ãº'=>'ú','Ã¼'=>'ü', 'Ã±'=>'ñ', 
									'Ã“'=>'Á', 'Ã‰'=>'É', 'Ã'=>'Á', 'Ãš'=>'Ú', 'Ã‘'=>'Ñ', 'â€œ'=>'"',
									'Â'=>'', 'â€˜'=>'"', 'â€“'=>'-', 'â€'=>'"', 'â˜º'=>'☺', 'â˜»'=>'☻',
									'â™¥'=>'♥', 'â™¦'=>'♦', 'â™£'=>'♣', 'â™'=>'♠', 'â™‚'=>'♂', 'â™€'=>'♀'),

		// this is used in site ediciones

		'nameSiteEdiciones'=>'Revista Fierros para ferreterias construccion electricos e industriales',

		'phraseSiteEdiciones'=>'La Comunidad #1 para Ferreteros en Colombia',

		'keywordsSiteEdiciones'=>'cinta adhesiva doble cara, cinta de embalar, cinta doble cara,cinta antideslizante,cerraduras de seguridad,chapas de seguridad , cerraduras yale, cerraduras de seguridad para puertas, cerradura de seguridad,cerraduras de seguridad precios,cerraduras seguridad, cerraduras electronicas para hoteles,pisos de madera precios, iluminacion led hogar, perfiles estructurales galvanizados, perfiles estructurales de hierro, postes para cerca, hierro corrugado para construccion, vinilo 3m, cinta adesiva, cinta de doble cara 3m, cinta adhesiva reflectante, acero inoxidable, aceros inoxidables, estructuras de acero, ventanas en aluminio,diseno de ventanas de aluminio,cerrajeros, cerrajerias,candados de seguridad, cerraduras electronicas,herrajes para cocina,cerraduras magneticas, ventanas metalicas, ventanas de aluminio, ventanas en aluminio, ventanas en pvc, puertas de vidrio, aluminio para ventanas, ventanas de seguridad, ventanas precios, precios casas prefabricadas, muebles para lavamanos, cocinas integrales, decoracion de interiores, disenos de banos, pisos de madera precios, lamparas de pared, lamparas de pie, lamparas para exteriores, lamparas techo, iluminacion hogar, tiendas de iluminacion, colgantes de iluminacion, iluminacion cocinas modernas, iluminacion fabrica, iluminacion precios, lamparas para living, compresores de aire, mini compresor, ingersoll rand air compressor,fabrica de guantes industriales,fabricantes de guantes industriales, guantes anticortes industrial,guantes desechables precio, guantes de vinilo precio, accesorios acero inoxidable,acero inoxidable,accesorios inoxidables, ferreteria, tejas plasticas, cerca electrica, malla hexagonal, velcro, cinta aislante, ferreterias, ferreteria industrial, ferreterias bogota, ferreterias online, productos de ferreteria, herramientas de ferreteria, ferreteria online, nombres de ferreterias, ferreterias en bogota, ferreteria americana, ferreteria virtual, productos de ferreteria en general, catalogo herramientas, ferreterias mayoristas, cables, lamina de acero, tubos de acero, estructuras metalicas, aceros aleados, galvanizado, hierro,hierro galvanizado,perfiles metalicos, aluminios, cerraduras electricas,ventanas,remodelacion, griferia, cocinas modernas, tornillo inoxidable, tornillos en bogota, herramientas bosch, clavos para cemento, tuercas seguridad,madera, iluminaciones, proveedores de ferreterias,productos de ferreteria en general, ferreteria industrial, productos de ferreteria, productos ferreteria,lamina de acero al carbon,tornilleria,compresores,guante nitrilo, guantes de latex por mayor, accesorios sanitarios, griferia para bano, tubos pvc, valvulas',


		 ///Form Paute con Nosotros
		'listEmailPaute'=>'ebusiness@axioma.com.co,marketing4@axioma.com.co,controller@axioma.com.co,gerente@revistafierros.com,asisgerencia@axioma.com.co,desarrolladorback@revistalabarra.com,desarrolladorfront@revistalabarra.com',
		///Form Paute con Contactenos
		'listEmailContactenos'=>'ebusiness@axioma.com.co,analistadatos@axioma.com.co,gerente@revistafierros.com,asisgerencia@axioma.com.co,desarrolladorback@revistalabarra.com,desarrolladorfront@revistalabarra.com',
		///Form Paute con Suscripciones
		'listEmailSucripciones'=>'ebusiness@axioma.com.co,analistadatos@axioma.com.co,gerente@revistafierros.com,desarrolladorback@revistalabarra.com,desarrolladorfront@revistalabarra.com',
		///Form Paute con Newsletter
		'listEmailNewsletter'=>'ebusiness@axioma.com.co,hsalvador@axioma.com.co,gerente@revistafierros.com,desarrolladorback@revistalabarra.com,trafficker@revistalabarra.com,ihincapie@revistalabarra.com,desarrolladorfront@revistalabarra.com',
		
		///used in Guia
		'listEmail'=>'ebusiness@axioma.com.co, mpena@axioma.com.co, desarrolladorback@revistalabarra.com, desarrolladorfront@revistalabarra.com,  gerente@revistafierros.com',
		'listEmailCreateListing'=>'ebusiness@axioma.com.co,mpena@axioma.com.co,gerente@revistafierros.com,desarrolladorback@revistalabarra.com,desarrolladorfront@revistalabarra.com',
		'listEmailTop500'=>'gerente@revistafierros.com,ebusiness@axioma.com.co,desarrolladorback@revistalabarra.com,desarrolladorfront@revistalabarra.com',

	),

);

