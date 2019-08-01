// ------------------ MySEO ------------------ //
 
 	/*----------------------------------------------------*/
    /*  Toggle Search Advance
    /*----------------------------------------------------*/
$(document).ready(function(){
    $("#searchAdvance").click(function(){
        selectedEffect = 'fold';  
		$("#effectSearchAdvance").toggle(selectedEffect,500);
		$("#searchCustom").toggle(selectedEffect,500);
		/*******Add Icons********/
		var className = $('#searchAdvance i').attr('class');
		if(className=='fa fa-chevron-circle-right'){
			$('#searchAdvance i ified').removeAttr('class');
			$('#searchAdvance i').attr('class','fa fa-chevron-circle-down');
		}else
		{
			$('#searchAdvance i').removeAttr('class');
			$('#searchAdvance i').attr('class','fa fa-chevron-circle-right');
		}
    });
	/*******Add search location********/
	if(document.filter_form_location){
		$(document.filter_form_location.location).change(function(){
			$(document.filter_form_location).submit();
		});
	}
});
 	/*----------------------------------------------------*/
    /*  Toggles Search Classifieds and Listings
    /*----------------------------------------------------*/
	
  $(function() {
  	//run default
  	isActive();
    
    // run the currently selected effect
    
    function isActive(){
        if(localStorage.getItem('activeTab')==='classified')
        {
          cambiarEstadoClasified();
        }
    }
    
    //run efect clicked
    function runEffect(type) {
      // get effect type from
      var selectedEffect = 'fold';
      // run the effect
      if(type==1){
          $( "#classifieds" ).show( selectedEffect,300);
          $( "#listings" ).hide( selectedEffect,300);
      }else
      {
          $( "#classifieds" ).hide( selectedEffect,300);
          $( "#listings" ).show( selectedEffect,300);
      }
    };
 
    // set effect from select menu value
    
    /**************begind listings toogle*************/
    $( "#listing" ).click(cambiarEstadoListing);
	$( "#listingEmpy" ).click(cambiarEstadoListing);
	function cambiarEstadoListing() {
    	var type = 0;
		var className = $('#listing').attr('class');
		if(className=='active')
		{
			$('#listing').removeAttr('class');
			$('#classified').removeAttr('class');
			$('#classified').attr('class','active');			
			$('#classified').html('classactive');
			localStorage.setItem('activeTab','classified');
            type = 1;
			/*******Add Icons********/
			$('#listing').html('Productos<i class="fa fa-chevron-circle-right"></i>');	
			$('#classified').html('Proveedores<i class="fa fa-chevron-circle-down"></i>');
		}
		else
		{
			$('#listing').removeAttr('class');
			$('#listing').attr('class','active');
			$('#classified').removeAttr('class');
            type = 1;
			/*******Add Icons********/
			$('#listing').html('Productos<i class="fa fa-chevron-circle-down"></i>');	
			$('#classified').html('Proveedores<i class="fa fa-chevron-circle-right"></i>');	
			localStorage.setItem('activeTab','listing');
		}
      	runEffect(type);
        
        $('.isotope').isotope({
              itemSelector: '.recipe-box',
              percentPosition: true,
              masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: '.four'
              }
        });
    }
    /**************end listings toogle*************/
    
    /**************begind classifieds toogle*************/
    $( "#classified" ).click(cambiarEstadoClasified);
	$( "#classifiedEmpy" ).click(cambiarEstadoClasified);
	function cambiarEstadoClasified() {
    	var type = 0;
		var className = $('#classified').attr('class');
		if(className=='active')
		{
			localStorage.setItem('activeTab','listing');
			$('#classified').removeAttr('class');
			$('#listing').removeAttr('class');
			$('#listing').attr('class','active');
            type = 2;
			/*******Add Icons********/
			$('#listing').html('Productos<i class="fa fa-chevron-circle-down"></i>');	
			$('#classified').html('Proveedores<i class="fa fa-chevron-circle-right"></i>');		
		}
		else
		{
			localStorage.setItem('activeTab','classified');	
			$('#classified').removeAttr('class');
			$('#classified').attr('class','active');
			$('#listing').removeAttr('class');
            type = 2;
			/*******Add Icons********/
			$('#listing').html('Productos<i class="fa fa-chevron-circle-right"></i>');	
			$('#classified').html('Proveedores<i class="fa fa-chevron-circle-down"></i>');	
		}
      	runEffect(type);
        
        $('.isotope').isotope({
              itemSelector: '.recipe-box',
              percentPosition: true,
              masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: '.four'
              }
        });
    }
    /**************end classifieds toogle*************/
  });
  //<!-- DatePicker --> 
  // Traducción al español
