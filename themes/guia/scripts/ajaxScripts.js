var dataDecode;

$(document).ready(function() {
  
   $(window).keydown(function(event){
    if((event.which== 13) && !$(event.target).is('textarea') && !$(event.target).is('input#keyword')) {
      event.preventDefault();
      return false;
    }
  });

  $('.gold4-provider').on('click', function(e) {
      if ( $(e.target).attr('for') != $(this).find('.css-label.provedor-name').attr('for') ) 
        $(this).find('.css-label.provedor-name').trigger('click');
    });

  var domainnURL = location.protocol + '//' + location.hostname;
  var externaValidatorURL = domainnURL + '/guia/controllers/externalFormValidator.php';
  $(document).on('click', '#form-submit', function() {
    var serializedData = serialize_onClick($(this));
    // console.log(serializedData);
    $.ajax({
      url: externaValidatorURL+"?function=validate1",
      type: 'POST',
      data: serializedData,
      success: function(data) {
        if (data != "") {
          if (data == "showLightBox") {
            $(".errors-form").html('');
            $("#fancy-trigger").trigger('click');
            $("#proveedores-oro textArea").attr('value', $("#ListingForm_body").val());

            $("#form-proveedores input[name='name']").attr({
              value: $("#ListingForm_name").val(),
              readonly: true
            });

            $("#form-proveedores input[name='email']").attr({
              value: $("#ListingForm_email").val(),
              readonly: true
            });

            $("#form-proveedores input[name='phone']").attr({
              value: $("#ListingForm_phone").val(),
              readonly: true
            });

            $("#form-proveedores input[name='city']").attr({
              value: $("#ListingForm_city").val(),
              readonly: true
            });

            $("#form-proveedores input[name='url_origin']").attr({
              value: $(".listing-contact input[name='url_origin']").val(),
              readonly: true
            });

            $("#form-proveedores input[name='object_type']").attr({
              value: $(".listing-contact input[name='object_type']").val(),
              readonly: true
            });

            $("#form-proveedores input[name='object_id']").attr({
              value: $(".listing-contact input[name='object_id']").val(),
              readonly: true
            });

            $("#form-proveedores input[name='CategoriId']").attr({
              value: $("#ListingForm_CategoriId").val(),
              readonly: true
            });

          } else {
            var dataDecode;
            $(".errors-form").html('');
            try {
              dataDecode = JSON && JSON.parse(data) || $.parseJSON(data);
              $.each(dataDecode, function(index, val) {
                if (val != "") $(".errors-form").append(val + "<br>");
              });
            } catch (e) {
              dataDecode = data;
              console.log(e);
              console.log(data);
            }
          }
        }
      },
      error: function(xhr,tStatus,e){
        if(!xhr){
            alert("Error"+tStatus+"   "+e.message);
        }else{
            alert("else: "+e.message); // the great unknown
        }
      },
    });
  });
  var msgSent = false;
  $(document).on('click', '#goldenListing-submit', function() {
    var serializedData = serialize_onClick($(this));
    
    if(!msgSent){
      msgSent = true;
      $.ajax({
      url: externaValidatorURL+"?function=sendMail",
      type: 'POST',
      data: serializedData,
      success:function (data) {

         // console.log(data);
         if(data==="Error_fields"){
          alert("Sus datos de usuario parecen no ser validos, favor diligencie de nuevo el formulario");
          msgSent = false;
         }
         if(data==="Error_body"){
          alert("Mensaje no valido");
          msgSent = false;
         }
         if(data=="Error_mail"){
          alert("Lo sentimos hubo un error en el envío");
          msgSent = false;
         }
         if(data==="SendBronzeMail"){
          $('#post-submit').trigger('click');
          msgSent = false;
         }
         if(data==="Success_mail"){
          if($(".gold4-provider").find("input:checked").length>0){
            $("#send_full_information").attr("checked",false);
          }else{
            $("#send_full_information").attr("checked",true);
          }
          $('#post-submit').trigger('click');
         }
         
      },
      error: function(xhr,tStatus,e){
        if(!xhr){
            alert("Error"+tStatus+"   "+e.message);
        }else{
            alert("else: "+e.message); // the great unknown
        }
      },
    })
    }
  });

  function serialize_onClick(button) {
    return button.closest('form').serialize();
  }
});

function testerFormSite () {
   $('#ListingForm_name').val('David Velandia');
  $('#ListingForm_email').val('prueba@gmail.com');
  $('#ListingForm_phone').val('1234567');
  $('#ListingForm_city').val('Bogota');
  $('#ListingForm_body').val('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
}