$(function($){
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
});
  $(document).ready(function(e) {
    	$('.reset').click(function(e) {
			$( "#from" ).removeAttr('value');
			$( "#to" ).removeAttr('value');
			$( "#reset" ).attr('value','1');
			timeout = setTimeout('window.location.href = "/guia/measure";', 1000);
        });
		$('#date_rang').submit(function(e) {
			$( "#reset" ).attr('value','');
        });
	});
  function initDatepicker(){
  	$('.form-control_year_month').datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: "yy-mm",
        beforeShow: function (e, t) {
            $(this).datepicker("hide");
            $("#ui-datepicker-div").addClass("hide-calendar");
			$("#ui-datepicker-div").addClass('MonthDatePicker');
            $("#ui-datepicker-div").addClass('YearDatePicker');
        },
		onClose: function(dateText, inst){
			//var n = Math.abs($("#ui-datepicker-div .ui-datepicker-month :selected").val() - 1) + 2;
            var n = Math.abs($("#ui-datepicker-div .ui-datepicker-month :selected").val())+1;
            var y = Math.abs($("#ui-datepicker-div .ui-datepicker-year :selected").val());
			 $(this).datepicker("setDate", new Date(y, n, null));
		}
    });
	if (document.documentElement.clientWidth > 764) {
    	//range date
        var f = new Date();
        var maxRangYear = f.getFullYear()+50;
        var minRangYear = f.getFullYear()-50;
    
		//destroy datepicker
		$( "#from" ).datepicker( "destroy" );
		$( "#to" ).datepicker( "destroy" );
		//destroy datepicker
		$( "#from" ).datepicker({
          yearRange: '"'+minRangYear+':'+maxRangYear+'"',
		  dateFormat: 'yy-mm-dd',
		  showButtonPanel: true,
		  changeMonth: true,
		  numberOfMonths: 1,
		  onClose: function( selectedDate ) {
			$( "#to" ).datepicker( "option", "minDate", selectedDate );
            var date = new Date(selectedDate);
            var Month = date.getMonth()+2;
            var day = 0;
            var currentYear = date.getFullYear();
            var maxDate=new Date(currentYear, Month, day);
            
            var Month2 = date.getMonth();
            var day2 = date.getDate()+2;
            var minDate=new Date(currentYear, Month2, day2);
            
            //$("#to" ).datepicker( "option", "maxDate",maxDate );            
            $("#to" ).datepicker( "option", "minDate",minDate );
		  }
		});
		$( "#to" ).datepicker({
          yearRange: '"'+minRangYear+':'+maxRangYear+'"',
		  dateFormat: 'yy-mm-dd',
		  showButtonPanel: true,
		  changeMonth: true,
		  numberOfMonths: 1,
		  onClose: function( selectedDate ) {
            
            var date = new Date(selectedDate);
            var Month = date.getMonth();
            var day = date.getDate();
            var currentYear = date.getFullYear();
            var minDate=new Date(currentYear, Month, day);
            
            $( "#from" ).datepicker( "option", "maxDate", minDate );
		  }
    	});
		timeout = setTimeout('initDatepicker()', 10000);
		console.info('initDatepicker');
	}else{
		//destroy datepicker
		$( "#from" ).datepicker( "destroy" );
		$( "#to" ).datepicker( "destroy" );
		//destroy datepicker
		//init datepicker mobile
		$( "#from" ).datepicker({
          yearRange: '"'+minRangYear+':'+maxRangYear+'"',
		  dateFormat: 'yy-mm-dd',
		  showButtonPanel: true,
		  changeMonth: true,
		  numberOfMonths: 1,
		  onClose: function( selectedDate ) {
			$( "#to" ).datepicker( "option", "minDate", selectedDate );
            var date = new Date(selectedDate);
            var Month = date.getMonth()+2;
            var day = 0;
            var currentYear = date.getFullYear();
            var maxDate=new Date(currentYear, Month, day);
            
            $("#to" ).datepicker( "option", "maxDate",maxDate );
		  }
		});
		$( "#to" ).datepicker({
          yearRange: '"'+minRangYear+':'+maxRangYear+'"',
		  dateFormat: 'yy-mm-dd',
		  showButtonPanel: true,
		  changeMonth: true,
		  numberOfMonths: 1,
		  onClose: function( selectedDate ) {
			$( "#from" ).datepicker( "option", "maxDate", selectedDate );
		  }
    	});
		timeout = setTimeout('initDatepicker()', 10000);
		console.info('endDatepicker');	
	}
  }
  //<!-- DatePicker --> 
  //<!-- Tabs --> 
  	$(document).ready(function(e) {
	  $( "#tabs" ).tabs({
		  event: "click"
		});
	});
  //<!-- Tabs --> 
  
  //<!---Validate selects required--->
  $(document).ready(function(e){
  	$('form#listings-form').submit(function(e){
    	
  		primary_category_id = $('select#primary_category_id').val();
        location_id = $('select#location_id').val();
        if(!primary_category_id || primary_category_id==0){
        	e.preventDefault();
        	console.warn("Categoría Vacia");
            $('#primary_category_id_chosen').addClass('error-select');
            $('html,body').animate({
            scrollTop: $("#primary_category_id_chosen").offset().top},
            'slow');
            timcat = setInterval(function(e){$('#primary_category_id_chosen').removeClass('error-select');clearInterval(timcat);},3000);
        }
        if(!location_id || location_id==0){
        	e.preventDefault();
        	console.warn("Ubicación Vacia");
            $('#location_id_chosen').addClass('error-select');
            $('html,body').animate({
            scrollTop: $("#location_id_chosen").offset().top},
            'slow');
            timloc = setInterval(function(e){$('#location_id_chosen').removeClass('error-select');clearInterval(timloc);},3000);
        }
  	});
  });
  
/*----------------------------------------------------*/
/*  Active MixitUp librarie Classifieds in Listings
/*----------------------------------------------------*/
	$(document).ready(function(e) {
		var container = $('#Container');
		if(container.length>0){
			container.mixItUp({
				animation: {
					effects: 'fade scale rotateY(-50deg)',
					animateResizeTargets: true,
					animateResizeContainer: false,
					animateChangeLayout: true,
				},controls: {
					live: true,
					activeClass: 'btn-active'
				},callbacks: {
					onMixStart: function(state, futureState){
						console.info('Animation starting');
					}
				},
				
			});
		}
	});
/*----------------------------------------------------*/
/*  End MixitUp librarie
/*----------------------------------------------------*/
  
/********************************************************************************************/
/************************************API REST Analityc***************************************/
/********************************************************************************************/
        
    //data default
	var device,country_name,country_code,browser,os,ip,url_origin;
 	//clicking
 	$(function () { $('#btn_phone_popover').on('shown.bs.popover', function () {
		varTemporal('1');
      	apiRESTAnalitycs();
   })});
   $(function () { $('#btn_web_popover').on('shown.bs.popover', function () {
	   	varTemporal('2');
      	apiRESTAnalitycs();
   })});
    $(function () { $('#btn_products').on('click', function () {
	   	varTemporal('7');
      	apiRESTAnalitycs();
   })});
	//add measure
 	function apiRESTAnalitycs(){
		urlApi ='/guia/api/create/model/measure/';
        var object_type = '';object_id = '';data_type='';
        if(localStorage.getItem('object_type')){
            object_type = localStorage.getItem('object_type');
        }else{
            object_type = localStorage.getItem('object_type_tmp');
        }
        if(localStorage.getItem('object_type')){
            object_id = localStorage.getItem('object_id');
        }else{
            object_id = localStorage.getItem('object_id_tmp');
        }
        if(localStorage.getItem('data_type')){
            data_type = localStorage.getItem('data_type');
        }else{
            data_type = localStorage.getItem('data_type_tmp');
        }
		data={ 
				device:localStorage.getItem('device'),
				country_name:localStorage.getItem('country_name'),
				country_code:localStorage.getItem('country_code'),
				browser:localStorage.getItem('browser'),
				os:localStorage.getItem('os'),
				client_ip:localStorage.getItem('ip'),
				url:localStorage.getItem('url'),
				url_origin:localStorage.getItem('url_origin'),
				object_id:object_id,
				object_type_id:object_type,
				data_type_id:data_type, 
                regionName:localStorage.getItem('regionName',myip_regionName()),
				cityName:localStorage.getItem('cityName',myip_cityName()),
			};
		dataType = 'json';
		
		$.ajax({
		  type: "POST",
		  url: urlApi,
		  data: data,
		  success: function(data){
				console.count(data['client_ip']);
			},
		error: function(){
				console.error('Error Api Request'); 
			},
		  dataType: dataType
		});
 	}
	//local page var in storage
	function definePageActive(){
		//var not to sessionStorage
		localStorage.removeItem('url');
		localStorage.removeItem('url_origin');
		//var to sessionStorage
		localStorage.setItem('url_origin',document.referrer);	
		localStorage.setItem('url',location.href);
		
	}
	//local var temporal in storage for click
	function varTemporal(type)
	{
		localStorage.setItem('data_type',type);
		localStorage.setItem('object_id',localStorage.getItem('object_id_tmp'));
		localStorage.setItem('object_type',localStorage.getItem('object_type_tmp'));
	}
	//local default var in storage
	function defineDefaultLocalStorage(){
    	
		localStorage.removeItem('device');
		localStorage.removeItem('country_name');
		localStorage.removeItem('country_code');
		localStorage.removeItem('browser');
		localStorage.removeItem('os');
		localStorage.removeItem('ip');
		localStorage.removeItem('object_id');
		localStorage.removeItem('object_type');
		localStorage.removeItem('data_type');
        localStorage.removeItem('regionName');
        localStorage.removeItem('cityName');
		//var to sessionStorage
		localStorage.setItem('device',myip_device());
		localStorage.setItem('country_name',myip_country_name());
		localStorage.setItem('country_code',myip_country_code());
		localStorage.setItem('browser',myip_browser());
		localStorage.setItem('os',myip_OS());
		localStorage.setItem('ip',myip_address());
        localStorage.setItem('regionName',myip_regionName());
		localStorage.setItem('cityName',myip_cityName());
	}
	//var in input's for form contac
	function appendToFormVars(){
    	var object_type = '';object_id = '';
        if(localStorage.getItem('object_type')){
            object_type = localStorage.getItem('object_type');
        }else{
            object_type = localStorage.getItem('object_type_tmp');
        }
        if(localStorage.getItem('object_type')){
            object_id = localStorage.getItem('object_id');
        }else{
            object_id = localStorage.getItem('object_id_tmp');
        }
    
		if(document.forms.namedItem("yw0")){
			$('form#yw0 #hiddenVar').remove();
			$('form#yw0').append('<div id="hiddenVar"><input type="hidden" name="url_origin" id="url_origin" value="'+localStorage.getItem('url_origin')+'">'+
			'<input type="hidden" name="object_type" id="object_type" value="'+object_type+'">'+
			'<input type="hidden" name="object_id" id="object_id" value="'+object_id+'"></div>');
		}
		if(document.forms.namedItem("yw3")){
			$('form#yw3 #hiddenVar').remove();
			$('form#yw3').append('<div id="hiddenVar"><input type="hidden" name="url_origin" id="url_origin" value="'+localStorage.getItem('url_origin')+'">'+
			'<input type="hidden" name="object_type" id="object_type" value="'+object_type+'">'+
			'<input type="hidden" name="object_id" id="object_id" value="'+object_id+'"></div>');
		}
        if(document.forms.namedItem("contactForm")){
			$('form#contactForm #hiddenVar').remove();
			$('form#contactForm').append('<div id="hiddenVar"><input type="hidden" name="url_origin" id="url_origin" value="'+localStorage.getItem('url_origin')+'"></div>');
		}
	}
    /*******data client*******/
	function myip_device(){
		var dispositivo = navigator.userAgent.toLowerCase();
      if( dispositivo.search(/iphone|ipod|ipad|android/) > -1 ){
      	return 'mobile';  
	  }else
	  {
		  return 'computer';  
	  }

	};
	function myip_country_name(){
    	//Jorge Carrillo: deprecated 2015-10-02
		/*$.getJSON('http://api.wipmania.com/jsonp?callback=?', function (data) {
            if(data.address.country!=null && data.address.country!=''){
				localStorage.setItem('country_name',data.address.country);
            }else{
            	localStorage.setItem('country_name','Unknown');
            }
		});*/
        
        if(data_country.getField('countryName') != "undefined"){
        	countryName = data_country.getField('countryName');
            localStorage.setItem('country_name',countryName);
        }else{
        	data_country.checkcookie(callback);
            countryName = data_country.getField('countryName');
            localStorage.setItem('country_name',countryName);
        }
		return localStorage.getItem('country_name');
	}
	function myip_country_code(){
    	//Jorge Carrillo: deprecated 2015-10-02
		/*$.getJSON('http://api.wipmania.com/jsonp?callback=?', function (data) {
        	if(data.address.country_code!=null && data.address.country_code!=''){
				localStorage.setItem('country_code',data.address.country_code);
            }else{
            	localStorage.setItem('country_code','XX');
            }
		});*/
        
        if(data_country.getField('countryCode') != "undefined"){
        	countryCode = data_country.getField('countryCode');
            localStorage.setItem('country_code',countryCode);
        }else{
        	data_country.checkcookie(callback);
            countryCode = data_country.getField('countryCode');
            localStorage.setItem('country_code',countryCode);
        }
		return localStorage.getItem('country_code');
	};
	function myip_browser(){
		var navegador = navigator.userAgent;
		  if (navigator.userAgent.indexOf('MSIE') !=-1) {
			return 'Internet Explorer';
		  } else if (navigator.userAgent.indexOf('Firefox') !=-1) {
			return 'Firefox';
		  } else if (navigator.userAgent.indexOf('Chrome') !=-1) {
			return 'Google Chrome';
		  } else if (navigator.userAgent.indexOf('Opera') !=-1) {
			return 'Opera';
		  } else {
			return 'No identificado';
		  }
	};
	function myip_OS(){
		var dispositivo = navigator.userAgent.toLowerCase();
		if( dispositivo.search(/iphone/) > -1 ){
      		return 'iphone';  
		  }
		else if( dispositivo.search(/ipod/) > -1 ){
      		return 'ipod';  
		}else if( dispositivo.search(/ipad/) > -1 ){
      		return 'ipad';  
		}else if( dispositivo.search(/android/) > -1 ){
      		return 'android';  
		}else {
			if (navigator.userAgent.indexOf('IRIX') != -1) {var SO = "Irix" }
			else if ((navigator.userAgent.indexOf('Win') != -1) && (navigator.userAgent.indexOf('98') != -1)) {var SO= "Windows 98"}
			else if ((navigator.userAgent.indexOf('Win') != -1) && (navigator.userAgent.indexOf('95') != -1)) {var SO= "Windows 95"}
			else if (navigator.appVersion.indexOf("16") !=-1) {var SO= "Windows 3.1"}
			else if (navigator.userAgent.indexOf("NT 5.1") !=-1) {var SO= "Windows XP"}
			else if (navigator.userAgent.indexOf("NT 5.2") !=-1) {var SO= "Windows Server 2003"}
			else if (navigator.userAgent.indexOf("NT 5.0") !=-1) {var SO= "Windows 2000"}
            else if (navigator.userAgent.indexOf("NT 6.1") !=-1) {var SO= "Windows 7"}
            else if (navigator.userAgent.indexOf("NT 6.2") !=-1) {var SO= "Windows 8"}
            else if (navigator.userAgent.indexOf("NT 6.3") !=-1) {var SO= "Windows 8.1"}            
			else if (navigator.userAgent.indexOf("NT 6.0") !=-1) {var SO= "Windows Vista"}
            else if (navigator.userAgent.indexOf("NT 10") !=-1) {var SO= "Windows 10"}
			else if (navigator.appVersion.indexOf("NT") !=-1) {var SO= "Windows NT"}
			else if (navigator.appVersion.indexOf("SunOS") !=-1) {var SO= "SunOS"}
			else if (navigator.appVersion.indexOf("Linux") !=-1) {var SO= "Linux"}
			else if (navigator.userAgent.indexOf('Mac') != -1) {var SO= "Macintosh"}
			else if (navigator.appName=="WebTV Internet Terminal") {var SO="WebTV"}
			else if (navigator.appVersion.indexOf("HP") !=-1) {var SO="HP-UX"}
			else {var SO= "No identificado"}
			return SO;
		}
	}
	function myip_address(){
		//ip = '<? //echo getIP(); ?>'; //Jorge Carrillo: deprecated 2016-01-21
        
        if(data_country.getField('ipAddress') != "undefined"){
        	ip = data_country.getField('ipAddress');
        }else{
        	data_country.checkcookie(callback);
            ip = data_country.getField('ipAddress');
        }
		return ip;
	};
    function myip_regionName(){
		//data = data_country; //Jorge Carrillo: deprecated 2015-10-02
        if(data_country.getField('regionName') != "undefined"){
        	region = data_country.getField('regionName'); //data[0]['regionName']; //Jorge Carrillo: deprecated 2015-10-02
        }else{
        	data_country.checkcookie(callback);
            region = data_country.getField('regionName');
        }
		return region;
	};
    function myip_cityName(){
		//data = data_country; //Jorge Carrillo: deprecated 2015-10-02
        if(data_country.getField('cityName') != "undefined"){
        	city = data_country.getField('cityName'); //data[0]['cityName']; //Jorge Carrillo: deprecated 2015-10-02
        }else{
        	data_country.checkcookie(callback);
            city = data_country.getField('cityName');
        }
		return city;
	};
    /****end data client***/
    var visited = false; var timeout;
    $(document).ready(function(e) {
        timeout = setInterval(function(){visitor();}, 1000);
    });
    function visitor(){
        if(data_country.getField('statusCode') == 'OK'){
            if(!visited && localStorage.getItem('object_id')!=null){
                defineDefaultLocalStorage();
                definePageActive();
                appendToFormVars();	
                apiRESTAnalitycs();
                defineDefaultLocalStorage();
                clearInterval(timeout);
                visited = true;	
            }/*else{
            	console.info(localStorage.getItem('object_id'));
            }*/
        }else{
            data_country.checkcookie(callback);
        }
        
    }  
	
	//optimization image
	function imageAPi(id,name,type){
		var image = localStorage.getItem(name);
		if(image==null){
		
			urlApi ='/guia/api/image/';
			data={ name:name, type:type};
			
			$.ajax({
			  type: "POST",
			  url: urlApi,
			  data: data,
			  dataType: 'json',
			  success: function(data){
				  if(data['url']!=''){
					  
					localStorage.setItem(name,data['url']);
					  
					$('#img'+id).attr('src',data['url']);
				  }else{
					$('#img'+id).attr('src','/guia/themes/guia/images/noimage.gif');
				  }
				},
			error: function(){
					$('#img'+id).attr('src','/guia/themes/guia/images/noimage.gif');
					console.error('Error Api Request Image'); 
				}
			});	
		}else{
			$('#img'+id).attr('src',image);
		}
	}
	
/********************************************************************************************/
/**********************************End API REST Analityc*************************************/
/********************************************************************************************/

// ------------------ End MySEO ------------------ //