<?php /***Formularios envio de Contacto ***/ 

function formNewsletterIAlimentosCliente($Email,$area,$industria){

	$formularioCliente="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

<html>

    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

        

        <!-- Facebook sharing information tags -->

        <meta property='og:title' content='*|MC:SUBJECT|*' />

        

        <title>*|MC:SUBJECT|*</title>

		<style type='text/css'>

			/* Client-specific Styles */

			#outlook a{padding:0;} /* Force Outlook to provide a 'view in browser' button. */

			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */

			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */



			/* Reset Styles */

			body{margin:0; padding:0;}

			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}

			table td{border-collapse:collapse;}

			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}



			/* Template Styles */



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Page

			* @section background color

			* @tip Set the background color for your email. You may want to choose one that matches your companys branding

			* @theme page

			*/

			body, #backgroundTable{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Page

			* @section email border

			* @tip Set the border for your email.

			*/

			#templateContainer{

				/*@editable*/ border: 1px solid #DDDDDD;

			}



			/**

			* @tab Page

			* @section heading 1

			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.

			* @style heading 1

			*/

			strong {

color: #5C5C5C;

}

			.h4-contactenos{

				font-family: Futura;

				color:#FE0002 !important;	

			}



			h1, .h1{

				/*@editable*/ color:#5C5C5C;

				display:block;

				/*@editable*/ 

			font-family: Futura;

				/*@editable*/ font-size:22px;

				/*@editable*/ 				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

				font-style:italic;

			}



			/**

			* @tab Page

			* @section heading 2

			* @tip Set the styling for all second-level headings in your emails.

			* @style heading 2

			*/

			h2, .h2{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:30px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 3

			* @tip Set the styling for all third-level headings in your emails.

			* @style heading 3

			*/

			h3, .h3{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:26px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 4

			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.

			* @style heading 4

			*/

			h4, .h4{


				

font-style:italic;				

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:22px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: PREHEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section preheader style

			* @tip Set the background color for your emails preheader area.

			* @theme page

			*/

			#templatePreheader{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Header

			* @section preheader text

			* @tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.

			*/

			.preheaderContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:100%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Header

			* @section preheader link

			* @tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.

			*/

			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section header style

			* @tip Set the background color and border for your emails header area.

			* @theme header

			*/

			#templateHeader{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-bottom:0;

			}



			/**

			* @tab Header

			* @section header text

			* @tip Set the styling for your emails header text. Choose a size and color that is easy to read.

			*/

			.headerContent{

				/*@editable*/ color:#202020;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:34px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				/*@editable*/ padding:0;

				/*@editable*/ text-align:center;

				/*@editable*/ vertical-align:middle;

			}

			#llamar{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			

			#email{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			/**

			* @tab Header

			* @section header link

			* @tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.

			*/

			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			#headerImage{

				height:auto;

				max-width:600px !important;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Body

			* @section body style

			* @tip Set the background color for your emails body area.

			*/

			#templateContainer, .bodyContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Body

			* @section body text

			* @tip Set the styling for your emails main content text. Choose a size and color that is easy to read.

			* @theme main

			*/

			.bodyContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Body

			* @section body link

			* @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.

			*/

			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.bodyContent img, .fullWidthBandContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: SIDEBAR /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Sidebar

			* @section sidebar style

			* @tip Set the background color and border for your emails sidebar area.

			*/

			#templateSidebar{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Sidebar

			* @section sidebar text

			* @tip Set the styling for your emails sidebar text. Choose a size and color that is easy to read.

			*/

			.sidebarContent div{

			/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Sidebar

			* @section sidebar link

			* @tip Set the styling for your emails sidebar links. Choose a color that helps them stand out from your text.

			*/

			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.sidebarContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COLUMNS; LEFT, RIGHT /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section left column link

			* @tip Set the styling for your emails left column links. Choose a color that helps them stand out from your text.

			*/

			.leftColumnContent div a:link, .leftColumnContent div a:visited, /* Yahoo! Mail Override */ .leftColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.leftColumnContent img{

				display:inline;

				height:auto;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section right column link

			* @tip Set the styling for your emails right column links. Choose a color that helps them stand out from your text.

			*/

			.rightColumnContent div a:link, .rightColumnContent div a:visited, /* Yahoo! Mail Override */ .rightColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.rightColumnContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Footer

			* @section footer style

			* @tip Set the background color and top border for your emails footer area.

			* @theme footer

			*/

			#templateFooter{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-top:0;

			}



			/**

			* @tab Footer

			* @section footer text

			* @tip Set the styling for your emails footer text. Choose a size and color that is easy to read.

			* @theme footer

			*/

			.footerContent div{

				/*@editable*/ color:#707070;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:125%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Footer

			* @section footer link

			* @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.

			*/

			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.footerContent img{

				display:inline;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			* @theme footer

			*/

			#social{

				/*@editable*/ background-color:#FAFAFA;

				/*@editable*/ border:0;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			*/

	.vinculo{

	color: #909090;

	font-weight:bold;

	

	}

	.vinculo-social a{

		color:#676767 !important;

font-weight:bold !important;

		font-size:16px;

		text-decoration:none !important;	

		

	}

	

.vinculo a{

	color: #D63432!important;	

			font-weight:bold;

			

			

}

#social div{

				/*@editable*/ text-align:center;

			}



			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			* @theme footer

			*/

			#utility{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border:0;

			}



			#utility div{

				 text-align:center;

			}



			#monkeyRewards img{

				max-width:190px;

			}

			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			*/

			

		</style>

	</head>

    <body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>

    	<center>

        

        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>

            	<tr>

                	<td align='center' valign='top'>

                        <!-- // Begin Template Preheader \\ -->

                        <table border='0' cellpadding='10' cellspacing='0' width='600' id='templatePreheader'>

                            <tr>

                                <td valign='top' class='preheaderContent'>

                                	

                                	<!-- // Begin Module: Standard Preheader \ -->

                                    <table border='0' cellpadding='10' cellspacing='0' width='100%'>

                                     </table>

                                	<!-- // End Module: Standard Preheader \ -->

                                

                                </td>

                            </tr>

                        </table>

                        <!-- // End Template Preheader \\ -->

                     <div>   

                    	<table border='0' cellpadding='0' cellspacing='0' width='636' id='templateContainer' style='border: 2px solid #999; padding:0px; margin:0px;'>

                        	<tr>

                            	<td width='600' align='center' valign='top'>

                                    <!-- // Begin Template Header \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateHeader'>

                                        <tr>

                                            <td class='headerContent'>

                                            

                                            	<!-- // Begin Module: Standard Header Image \\ -->

                                            	<img src='http://fierros.com.co/themes/ediciones/images/newsletter.jpg' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext width='100%'/>

                                            	<!-- // End Module: Standard Header Image \\ --></td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Header \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Body \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>

                                    	<tr>

                                       

                                        	<td valign='top' width='600'>

                                            	<table border='0' cellpadding='0' cellspacing='0' width='400'>

                                                    <tr>

                                                    	<td valign='top'>

                                                            <table border='0' cellpadding='0' cellspacing='0' width='600'>

                                                                <tr>

                                                                    <td valign='top' width='180' class='leftColumnContent'>

                                                                    

                                                                        <!-- // Begin Module: Top Image with Content \\ -->

                                                                        <table border='0'>

                                                                            <tr mc:repeatable>

                                                                                <td valign='middle'><div mc:edit='std_content00'>

				 	                    <br />                     <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

 line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'>Sr (a) $Email</h1>

                <h2 style='color:#333333;

				display:block;

				font-family:Futura;

                font-size:18px;

 				line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'></h2>

                        <p class='vinculo' style='color: #000;

	 font-size:16px;'>Este es un email de confirmación de inscripción al newsletter con<span class='vinculo' style='color: #000;

	 font-size:16px;'> <strong>&quot;Revista Fierros - La Comunidad #1 para Ferreteros en Colombia&quot;</strong></span>.</p>

      

            <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

                line-height:100%;

				margin-top:30px !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic; font-size:22px;'>Datos del mensaje enviado</h1>                      

                <div style='font-size:14px;'><strong>Email:</strong> &nbsp; $Email

       </div>

                

                 <div style='font-size:14px;'><strong>Area:</strong> &nbsp; $area

       </div>

 <div style='

	 font-size:14px;''>

<strong>Industria:</strong> &nbsp; $industria <br />

 </div>



    </p>

    <br />







    <hr />

    <p class='vinculo' style='

	font-weight:bold; font-size:12px;'><a href='www.fierros.com.co/'>¡ Visite Revista Fierros - La Comunidad #1 para Ferreteros en Colombia  !</a>

    <br />

    <br />

    	Cordialmente

	<br />

		Servicio al Cliente,       <br /><a href='www.fierros.com.co/guia/'>www.fierros.com.co</a></p>

  

     <p class='vinculo' style='color: #909090;

	font-size:12px;'>

       <strong> Copyright 2015 

Axioma Comunicaciones Ltda. 

Todos Los Derechos Reservados. </strong></p>

            </div>

            

            

            

                        </td>         </tr>

</table>

<!-- // End Module: Top Image with Content \\ -->

                                                                        

                                                                    </td>

                                                                    

                                                                </tr>

                                                            </table>

                                                        </td>

                                                    </tr>

                                                </table>                                                

                                            </td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Body \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Footer \\ --><!-- // End Template Footer \\ -->

                                </td>

                            </tr>

                        </table>

                        </div>

                        <br />

                    </td>

                </tr>

            </table>

        </center>

    </body>

</html>";

	return $formularioCliente;
}

///////**** ---************************************************************////

function formNewsletterIAlimentos($Email,$area,$industria){

$formularioProveedor="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

<html>

    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

        

        <!-- Facebook sharing information tags -->

        <meta property='og:title' content='*|MC:SUBJECT|*' />

        

        <title>*|MC:SUBJECT|*</title>

		<style type='text/css'>

			/* Client-specific Styles */

			#outlook a{padding:0;} /* Force Outlook to provide a 'view in browser' button. */

			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */

			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */



			/* Reset Styles */

			body{margin:0; padding:0;}

			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}

			table td{border-collapse:collapse;}

			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}



			/* Template Styles */



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Page

			* @section background color

			* @tip Set the background color for your email. You may want to choose one that matches your companys branding

			* @theme page

			*/

			body, #backgroundTable{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Page

			* @section email border

			* @tip Set the border for your email.

			*/

			#templateContainer{

				/*@editable*/ border: 1px solid #DDDDDD;

			}



			/**

			* @tab Page

			* @section heading 1

			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.

			* @style heading 1

			*/

			strong {

color: #5C5C5C;

}

			.h4-contactenos{

				font-family: Futura;

				color:#FE0002 !important;	

			}



			h1, .h1{

				/*@editable*/ color:#5C5C5C;

				display:block;

				/*@editable*/ 

			font-family: Futura;

				/*@editable*/ font-size:22px;

				/*@editable*/ 				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

				font-style:italic;

			}



			/**

			* @tab Page

			* @section heading 2

			* @tip Set the styling for all second-level headings in your emails.

			* @style heading 2

			*/

			h2, .h2{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:30px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 3

			* @tip Set the styling for all third-level headings in your emails.

			* @style heading 3

			*/

			h3, .h3{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:26px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 4

			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.

			* @style heading 4

			*/

			h4, .h4{

				

font-style:italic;				

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:22px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: PREHEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section preheader style

			* @tip Set the background color for your emails preheader area.

			* @theme page

			*/

			#templatePreheader{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Header

			* @section preheader text

			* @tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.

			*/

			.preheaderContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:100%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Header

			* @section preheader link

			* @tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.

			*/

			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section header style

			* @tip Set the background color and border for your emails header area.

			* @theme header

			*/

			#templateHeader{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-bottom:0;

			}



			/**

			* @tab Header

			* @section header text

			* @tip Set the styling for your emails header text. Choose a size and color that is easy to read.

			*/

			.headerContent{

				/*@editable*/ color:#202020;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:34px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				/*@editable*/ padding:0;

				/*@editable*/ text-align:center;

				/*@editable*/ vertical-align:middle;

			}

			#llamar{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			

			#email{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			/**

			* @tab Header

			* @section header link

			* @tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.

			*/

			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			#headerImage{

				height:auto;

				max-width:600px !important;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Body

			* @section body style

			* @tip Set the background color for your emails body area.

			*/

			#templateContainer, .bodyContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Body

			* @section body text

			* @tip Set the styling for your emails main content text. Choose a size and color that is easy to read.

			* @theme main

			*/

			.bodyContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Body

			* @section body link

			* @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.

			*/

			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.bodyContent img, .fullWidthBandContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: SIDEBAR /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Sidebar

			* @section sidebar style

			* @tip Set the background color and border for your emails sidebar area.

			*/

			#templateSidebar{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Sidebar

			* @section sidebar text

			* @tip Set the styling for your emails sidebar text. Choose a size and color that is easy to read.


			*/

			.sidebarContent div{

			/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Sidebar

			* @section sidebar link

			* @tip Set the styling for your emails sidebar links. Choose a color that helps them stand out from your text.

			*/

			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.sidebarContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COLUMNS; LEFT, RIGHT /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section left column link

			* @tip Set the styling for your emails left column links. Choose a color that helps them stand out from your text.

			*/

			.leftColumnContent div a:link, .leftColumnContent div a:visited, /* Yahoo! Mail Override */ .leftColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.leftColumnContent img{

				display:inline;

				height:auto;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section right column link

			* @tip Set the styling for your emails right column links. Choose a color that helps them stand out from your text.

			*/

			.rightColumnContent div a:link, .rightColumnContent div a:visited, /* Yahoo! Mail Override */ .rightColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.rightColumnContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Footer

			* @section footer style

			* @tip Set the background color and top border for your emails footer area.

			* @theme footer

			*/

			#templateFooter{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-top:0;

			}



			/**

			* @tab Footer

			* @section footer text

			* @tip Set the styling for your emails footer text. Choose a size and color that is easy to read.

			* @theme footer

			*/

			.footerContent div{

				/*@editable*/ color:#707070;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:125%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Footer

			* @section footer link

			* @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.

			*/

			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.footerContent img{

				display:inline;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			* @theme footer

			*/

			#social{

				/*@editable*/ background-color:#FAFAFA;

				/*@editable*/ border:0;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			*/

	.vinculo{

	color: #909090;

	font-weight:bold;

	

	}

	.vinculo-social a{

		color:#676767 !important;

font-weight:bold !important;

		font-size:16px;

		text-decoration:none !important;	

		

	}

	

.vinculo a{

	color: #D63432!important;	

			font-weight:bold;

			

			

}

#social div{

				/*@editable*/ text-align:center;

			}



			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			* @theme footer

			*/

			#utility{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border:0;

			}



			#utility div{

				 text-align:center;

			}



			#monkeyRewards img{

				max-width:190px;

			}

			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			*/

			

		</style>

	</head>

    <body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>

    	<center>

        

        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>

            	<tr>

                	<td align='center' valign='top'>

                        <!-- // Begin Template Preheader \\ -->

                        <table border='0' cellpadding='10' cellspacing='0' width='600' id='templatePreheader'>

                            <tr>

                                <td valign='top' class='preheaderContent'>

                                	

                                	<!-- // Begin Module: Standard Preheader \ -->

                                    <table border='0' cellpadding='10' cellspacing='0' width='100%'>

                                     </table>

                                	<!-- // End Module: Standard Preheader \ -->

                                

                                </td>

                            </tr>

                        </table>

                        <!-- // End Template Preheader \\ -->

                     <div>   

                    	<table border='0' cellpadding='0' cellspacing='0' width='636' id='templateContainer' style='border: 2px solid #999; padding:0px; margin:0px;'>

                        	<tr>

                            	<td width='600' align='center' valign='top'>

                                    <!-- // Begin Template Header \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateHeader'>

                                        <tr>

                                            <td class='headerContent'>

                                            

                                            	<!-- // Begin Module: Standard Header Image \\ -->

                                            	<img src='http://fierros.com.co/themes/ediciones/images/newsletter.jpg' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext width='100%'/>

                                            	<!-- // End Module: Standard Header Image \\ --></td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Header \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Body \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>

                                    	<tr>

                                       

                                        	<td valign='top' width='600'>

                                            	<table border='0' cellpadding='0' cellspacing='0' width='400'>

                                                    <tr>

                                                    	<td valign='top'>

                                                            <table border='0' cellpadding='0' cellspacing='0' width='600'>

                                                                <tr>

                                                                    <td valign='top' width='180' class='leftColumnContent'>

                                                                    

                                                                        <!-- // Begin Module: Top Image with Content \\ -->

                                                                        <table border='0'>

                                                                            <tr mc:repeatable>

                                                                                <td valign='middle'><div mc:edit='std_content00'>

				 	                    <br />                     <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

 line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'>Suscripción al Newsletter</h1>

                <h2 style='color:#333333;

				display:block;

				font-family:Futura;

                font-size:18px;

 				line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'></h2>

                        <p class='vinculo' style='color: #000;

	 font-size:16px;'>Nuevo mensaje de <span class='vinculo' style='color: #000;

	 font-size:16px;'> <strong>&quot;Revista Fierros - La Comunidad #1 para Ferreteros en Colombia&quot;</strong></span>.</p>

      

            <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

                line-height:100%;

				margin-top:30px !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic; font-size:22px;'>Datos del mensaje enviado</h1>                       

 <div style='

	 font-size:14px;''>

<strong>Email:</strong> &nbsp; $Email <br />

 </div>


    <div style='

	font-size:14px;'><strong>Área en la que se desempeña:</strong>  &nbsp;$area

    </div>

    <div style='

	font-size:14px;'><strong>Industria a la que pertenece:</strong>  &nbsp;$industria

    </div>

    </p>

    <br />



    <hr />

    <p class='vinculo' style='

	font-weight:bold; font-size:12px;'><a href='www.fierros.com.co/'>¡ Visite Revista Fierros - La Comunidad #1 para Ferreteros en Colombia  !</a>

    <br />

    <br />

    	Cordialmente

	<br />

		Servicio al Cliente,       <br /><a href='www.fierros.com.co/guia/'>www.fierros.com.co</a></p>

  

     <p class='vinculo' style='color: #909090;

	font-size:12px;'>

       <strong> Copyright 2015 

Axioma Comunicaciones Ltda. 

Todos Los Derechos Reservados. </strong></p>

            </div>

            

            

            

                        </td>         </tr>

</table>

<!-- // End Module: Top Image with Content \\ -->

                                                                        

                                                                    </td>

                                                                    

                                                                </tr>

                                                            </table>

                                                        </td>

                                                    </tr>

                                                </table>                                                

                                            </td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Body \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Footer \\ --><!-- // End Template Footer \\ -->

                                </td>

                            </tr>

                        </table>

                        </div>

                        <br />

                    </td>

                </tr>

            </table>

        </center>

    </body>

</html>";



return $formularioProveedor;



}

//////////////******************************////////////////////////////////////******************************//////////////////////


function formularioProveedor($Nombre,$Email,$Telefono,$Ciudad,$Observaciones,$Pagina,$Cliente){

	$formularioProveedor="
		<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
		<html>
		<head>
		    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

		    <!-- Facebook sharing information tags -->

		    <meta property='og:title' content='*|MC:SUBJECT|*' />

		    <title>*|MC:SUBJECT|*</title>

		    <style type='text/css'>
		        /* Client-specific Styles */
		        
		        #outlook a {
		            padding: 0;
		        }
		        /* Force Outlook to provide a 'view in browser' button. */
		        
		        body {
		            width: 100% !important;
		        }
		        
		        .ReadMsgBody {
		            width: 100%;
		        }
		        
		        .ExternalClass {
		            width: 100%;
		        }
		        /* Force Hotmail to display emails at full width */
		        
		        body {
		            -webkit-text-size-adjust: none;
		        }
		        /* Prevent Webkit platforms from changing default text sizes. */
		        /* Reset Styles */
		        
		        body {
		            margin: 0;
		            padding: 0;
		        }
		        
		        img {
		            border: 0;
		            height: auto;
		            line-height: 100%;
		            outline: none;
		            text-decoration: none;
		        }
		        
		        table td {
		            border-collapse: collapse;
		        }
		        
		        #backgroundTable {
		            height: 100% !important;
		            margin: 0;
		            padding: 0;
		            width: 100% !important;
		        }
		        /* Template Styles */
		        /* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */
		        /**

					* @tab Page

					* @section background color

					* @tip Set the background color for your email. You may want to choose one that matches your companys branding

					* @theme page

					*/
		        
		        body,
		        #backgroundTable {
		            /*@editable*/
		            background-color: #FAFAFA;
		        }
		        /**

					* @tab Page

					* @section email border

					* @tip Set the border for your email.

					*/
		        
		        #templateContainer {
		            /*@editable*/
		            border: 1px solid #DDDDDD;
		        }
		        /**

					* @tab Page

					* @section heading 1

					* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.

					* @style heading 1

					*/
		        
		        strong {
		            color: #5C5C5C;
		        }
		        
		        .h4-contactenos {
		            font-family: Futura;
		            color: #FE0002 !important;
		        }
		        
		        h1,
		        .h1 {
		            /*@editable*/
		            color: #5C5C5C;
		            display: block;
		            /*@editable*/
		            font-family: Futura;
		            /*@editable*/
		            font-size: 22px;
		            /*@editable*/
		            /*@editable*/
		            line-height: 100%;
		            margin-top: 0 !important;
		            margin-right: 0 !important;
		            margin-bottom: 10px !important;
		            margin-left: 0 !important;
		            /*@editable*/
		            text-align: left;
		            font-style: italic;
		        }
		        /**

					* @tab Page

					* @section heading 2

					* @tip Set the styling for all second-level headings in your emails.

					* @style heading 2

					*/
		        
		        h2,
		        .h2 {
		            /*@editable*/
		            color: #202020;
		            display: block;
		            /*@editable*/
		            font-family: 'Futura LT Std Light';
		            /*@editable*/
		            font-size: 30px;
		            /*@editable*/
		            font-weight: bold;
		            /*@editable*/
		            line-height: 100%;
		            margin-top: 0 !important;
		            margin-right: 0 !important;
		            margin-bottom: 10px !important;
		            margin-left: 0 !important;
		            /*@editable*/
		            text-align: left;
		        }
		        /**

					* @tab Page

					* @section heading 3

					* @tip Set the styling for all third-level headings in your emails.

					* @style heading 3

					*/
		        
		        h3,
		        .h3 {
		            /*@editable*/
		            color: #202020;
		            display: block;
		            /*@editable*/
		            font-family: 'Futura LT Std Light';
		            /*@editable*/
		            font-size: 26px;
		            /*@editable*/
		            font-weight: bold;
		            /*@editable*/
		            line-height: 100%;
		            margin-top: 0 !important;
		            margin-right: 0 !important;
		            margin-bottom: 10px !important;
		            margin-left: 0 !important;
		            /*@editable*/
		            text-align: left;
		        }
		        /**

					* @tab Page

					* @section heading 4

					* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.

					* @style heading 4

					*/
		        
		        h4,
		        .h4 {
		            font-style: italic;
		            display: block;
		            /*@editable*/
		            font-family: 'Futura LT Std Light';
		            /*@editable*/
		            font-size: 22px;
		            /*@editable*/
		            font-weight: bold;
		            /*@editable*/
		            line-height: 100%;
		            margin-top: 0 !important;
		            margin-right: 0 !important;
		            margin-bottom: 10px !important;
		            margin-left: 0 !important;
		            /*@editable*/
		            text-align: left;
		        }
		        /* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: PREHEADER /\/\/\/\/\/\/\/\/\/\ */
		        /**

					* @tab Header

					* @section preheader style

					* @tip Set the background color for your emails preheader area.

					* @theme page

					*/
		        
		        #templatePreheader {
		            /*@editable*/
		            background-color: #FAFAFA;
		        }
		        /**

					* @tab Header

					* @section preheader text

					* @tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.

					*/
		        
		        .preheaderContent div {
		            /*@editable*/
		            color: #505050;
		            /*@editable*/
		            font-family: 'Futura LT Std Light';
		            /*@editable*/
		            font-size: 14px;
		            /*@editable*/
		            line-height: 100%;
		            /*@editable*/
		            text-align: left;
		        }
		        /**

					* @tab Header

					* @section preheader link

					* @tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.

					*/
		        
		        .preheaderContent div a:link,
		        .preheaderContent div a:visited,
		        /* Yahoo! Mail Override */
		        
		        .preheaderContent div a .yshortcuts
		        /* Yahoo! Mail Override */
		        
		        {
		            /*@editable*/
		            color: #336699;
		            /*@editable*/
		            font-weight: normal;
		            /*@editable*/
		            text-decoration: underline;
		        }
		        /* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */
		        /**

					* @tab Header

					* @section header style

					* @tip Set the background color and border for your emails header area.

					* @theme header

					*/
		        
		        #templateHeader {
		            /*@editable*/
		            background-color: #FFFFFF;
		            /*@editable*/
		            border-bottom: 0;
		        }
		        /**

					* @tab Header

					* @section header text

					* @tip Set the styling for your emails header text. Choose a size and color that is easy to read.

					*/
		        
		        .headerContent {
		            /*@editable*/
		            color: #202020;
		            /*@editable*/
		            font-family: 'Futura LT Std Light';
		            /*@editable*/
		            font-size: 34px;
		            /*@editable*/
		            font-weight: bold;
		            /*@editable*/
		            line-height: 100%;
		            /*@editable*/
		            padding: 0;
		            /*@editable*/
		            text-align: center;
		            /*@editable*/
		            vertical-align: middle;
		        }
		        
		        #llamar {
		            margin-top: 8px !important;
		            float: left;
		            margin-right: 10px !important;
		        }
		        
		        #email {
		            margin-top: 8px !important;
		            float: left;
		            margin-right: 10px !important;
		        }
		        /**

					* @tab Header

					* @section header link

					* @tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.

					*/
		        
		        .headerContent a:link,
		        .headerContent a:visited,
		        /* Yahoo! Mail Override */
		        
		        .headerContent a .yshortcuts
		        /* Yahoo! Mail Override */
		        
		        {
		            /*@editable*/
		            color: #336699;
		            /*@editable*/
		            font-weight: normal;
		            /*@editable*/
		            text-decoration: underline;
		        }
		        
		        #headerImage {
		            height: auto;
		            max-width: 600px !important;
		        }
		        /* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */
		        /**

					* @tab Body

					* @section body style

					* @tip Set the background color for your emails body area.

					*/
		        
		        #templateContainer,
		        .bodyContent {
		            /*@editable*/
		            background-color: #FFFFFF;
		        }
		        /**

					* @tab Body

					* @section body text

					* @tip Set the styling for your emails main content text. Choose a size and color that is easy to read.

					* @theme main

					*/
		        
		        .bodyContent div {
		            /*@editable*/
		            color: #505050;
		            /*@editable*/
		            font-family: 'Futura LT Std Light';
		            /*@editable*/
		            font-size: 14px;
		            /*@editable*/
		            line-height: 150%;
		            /*@editable*/
		            text-align: left;
		        }
		        /**

					* @tab Body

					* @section body link

					* @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.

					*/
		        
		        .bodyContent div a:link,
		        .bodyContent div a:visited,
		        /* Yahoo! Mail Override */
		        
		        .bodyContent div a .yshortcuts
		        /* Yahoo! Mail Override */
		        
		        {
		            /*@editable*/
		            color: #336699;
		            /*@editable*/
		            font-weight: normal;
		            /*@editable*/
		            text-decoration: underline;
		        }
		        
		        .bodyContent img,
		        .fullWidthBandContent img {
		            display: inline;
		            height: auto;
		        }
		        /* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: SIDEBAR /\/\/\/\/\/\/\/\/\/\ */
		        /**

					* @tab Sidebar

					* @section sidebar style

					* @tip Set the background color and border for your emails sidebar area.

					*/
		        
		        #templateSidebar {
		            /*@editable*/
		            background-color: #FFFFFF;
		        }
		        /**

					* @tab Sidebar

					* @section sidebar text

					* @tip Set the styling for your emails sidebar text. Choose a size and color that is easy to read.

					*/
		        
		        .sidebarContent div {
		            /*@editable*/
		            font-family: 'Futura LT Std Light';
		            /*@editable*/
		            font-size: 14px;
		            /*@editable*/
		            line-height: 150%;
		            /*@editable*/
		            text-align: left;
		        }
		        /**

					* @tab Sidebar

					* @section sidebar link

					* @tip Set the styling for your emails sidebar links. Choose a color that helps them stand out from your text.

					*/
		        
		        .sidebarContent div a:link,
		        .sidebarContent div a:visited,
		        /* Yahoo! Mail Override */
		        
		        .sidebarContent div a .yshortcuts
		        /* Yahoo! Mail Override */
		        
		        {
		            /*@editable*/
		            color: #336699;
		            /*@editable*/
		            font-weight: normal;
		            /*@editable*/
		            text-decoration: underline;
		        }
		        
		        .sidebarContent img {
		            display: inline;
		            height: auto;
		        }
		        /* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COLUMNS; LEFT, RIGHT /\/\/\/\/\/\/\/\/\/\ */
		        /**

					* @tab Columns

					* @section left column text

					* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

					*/
		        
		        .leftColumnContent {
		            /*@editable*/
		            background-color: #FFFFFF;
		        }
		        /**

					* @tab Columns

					* @section left column text

					* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

					*/
		        
		        .leftColumnContent div {
		            /*@editable*/
		            color: #505050;
		            /*@editable*/
		            font-family: 'Futura LT Std Light';
		            /*@editable*/
		            font-size: 14px;
		            /*@editable*/
		            line-height: 150%;
		            /*@editable*/
		            text-align: left;
		        }
		        /**

					* @tab Columns

					* @section left column link

					* @tip Set the styling for your emails left column links. Choose a color that helps them stand out from your text.

					*/
		        
		        .leftColumnContent div a:link,
		        .leftColumnContent div a:visited,
		        /* Yahoo! Mail Override */
		        
		        .leftColumnContent div a .yshortcuts
		        /* Yahoo! Mail Override */
		        
		        {
		            /*@editable*/
		            color: #336699;
		            /*@editable*/
		            font-weight: normal;
		            /*@editable*/
		            text-decoration: underline;
		        }
		        
		        .leftColumnContent img {
		            display: inline;
		            height: auto;
		        }
		        /**

					* @tab Columns

					* @section right column text

					* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

					*/
		        
		        .rightColumnContent {
		            /*@editable*/
		            background-color: #FFFFFF;
		        }
		        /**

					* @tab Columns

					* @section right column text

					* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

					*/
		        
		        .rightColumnContent div {
		            /*@editable*/
		            color: #505050;
		            /*@editable*/
		            font-family: 'Futura LT Std Light';
		            /*@editable*/
		            font-size: 14px;
		            /*@editable*/
		            line-height: 150%;
		            /*@editable*/
		            text-align: left;
		        }
		        /**

					* @tab Columns

					* @section right column link

					* @tip Set the styling for your emails right column links. Choose a color that helps them stand out from your text.

					*/
		        
		        .rightColumnContent div a:link,
		        .rightColumnContent div a:visited,
		        /* Yahoo! Mail Override */
		        
		        .rightColumnContent div a .yshortcuts
		        /* Yahoo! Mail Override */
		        
		        {
		            /*@editable*/
		            color: #336699;
		            /*@editable*/
		            font-weight: normal;
		            /*@editable*/
		            text-decoration: underline;
		        }
		        
		        .rightColumnContent img {
		            display: inline;
		            height: auto;
		        }
		        /* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */
		        /**

					* @tab Footer

					* @section footer style

					* @tip Set the background color and top border for your emails footer area.

					* @theme footer

					*/
		        
		        #templateFooter {
		            /*@editable*/
		            background-color: #FFFFFF;
		            /*@editable*/
		            border-top: 0;
		        }
		        /**

					* @tab Footer

					* @section footer text

					* @tip Set the styling for your emails footer text. Choose a size and color that is easy to read.

					* @theme footer

					*/
		        
		        .footerContent div {
		            /*@editable*/
		            color: #707070;
		            /*@editable*/
		            font-family: 'Futura LT Std Light';
		            /*@editable*/
		            font-size: 14px;
		            /*@editable*/
		            line-height: 125%;
		            /*@editable*/
		            text-align: left;
		        }
		        /**

					* @tab Footer

					* @section footer link

					* @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.

					*/
		        
		        .footerContent div a:link,
		        .footerContent div a:visited,
		        /* Yahoo! Mail Override */
		        
		        .footerContent div a .yshortcuts
		        /* Yahoo! Mail Override */
		        
		        {
		            /*@editable*/
		            color: #336699;
		            /*@editable*/
		            font-weight: normal;
		            /*@editable*/
		            text-decoration: underline;
		        }
		        
		        .footerContent img {
		            display: inline;
		        }
		        /**

					* @tab Footer

					* @section social bar style

					* @tip Set the background color and border for your emails footer social bar.

					* @theme footer

					*/
		        
		        #social {
		            /*@editable*/
		            background-color: #FAFAFA;
		            /*@editable*/
		            border: 0;
		        }
		        /**

					* @tab Footer

					* @section social bar style

					* @tip Set the background color and border for your emails footer social bar.

					*/
		        
		        .vinculo {
		            color: #909090;
		            font-weight: bold;
		        }
		        
		        .vinculo-social a {
		            color: #676767 !important;
		            font-weight: bold !important;
		            font-size: 16px;
		            text-decoration: none !important;
		        }
		        
		        .vinculo a {
		            color: #D63432!important;
		            font-weight: bold;
		        }
		        
		        #social div {
		            /*@editable*/
		            text-align: center;
		        }
		        /**

					* @tab Footer

					* @section utility bar style

					* @tip Set the background color and border for your emails footer utility bar.

					* @theme footer

					*/
		        
		        #utility {
		            /*@editable*/
		            background-color: #FFFFFF;
		            /*@editable*/
		            border: 0;
		        }
		        
		        #utility div {
		            text-align: center;
		        }
		        
		        #monkeyRewards img {
		            max-width: 190px;
		        }
		        /**

					* @tab Footer

					* @section utility bar style

					* @tip Set the background color and border for your emails footer utility bar.

					*/
		    </style>

		</head>

		<body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>

		    <center>



		        <table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>

		            <tr>

		                <td align='center' valign='top'>

		                    <!-- // Begin Template Preheader \\ -->

		                    <table border='0' cellpadding='10' cellspacing='0' width='600' id='templatePreheader'>

		                        <tr>

		                            <td valign='top' class='preheaderContent'>



		                                <!-- // Begin Module: Standard Preheader \ -->

		                                <table border='0' cellpadding='10' cellspacing='0' width='100%'>

		                                </table>

		                                <!-- // End Module: Standard Preheader \ -->



		                            </td>

		                        </tr>

		                    </table>

		                    <!-- // End Template Preheader \\ -->

		                    <div>

		                        <table border='0' cellpadding='0' cellspacing='0' width='636' id='templateContainer' style='border: 2px solid #999; padding:0px; margin:0px;'>

		                            <tr>

		                                <td width='600' align='center' valign='top'>

		                                    <!-- // Begin Template Header \\ -->

		                                    <table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateHeader'>

		                                        <tr>

		                                            <td class='headerContent'>



		                                                <!-- // Begin Module: Standard Header Image \\ -->

		                                                <img src='http://fierros.com.co/themes/guia/images/guia-fierros.jpg' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext width='100%' />

		                                                <!-- // End Module: Standard Header Image \\ -->
		                                            </td>

		                                        </tr>

		                                    </table>

		                                    <!-- // End Template Header \\ -->

		                                </td>

		                            </tr>

		                            <tr>

		                                <td align='center' valign='top'>

		                                    <!-- // Begin Template Body \\ -->

		                                    <table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>

		                                        <tr>



		                                            <td valign='top' width='600'>

		                                                <table border='0' cellpadding='0' cellspacing='0' width='400'>

		                                                    <tr>

		                                                        <td valign='top'>

		                                                            <table border='0' cellpadding='0' cellspacing='0' width='600'>

		                                                                <tr>

		                                                                    <td valign='top' width='180' class='leftColumnContent'>



		                                                                        <!-- // Begin Module: Top Image with Content \\ -->

		                                                                        <table border='0'>

		                                                                            <tr mc:repeatable>

		                                                                                <td valign='middle'>
		                                                                                    <div mc:edit='std_content00'>

		                                                                                        <br />
		                                                                                        <h1 class='h1' style='color:#333333;

						display:block;

						font-family:Futura;

						font-size:22px;

		 line-height:100%;

						margin-top:0 !important;

						margin-right:0 !important;

						margin-bottom:10px !important;

						margin-left:0 !important;

		text-align:left;

						font-style:italic;'>Hola, $Cliente</h1>

		                                                                                        <p class='vinculo' style='color: #000;

			 font-size:16px;'>Enviamos a usted una cotización, adquirida <span class='vinculo' style='color: #000;

			 font-size:16px;'>a través de su Micrositio</span> <span class='vinculo' style='color: #000;

			 font-size:16px;'>en <strong>&quot;Todo Para – Guía de Proveedores de la Revista Fierros&quot;:</strong></span><br /> (

		                                                                                            <a href='http://fierros.com.co/guia/$Pagina' style='color:#15c;'>http://fierros.com.co/guia/$Pagina</a>)</p>



		                                                                                        <h1 class='h1' style='color:#333333;

						display:block;

						font-family:Futura;

						font-size:22px;

		                line-height:100%;

						margin-top:30px !important;

						margin-right:0 !important;

						margin-bottom:10px !important;

						margin-left:0 !important;

		text-align:left;

						font-style:italic; font-size:22px;'>Datos del cliente</h1>
		                                                                                        <div style='font-size:14px;'><strong>Nombre:</strong> &nbsp; $Nombre

		                                                                                        </div>

		                                                                                        <div style='

			 font-size:14px;' '>

		<strong>Email:</strong> &nbsp; $Email <br />

		 </div>

		<div style=' font-size:14px; '><strong>Tel&eacute;fono:</strong>  &nbsp; $Telefono

		    </div>

		    <div style=' font-size:14px; '><strong>Ciudad:</strong> &nbsp; $Ciudad

		    </div>

		    <div style=' font-size:14px; '><strong>Comentarios:</strong>  &nbsp;$Observaciones

		    </div>

		    </p>

		    <br />

		    <hr />

		    <p class='vinculo ' style=' font-weight:bold; font-size:12px; '>¡ Le recomendamos contactarse pronto con el cotizante, a través de sus datos de contacto !

		    <br />

		    <br />

		    	Cordialmente

			<br />

				Servicio al Cliente,       <br /><a href='www.fierros.com.co/guia/ '>www.fierros.com.co/guia/</a></p>

		  

		     <p class='vinculo ' style='color: #909090; font-size:12px; '>

		       <strong> Copyright 2015 

		Axioma Comunicaciones Ltda. 

		Todos Los Derechos Reservados. </strong></p>

		            </div>

		            

		            

		            

		                        </td>         </tr>

		</table>

		<!-- // End Module: Top Image with Content \\ -->

		                                                                        

		                                                                    </td>

		                                                                    

		                                                                </tr>

		                                                            </table>

		                                                        </td>

		                                                    </tr>

		                                                </table>                                                

		                                            </td>

		                                        </tr>

		                                    </table>

		                                    <!-- // End Template Body \\ -->

		                                </td>

		                            </tr>

		                        	<tr>

		                            	<td align='center ' valign='top '>

		                                    <!-- // Begin Template Footer \\ --><!-- // End Template Footer \\ -->

		                                </td>

		                            </tr>

		                        </table>

		                        </div>

		                        <br />

		                    </td>

		                </tr>

		            </table>

		        </center>

		    </body>

		</html>
	";
	return $formularioProveedor;
}

//////////////******************************////////////////////////////////////******************************//////////////////////
function replaceValues($string)  {
    $output='';
    $string_array = str_split($string);
    foreach ($string_array as $key => $value) {
      if(preg_match("/^[@\-\.\/\+\*]+$/i", $value))
        $output .= $value;
      else
        $output .="*";
    }
    return $output;
  }

  function validateComment($string){
    $output = "";
    $string_array = explode(" ", $string);

    foreach ($string_array as $key => $value) {
      if(filter_var($value, FILTER_VALIDATE_EMAIL))
        $output.= replaceValues($value) . " ";
      elseif (preg_match("/^[\+0-9\-\(\)\s]{7}/", $value))
        $output.= replaceValues($value) . " ";
      elseif (preg_match("%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i", $value))
        $output.= replaceValues($value) . " ";
      else
        $output.= $value . " ";
    }
    return $output;
  }

  // -----------------------------------------------------------------------------------------//

  function formularioProducto_bronce($Nombre,$Email,$Telefono,$Ciudad,$Observaciones,$Pagina,$Cliente,$ClienteTel,$EmailCliente,$productName,$productURL,$show_information){
  	$year =date("Y");
  	$serverHost = $_SERVER['HTTP_HOST'];
	if(!preg_match('/www/', $_SERVER['HTTP_HOST'])) $serverHost = 'www.'.$serverHost;

    if(!$show_information){
      $Email = replaceValues($Email);
      $Telefono = replaceValues($Telefono);
      $Ciudad = replaceValues($Ciudad);
      $Observaciones= validateComment($Observaciones);
    }
    $email_message = "
    <div style='background-color:#111'>
        <table style='background-color:#111' width='100%' cellspacing='0' cellpadding='0' border='0' align='center'>
          <tbody>
            <tr>
              <td>
                <table style='margin:0 auto;background-color:#111' width='600' cellspacing='0' cellpadding='0' border='0' align='center'>
                  <tbody>
                    <tr>
                      <td align='center'>
                        <table style='background-color:#111' width='600' cellspacing='0' cellpadding='0' border='0'>
                          <tbody>
                            <tr>
                              <td align='center'>
                                <table style='width:600px;text-align:left;padding-top:0px;background-color:#111' cellspacing='0' cellpadding='0'>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <table cellspacing='0' cellpadding='0'>
                                          <tbody>
                                            <tr>
                                              <td>
                                                <table style='border-spacing:0px' width='600' cellspacing='0' cellpadding='0' border='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='line-height:0px;padding:20px 0px 10px 0px;' align='center'>
                                                        <a href='http://".$serverHost."' style='color:inherit;text-decoration:none;vertical-align:middle' target='_blank'> <img src='http://".$serverHost."/files/desarrollo_axioma/fierros.png' alt='Revista Fierros' class='CToWUd'></a> <img src='http://".$serverHost."/files/desarrollo_axioma/transparent.png' alt='transparent' style='min-width:600px' class='CToWUd'> </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style='padding:0px'>
                                                <table width='590' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='vertical-align:top;' width='590'>
                                                        <a href='http://".$serverHost."/guia' target='_blank'> <img style='display:block;padding:0px' alt='Banner Mailing Image' src='http://".$serverHost."/files/desarrollo_axioma/banner-mailing.jpg' class='CToWUd a6T' tabindex='0' width='600' height='153' border='0'> </a>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>

                                            <tr style='background-color:#810606;'>
                                              <td>
                                                <table style='margin: 20px 0px 20px;' width='600' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='height:40px;padding:0px 20px 0px 20px' height='40' align='center'>
                                                        <a style='text-decoration:none;border-radius:5px;font-family:Helvetica,Arial,Gadget,sans-serif;padding:0px 10px;background-color:#222;color:#FFF; font-weight:bold;width:240px;float: right;' href='http://".$serverHost."/beneficios-oro' target='_blank'>  
                                                          <p style='width: 87%;float: left;color:#FFF;font-size: 14px'>CONOZCA LOS BENEFICIOS DE LA  MEMBRESÍA ORO</p>
                                                          <img src='http://".$serverHost."/files/desarrollo_axioma/tap.png' alt='arrow-oro' style='width: 13%;float: left;margin-top: 8%;'>
                                                        </a>
                                                      </td>
                                                      <td style='height:40px;padding:0px 20px 0px 20px' height='40' align='center'>
                                                        <a style='text-decoration:none;border-radius:5px;font-family:Helvetica,Arial,Gadget,sans-serif;padding:0px 10px;background-color:#222;color:#FFF; font-weight:bold;width:240px;float: left;' href='http://".$serverHost."/beneficios-oro?empresa=$Cliente&amp;mail=$EmailCliente&amp;tel=$ClienteTel#formulario' target='_blank'>
                                                          <p style='width: 85%;float: left;color:#FFF;font-size: 14px'>OPTIMICE SU SITIO A <br> MEMBRESÍA ORO</p>
                                                          <img src='http://".$serverHost."/files/desarrollo_axioma/hand-arrow-top.png' alt='tap-oro' style='width: 15%;float: left;margin-top: 5%;'>
                                                        </a>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <table style='background-color:#FFF' width='600'>
                                                  <tbody>
                                                    <tr><td style='padding:30px 30px 0px 30px;vertical-align:top' align='left'>
                                                      <div style='word-wrap:break-word;width:100%'>
                                                        <div role='textbox'>
                                                          <p style='font-family:Helvetica;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color#111'>
                                                            <span style='color:#111;font-size:20px;padding-bottom:10px;font-style:italic;'>
                                                              <strong>Hola, $Cliente</strong>
                                                            </span>
                                                             <br>
                                                            <span style='color:#111;font-size:17px;'>
                                                            Recibimos una cotización para usted, de su producto <a  
                                                            style='font-family:Helvetica;font-size:17px;color:#00F' href='$productURL' target='_blank'>
                                                              $productName</a>.
                                                          </span>
                                                          </p>
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr></tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <table style='background-color:#FFF' width='600' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td>
                                                        <table cellspacing='0' cellpadding='0' border='0'>
                                                          <tbody>
                                                            <tr>
                                                              <td style='padding:15px 30px;vertical-align:top' width='600'>
                                                                <div style='word-wrap:break-word;'>
                                                                  <h1 style='display:block;font-size:20px;font-weight:bolder;line-height:120%;margin:0px 0px 12px;word-wrap:break-word;color:#555;font-family:Helvetica,Arial,Gadget,sans-serif;' role='textbox'>
                                                                  <em><b>Datos del cliente</b></em>
                                                                  </h1>
                                                                  <div style='font-family:Arial;font-size:14px;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color:#111' role='textbox'>
                                                                    <strong style='color:#111;'>Nombre:&nbsp;</strong>
                                                                    <span style='color:#111;'>$Nombre</span><br>

                                                                    <strong style='color:#111;'>E-mail:&nbsp;</strong>
                                                                    <a href='mailto:$Email' target='_blank'>$Email</a><br>

                                                                    <strong style='color:#111;'>Teléfono:&nbsp;</strong>
                                                                    <span style='color:#111;'>$Telefono</span><br>

                                                                    <strong style='color:#111;'>Ciudad:&nbsp;</strong>
                                                                    <span style='color:#111;'>$Ciudad</span><br>

                                                                    <strong style='color:#111;'>Comentarios:&nbsp;</strong>
                                                                    <span style='color:#111;'>$Observaciones</span><br>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td align='left'> </td>
                            </tr>
                            <tr>
                              <td align='left'> </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr style='background-color:#FFF'>
                      <td>
                        <table width='600' cellspacing='0' cellpadding='0'>
                          <tbody>
                            
                            <tr>
                              <td style='background-color: #810606;padding: 10px 0px;border-top: 2px #FFF dashed;'>
                                <p style='width:530px;padding:5px 30px;margin: 5px 0 5px;text-align:center;font-family:Helvetica,Arial,Gadget,sans-serif;font-size: 17px;font-weight: 700;color:#FFF;'>¡Si desea recibir la información completa de su cotización, adquiera una membresía oro 
                                <a href='http://".$serverHost."/beneficios-oro?empresa=$Cliente&amp;mail=$EmailCliente&amp;tel=$ClienteTel#formulario' style='color: #F9FF00;' target='_blank'>aquí!</a>
                                </p>
                              </td>
                              
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align='center'>
                        <table style='margin:0 auto' width='600' cellspacing='0' cellpadding='0'>
                          <tbody>
                            <tr>
                               <td style='padding:15px 0px 10px 0px' align='center'>
                                <p style='font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:11px;margin:0px;word-wrap:break-word;color:#FFF'>
                                    <span style='font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:11px;margin:0px;word-wrap:break-word;color:#FFF'> Cordialmente&nbsp; <br> <span style='color:#FFF'>Servicio al Cliente,</span>&nbsp; </span>
                                    <br>
                                    <a href='http://".$serverHost."/guia/' style='font-size:11.5px;color:#E03F3F;font-weight: 700;' target='_blank'>
                                        ".$serverHost."/guia/
                                    </a> 
                                    <br><br>
                                    <span style='padding-top:10px; font-size:12px;color:#FFF'>
                                        Copyright $year Axioma Comunicaciones Ltda. Todos Los Derechos Reservados.
                                    </span>
                                  </p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    ";
    return $email_message;
  }
// -----------------------------------------------------------------------------------------//
function formularioProducto_oro($Nombre,$Email,$Telefono,$Ciudad,$Observaciones,$Pagina,$Cliente,$ClienteTel,$EmailCliente,$productName,$productURL){
    $year =date("Y");
    $serverHost = $_SERVER['HTTP_HOST'];

    $email_message = "
    <div style='background-color:#111'>
        <table style='background-color:#111' width='100%' cellspacing='0' cellpadding='0' border='0' align='center'>
          <tbody>
            <tr>
              <td>
                <table style='margin:0 auto;background-color:#111' width='600' cellspacing='0' cellpadding='0' border='0' align='center'>
                  <tbody>
                    <tr>
                      <td align='center'>
                        <table style='background-color:#111' width='600' cellspacing='0' cellpadding='0' border='0'>
                          <tbody>
                            <tr>
                              <td align='center'>
                                <table style='width:600px;text-align:left;padding-top:0px;background-color:#111' cellspacing='0' cellpadding='0'>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <table cellspacing='0' cellpadding='0'>
                                          <tbody>
                                            <tr>
                                              <td>
                                                <table style='border-spacing:0px' width='600' cellspacing='0' cellpadding='0' border='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='line-height:0px;padding:20px 0px 10px 0px;' align='center'>
                                                        <a href='http://".$serverHost."' style='color:inherit;text-decoration:none;vertical-align:middle' target='_blank'> <img src='http://".$serverHost."/files/desarrollo_axioma/fierros.png' alt='Revista Fierros' class='CToWUd'></a> <img src='http://".$serverHost."/files/desarrollo_axioma/transparent.png' alt='transparent' style='min-width:600px' class='CToWUd'> </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style='padding:0px'>
                                                <table width='590' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='vertical-align:top;' width='590'>
                                                        <a href='http://".$serverHost."/guia' target='_blank'> <img style='display:block;padding:0px' alt='Banner Mailing Image' src='http://".$serverHost."/files/desarrollo_axioma/membresia-oro-fierros.jpg' class='CToWUd a6T' tabindex='0' width='600' height='153' border='0'> </a>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <table style='background-color:#FFF' width='600'>
                                                  <tbody>
                                                    <tr><td style='padding:30px 30px 0px 30px;vertical-align:top' align='left'>
                                                      <div style='word-wrap:break-word;width:100%'>
                                                        <div role='textbox'>
                                                          <p style='font-family:Helvetica;font-size:17px;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color#111'>
                                                            <span style='color:#111;font-size:20px;padding-bottom:10px;font-style:italic;'><strong>Hola, $Cliente</strong></span>
                                                            <br>
                                                            <span style='color:#111;font-size:17px;'>
                                                            Recibimos una cotización para usted, de su producto <a style='font-family:Helvetica;font-size:17px;color:#00F' href='$productURL' target='_blank'>
                                                              $productName</a>.
                                                          </span>
                                                           </p>
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr></tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <table style='background-color:#FFF' width='600' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td>
                                                        <table cellspacing='0' cellpadding='0' border='0'>
                                                          <tbody>
                                                            <tr>
                                                              <td style='padding:15px 30px;vertical-align:top' width='600'>
                                                                <div style='word-wrap:break-word;'>
                                                                  <h1 style='display:block;font-size:20px;font-weight:bolder;line-height:120%;margin:0px 0px 12px;word-wrap:break-word;color:#555;font-family:Helvetica,Arial,Gadget,sans-serif;' role='textbox'>
                                                                  <em><b>Datos del cliente</b></em>
                                                                  </h1>
                                                                  <div style='font-family:Arial;font-size:14px;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color:#111' role='textbox'>
                                                                  <strong style='color:#111'>Nombre:&nbsp;</strong>
                                  <span style='color:#111'>$Nombre</span><br>
                                                                  <strong style='color:#111'>E-mail:&nbsp;</strong><a href='mailto:$Email' target='_blank'>$Email</a><br>
                                                                  <strong style='color:#111'>Teléfono:&nbsp;</strong> $Telefono<br>
                                                                  <strong style='color:#111'>Ciudad:&nbsp;</strong>
                                  <span style='color:#111'>$Ciudad</span><br>
                                                                  <strong style='color:#111'>Comentarios:&nbsp;</strong>
                                                                  <span style='color:#111'>$Observaciones</span><br>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr style='background-color:#FFF'>
                                              <td>
                                                <table width='600' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='background-color: #810606;padding: 10px 0px;border-top: 2px #FFF dashed;'>
                                                        <p style='width:530px;padding:5px 30px;margin: 5px 0 5px;text-align:center;font-family:Helvetica,Arial,Gadget,sans-serif;font-size: 17px;font-weight: 700;color:#FFF;'>¡Le recomendamos contactarse pronto con el cotizante, a través de sus datos de contacto !
                                                        </p>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                            </td></tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align='center'>
                        <table style='margin:0 auto' width='600' cellspacing='0' cellpadding='0'>
                          <tbody>
                            <tr>
                              <td style='padding:15px 0px 10px 0px' align='center'>
                                <p style='font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:11px;margin:0px;word-wrap:break-word;color:#FFF'>
                                    <span style='font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:11px;margin:0px;word-wrap:break-word;color:#FFF'> Cordialmente&nbsp; <br> <span style='color:#FFF'>Servicio al Cliente,</span>&nbsp; </span>
                                    <br>
                                    <a href='http://".$serverHost."/guia/' style='font-size:11.5px;color:#E03F3F;font-weight: 700;' target='_blank'>
                                        ".$serverHost."/guia/
                                    </a> 
                                    <br><br>
                                    <span style='padding-top:10px; font-size:12px;color:#FFF'>
                                        Copyright $year Axioma Comunicaciones Ltda. Todos Los Derechos Reservados.
                                    </span>
                                  </p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    ";
    return $email_message;
  }
  // ----------------------------------------------------------------------------------------------------------- //
function formularioProveedor_recomendado($Nombre,$Email,$Telefono,$Ciudad,$Observaciones,$Pagina,$Cliente,$Categoria = '',$Categoria_url = '',$productName = ''){
    $year =date("Y");
    $product_estimated ='';
    $serverHost = $_SERVER['HTTP_HOST'];
	if(!preg_match('/www/', $_SERVER['HTTP_HOST'])) $serverHost = 'www.'.$serverHost;
	if($productName!='')
		 $product_estimated = "<strong style='color:#111'>Producto Cotizado:&nbsp;</strong>
								<span style='color:#111'>$productName</span>
								<br>";
    $formularioProveedorRecomendado = "
      <div style='background-color:#111'>
        <table style='background-color:#111' width='100%' cellspacing='0' cellpadding='0' border='0' align='center'>
          <tbody>
            <tr>
              <td>
                <table style='margin:0 auto;background-color:#111' width='600' cellspacing='0' cellpadding='0' border='0' align='center'>
                  <tbody>
                    <tr>
                      <td align='center'>
                        <table style='background-color:#111' width='600' cellspacing='0' cellpadding='0' border='0'>
                          <tbody>
                            <tr>
                              <td align='center'>
                                <table style='width:600px;text-align:left;padding-top:0px;background-color:#111' cellspacing='0' cellpadding='0'>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <table cellspacing='0' cellpadding='0'>
                                          <tbody>
                                            <tr>
                                              <td>
                                                <table style='border-spacing:0px' width='600' cellspacing='0' cellpadding='0' border='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='line-height:0px;padding:20px 0px 10px 0px;' align='center'>
                                                        <a href='http://".$serverHost."' style='color:inherit;text-decoration:none;vertical-align:middle' target='_blank'> <img src='http://".$serverHost."/files/desarrollo_axioma/fierros.png' alt='Revista Fierros' class='CToWUd'></a> <img src='http://".$serverHost."/files/desarrollo_axioma/transparent.png' alt='transparent' style='min-width:600px' class='CToWUd'> </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style='padding:0px'>
                                                <table width='590' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='vertical-align:top;' width='590'>
                                                        <a href='http://".$serverHost."/guia' target='_blank'> <img style='display:block;padding:0px' alt='Banner Mailing Image' src='http://".$serverHost."/files/desarrollo_axioma/membresia-oro-fierros.jpg' class='CToWUd a6T' tabindex='0' width='600' height='153' border='0'> </a>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <table style='background-color: #EF0005; padding: 6px 10px; border-bottom: 2px dashed #ffffff; border-top: 1px solid #111111;'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='text-align: center;'><span style='font-family: Helvetica; font-size: 17px; line-height: 160%; margin: 0px 0px 12px; word-wrap: break-word; color: #ffffff; font-weight: 600'>Esta informaci&oacute;n ha llegado a usted por ser un proveedor destacado dentro de la categor&iacute;a <a style='color:#FFF' href='http://".$serverHost."/guia/category/$Categoria_url'>$Categoria</a></span></td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <table style='background-color:#FFF' width='600'>
                                                  <tbody>
                                                    <tr><td style='padding:30px 30px 0px 30px;vertical-align:top' align='left'>
                                                      <div style='word-wrap:break-word;width:100%'>
                                                        <div role='textbox'>
                                                          <p style='font-family:Helvetica;font-size:17px;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color#111'>
                                                            <span style='color:#111;font-size:20px;padding-bottom:10px;font-style:italic;'><strong>Hola, $Cliente</strong></span>
                                                            <br>
                                                            <span style='color:#111;font-size:17px;'>Creemos que este contacto puede interesarle, por ser un proveedor destacado dentro de la categoría <a style='color:#111' href='http://".$serverHost."/guia/category/$Categoria_url'>$Categoria</a></span>
                                                           </p>
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr></tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <table style='background-color:#FFF' width='600' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td>
                                                        <table cellspacing='0' cellpadding='0' border='0'>
                                                          <tbody>
                                                            <tr>
                                                              <td style='padding:15px 30px;vertical-align:top' width='600'>
                                                                <div style='word-wrap:break-word;'>
                                                                  <h1 style='display:block;font-size:20px;font-weight:bolder;line-height:120%;margin:0px 0px 12px;word-wrap:break-word;color:#555;font-family:Helvetica,Arial,Gadget,sans-serif;' role='textbox'>
                                                                  <em><b>Datos del cliente</b></em>
                                                                  </h1>
                                                                  <div style='font-family:Arial;font-size:14px;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color:rgb(35,31,32)' role='textbox'>
                                                                  <strong style='color:#111'>Nombre:&nbsp;</strong><span style='color:#111'>$Nombre</span><br>
                                                                  <strong style='color:#111'>E-mail:&nbsp;</strong><a href='mailto:$Email' target='_blank'>$Email</a><br>
                                                                  <strong style='color:#111'>Teléfono:&nbsp;</strong> <span style='color:#111'>$Telefono</span><br>
                                                                  <strong style='color:#111'>Ciudad:&nbsp;</strong> <span style='color:#111'>$Ciudad</span><br>
                                                                  $product_estimated
                                                                  <strong style='color:#111'>Comentarios:&nbsp;</strong><span style='color:#111'>$Observaciones</span><br>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr style='background-color:#FFF'>
                                              <td>
                                                <table width='600' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='background-color: #810606;padding: 10px 0px;border-top: 2px #FFF dashed;'>
                                                        <p style='width:530px;padding:5px 30px;margin: 5px 0 5px;text-align:center;font-family:Helvetica,Arial,Gadget,sans-serif;font-size: 17px;font-weight: 700;color:#FFF;'>¡Le recomendamos contactarse pronto con el cotizante, a través de sus datos de contacto !
                                                        </p>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                            </td></tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align='center'>
                        <table style='margin:0 auto' width='600' cellspacing='0' cellpadding='0'>
                          <tbody>
                            <tr>
                              <td style='padding:15px 0px 10px 0px' align='center'>
                                <p style='font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:11px;margin:0px;word-wrap:break-word;color:#FFF'>
                                    <span style='font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:11px;margin:0px;word-wrap:break-word;color:#FFF'> Cordialmente&nbsp; <br> <span style='color:#FFF'>Servicio al Cliente,</span>&nbsp; </span>
                                    <br>
                                    <a href='http://".$serverHost."/guia/' style='font-size:11.5px;color:#E03F3F;font-weight: 700;' target='_blank'>
                                        ".$serverHost."/guia/
                                    </a> 
                                    <br><br>
                                    <span style='padding-top:10px; font-size:12px;color:#FFF'>
                                        Copyright $year Axioma Comunicaciones Ltda. Todos Los Derechos Reservados.
                                    </span>
                                  </p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>";
    return $formularioProveedorRecomendado;
  }
// -----------------------------------------------------------------------------------------//
function formularioProveedor_oro($Nombre,$Email,$Telefono,$Ciudad,$Observaciones,$Pagina,$Cliente){
$year =date("Y");
$serverHost = $_SERVER['HTTP_HOST'];
if(!preg_match('/www/', $_SERVER['HTTP_HOST'])) $serverHost = 'www.'.$serverHost;

$formularioProveedorOro="
	<div style='background-color:#111'>
        <table style='background-color:#111' width='100%' cellspacing='0' cellpadding='0' border='0' align='center'>
          <tbody>
            <tr>
              <td>
                <table style='margin:0 auto;background-color:#111' width='600' cellspacing='0' cellpadding='0' border='0' align='center'>
                  <tbody>
                    <tr>
                      <td align='center'>
                        <table style='background-color:#111' width='600' cellspacing='0' cellpadding='0' border='0'>
                          <tbody>
                            <tr>
                              <td align='center'>
                                <table style='width:600px;text-align:left;padding-top:0px;background-color:#111' cellspacing='0' cellpadding='0'>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <table cellspacing='0' cellpadding='0'>
                                          <tbody>
                                            <tr>
                                              <td>
                                                <table style='border-spacing:0px' width='600' cellspacing='0' cellpadding='0' border='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='line-height:0px;padding:20px 0px 10px 0px;' align='center'>
                                                        <a href='http://".$serverHost."' style='color:inherit;text-decoration:none;vertical-align:middle' target='_blank'> <img src='http://".$serverHost."/files/desarrollo_axioma/fierros.png' alt='Revista Fierros' class='CToWUd'></a> <img src='http://".$serverHost."/files/desarrollo_axioma/transparent.png' alt='transparent' style='min-width:600px' class='CToWUd'> </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style='padding:0px'>
                                                <table width='590' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='vertical-align:top;' width='590'>
                                                        <a href='http://".$serverHost."/guia' target='_blank'> <img style='display:block;padding:0px' alt='Banner Mailing Image' src='http://".$serverHost."/files/desarrollo_axioma/membresia-oro-fierros.jpg' class='CToWUd a6T' tabindex='0' width='600' height='153' border='0'> </a>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <table style='background-color:#FFF' width='600'>
                                                  <tbody>
                                                    <tr><td style='padding:30px 30px 0px 30px;vertical-align:top' align='left'>
                                                      <div style='word-wrap:break-word;width:100%'>
                                                        <div role='textbox'>
                                                          <p style='font-family:Helvetica;font-size:17px;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color#111'>
                                                            <span style='color:#111;font-size:20px;padding-bottom:10px;font-style:italic;'><strong>Hola, $Cliente</strong></span>
                                                            <br>
                                                            <span style='color:#111;font-size:17px;'>Recibimos una cotización para usted, adquirida a través de su <a href='http://".$serverHost."/guia/$Pagina'>Micrositio con Membresía Oro.</a></span>
                                                           </p>
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr></tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <table style='background-color:#FFF' width='600' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td>
                                                        <table cellspacing='0' cellpadding='0' border='0'>
                                                          <tbody>
                                                            <tr>
                                                              <td style='padding:15px 30px;vertical-align:top' width='600'>
                                                                <div style='word-wrap:break-word;'>
                                                                  <h1 style='display:block;font-size:20px;font-weight:bolder;line-height:120%;margin:0px 0px 12px;word-wrap:break-word;color:#555;font-family:Helvetica,Arial,Gadget,sans-serif;' role='textbox'>
                                                                  <em><b>Datos del cliente</b></em>
                                                                  </h1>
                                                                  <div style='font-family:Arial;font-size:14px;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color:rgb(35,31,32)' role='textbox'>
                                                                  <strong style='color:#111'>Nombre:&nbsp;</strong><span style='color:#111'>$Nombre</span><br>
                                                                  <strong style='color:#111'>E-mail:&nbsp;</strong><a href='mailto:$Email' target='_blank'>$Email</a><br>
                                                                  <strong style='color:#111'>Teléfono:&nbsp;</strong> <span style='color:#111'>$Telefono</span><br>
                                                                  <strong style='color:#111'>Ciudad:&nbsp;</strong> <span style='color:#111'>$Ciudad</span><br>
                                                                  <strong style='color:#111'>Comentarios:&nbsp;</strong><span style='color:#111'>$Observaciones</span><br>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr style='background-color:#FFF'>
                                              <td>
                                                <table width='600' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='background-color: #810606;padding: 10px 0px;border-top: 2px #FFF dashed;'>
                                                        <p style='width:530px;padding:5px 30px;margin: 5px 0 5px;text-align:center;font-family:Helvetica,Arial,Gadget,sans-serif;font-size: 17px;font-weight: 700;color:#FFF;'>¡Le recomendamos contactarse pronto con el cotizante, a través de sus datos de contacto !
                                                        </p>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                            </td></tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align='center'>
                        <table style='margin:0 auto' width='600' cellspacing='0' cellpadding='0'>
                          <tbody>
                            <tr>
                              <td style='padding:15px 0px 10px 0px' align='center'>
                                <p style='font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:11px;margin:0px;word-wrap:break-word;color:#FFF'>
                                    <span style='font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:11px;margin:0px;word-wrap:break-word;color:#FFF'> Cordialmente&nbsp; <br> <span style='color:#FFF'>Servicio al Cliente,</span>&nbsp; </span>
                                    <br>
                                    <a href='http://".$serverHost."/guia/' style='font-size:11.5px;color:#E03F3F;font-weight: 700;' target='_blank'>
                                        ".$serverHost."/guia/
                                    </a> 
                                    <br><br>
                                    <span style='padding-top:10px; font-size:12px;color:#FFF'>
                                        Copyright $year Axioma Comunicaciones Ltda. Todos Los Derechos Reservados.
                                    </span>
                                  </p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
";

return $formularioProveedorOro;
}
//////////////******************************////////////////////////////////////******************************//////////////////////
function formularioProveedor_bronce($Nombre,$Email,$Telefono,$Ciudad,$Observaciones,$Pagina,$Cliente,$ClienteTel,$EmailCliente,$show_information){
  	$year =date("Y");
  	$serverHost = $_SERVER['HTTP_HOST'];
	if(!preg_match('/www/', $_SERVER['HTTP_HOST'])) $serverHost = 'www.'.$serverHost;

    if(!$show_information){
      $Email = replaceValues($Email);
      $Telefono = replaceValues($Telefono);
      $Ciudad = replaceValues($Ciudad);
      $Observaciones= validateComment($Observaciones);
    }
    $email_message = "
    <div style='background-color:#111'>
        <table style='background-color:#111' width='100%' cellspacing='0' cellpadding='0' border='0' align='center'>
          <tbody>
            <tr>
              <td>
                <table style='margin:0 auto;background-color:#111' width='600' cellspacing='0' cellpadding='0' border='0' align='center'>
                  <tbody>
                    <tr>
                      <td align='center'>
                        <table style='background-color:#111' width='600' cellspacing='0' cellpadding='0' border='0'>
                          <tbody>
                            <tr>
                              <td align='center'>
                                <table style='width:600px;text-align:left;padding-top:0px;background-color:#111' cellspacing='0' cellpadding='0'>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <table cellspacing='0' cellpadding='0'>
                                          <tbody>
                                            <tr>
                                              <td>
                                                <table style='border-spacing:0px' width='600' cellspacing='0' cellpadding='0' border='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='line-height:0px;padding:20px 0px 10px 0px;' align='center'>
                                                        <a href='http://".$serverHost." style='color:inherit;text-decoration:none;vertical-align:middle' target='_blank'> <img src='http://".$serverHost."/files/desarrollo_axioma/fierros.png' alt='Revista Fierros' class='CToWUd'></a> <img src='http://".$serverHost."/files/desarrollo_axioma/transparent.png' alt='transparent' style='min-width:600px' class='CToWUd'> </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style='padding:0px'>
                                                <table width='590' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='vertical-align:top;' width='590'>
                                                        <a href='http://".$serverHost."/guia' target='_blank'> <img style='display:block;padding:0px' alt='Banner Mailing Image' src='http://".$serverHost."/files/desarrollo_axioma/banner-mailing.jpg' class='CToWUd a6T' tabindex='0' width='600' height='153' border='0'> </a>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>

                                            <tr style='background-color:#810606;'>
                                              <td>
                                                <table style='margin: 20px 0px 20px;' width='600' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td style='height:40px;padding:0px 20px 0px 20px' height='40' align='center'>
                                                        <a style='text-decoration:none;border-radius:5px;font-family:Helvetica,Arial,Gadget,sans-serif;padding:0px 10px;background-color:#222;color:#FFF; font-weight:bold;width:240px;float: right;' href='http://".$serverHost."/beneficios-oro' target='_blank'>  
                                                          <p style='width: 87%;float: left;color:#FFF;font-size: 14px'>CONOZCA LOS BENEFICIOS DE LA  MEMBRESÍA ORO</p>
                                                          <img src='http://".$serverHost."/files/desarrollo_axioma/tap.png' alt='arrow-oro' style='width: 13%;float: left;margin-top: 8%;'>
                                                        </a>
                                                      </td>
                                                      <td style='height:40px;padding:0px 20px 0px 20px' height='40' align='center'>
                                                        <a style='text-decoration:none;border-radius:5px;font-family:Helvetica,Arial,Gadget,sans-serif;padding:0px 10px;background-color:#222;color:#FFF; font-weight:bold;width:240px;float: left;' href='http://".$serverHost."/beneficios-oro?empresa=$Cliente&amp;mail=$EmailCliente&amp;tel=$ClienteTel#pago' target='_blank'>
                                                          <p style='width: 85%;float: left;color:#FFF;font-size: 14px'>OPTIMICE SU SITIO A <br> MEMBRESÍA ORO</p>
                                                          <img src='http://".$serverHost."/files/desarrollo_axioma/hand-arrow-top.png' alt='tap-oro' style='width: 15%;float: left;margin-top: 5%;'>
                                                        </a>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <table style='background-color:#FFF' width='600'>
                                                  <tbody>
                                                    <tr><td style='padding:30px 30px 0px 30px;vertical-align:top' align='left'>
                                                      <div style='word-wrap:break-word;width:100%'>
                                                        <div role='textbox'>
                                                          <p style='font-family:Helvetica;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color#111'>
                                                            <span style='color:#111;font-size:20px;padding-bottom:10px;font-style:italic;'>
                                                              <strong>Hola, $Cliente</strong>
                                                            </span>
                                                             <br>
                                                            <span style='color:#111;font-size:17px;'>
                                                              Recibimos una cotización para usted, adquirida a través de su
                                                              <a style='font-family:Helvetica;font-size:17px;' href='http://".$serverHost."/guia/$Pagina' target='_blank'>
                                                                Micrositio con Membresía Bronce.</a>
                                                            </span>
                                                          </p>
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr></tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <table style='background-color:#FFF' width='600' cellspacing='0' cellpadding='0'>
                                                  <tbody>
                                                    <tr>
                                                      <td>
                                                        <table cellspacing='0' cellpadding='0' border='0'>
                                                          <tbody>
                                                            <tr>
                                                              <td style='padding:15px 30px;vertical-align:top' width='600'>
                                                                <div style='word-wrap:break-word;'>
                                                                  <h1 style='display:block;font-size:20px;font-weight:bolder;line-height:120%;margin:0px 0px 12px;word-wrap:break-word;color:#555;font-family:Helvetica,Arial,Gadget,sans-serif;' role='textbox'>
                                                                  <em><b>Datos del cliente</b></em>
                                                                  </h1>
                                                                  <div style='font-family:Arial;font-size:14px;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color:#111' role='textbox'>
                                                                    <strong style='color:#111;'>Nombre:&nbsp;</strong>
                                                                    <span style='color:#111;'>$Nombre</span><br>

                                                                    <strong style='color:#111;'>E-mail:&nbsp;</strong>
                                                                    <a href='mailto:$Email' target='_blank'>$Email</a><br>

                                                                    <strong style='color:#111;'>Teléfono:&nbsp;</strong>
                                                                    <span style='color:#111;'>$Telefono</span><br>

                                                                    <strong style='color:#111;'>Ciudad:&nbsp;</strong>
                                                                    <span style='color:#111;'>$Ciudad</span><br>

                                                                    <strong style='color:#111;'>Comentarios:&nbsp;</strong>
                                                                    <span style='color:#111;'>$Observaciones</span><br>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td align='left'> </td>
                            </tr>
                            <tr>
                              <td align='left'> </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr style='background-color:#FFF'>
                      <td>
                        <table width='600' cellspacing='0' cellpadding='0'>
                          <tbody>
                            <tr>
                              
                            </tr>
                            <tr>
                              <td style='background-color: #810606;padding: 10px 0px;border-top: 2px #FFF dashed;'>
                                <p style='width:530px;padding:5px 30px;margin: 5px 0 5px;text-align:center;font-family:Helvetica,Arial,Gadget,sans-serif;font-size: 17px;font-weight: 700;color:#FFF;'>¡Si desea recibir la información completa de su cotización, adquiera una membresía oro 
                                <a href='http://".$serverHost."/beneficios-oro?empresa=$Cliente&amp;mail=$EmailCliente&amp;tel=$ClienteTel#pago' style='color: #F9FF00;' target='_blank'>aquí!</a>
                                </p>
                              </td>
                              
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align='center'>
                        <table style='margin:0 auto' width='600' cellspacing='0' cellpadding='0'>
                          <tbody>
                            <tr>
                              <td style='padding:15px 0px 10px 0px' align='center'>
                                  <p style='font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:11px;margin:0px;word-wrap:break-word;color:#FFF'>
                                    <span style='font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:11px;margin:0px;word-wrap:break-word;color:#FFF'> Cordialmente&nbsp; <br> Servicio al Cliente,&nbsp; </span>
                                    <br>
                                    <a href='http://".$serverHost."/guia/' style='font-size:11.5px;color:#E03F3F;font-weight: 700;' target='_blank'>
                                        ".$serverHost."/guia/
                                    </a> 
                                    <br><br>
                                    <span style='padding-top:10px; font-size:12px;color:#FFF'>
                                        Copyright $year Axioma Comunicaciones Ltda. Todos Los Derechos Reservados.
                                    </span>
                                  </p>
                                </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    ";
    return $email_message;
  }
//////////////******************************////////////////////////////////////******************************//////////////////////

function formularioClienteVendor($Nombre)	{

$formularioCliente="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

<html>

    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

        

        <!-- Facebook sharing information tags -->

        <meta property='og:title' content='*|MC:SUBJECT|*' />

        

        <title>*|MC:SUBJECT|*</title>

		<style type='text/css'>

			/* Client-specific Styles */

			#outlook a{padding:0;} /* Force Outlook to provide a 'view in browser' button. */

			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */

			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */



			/* Reset Styles */

			body{margin:0; padding:0;}

			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}

			table td{border-collapse:collapse;}

			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}



			/* Template Styles */



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Page

			* @section background color

			* @tip Set the background color for your email. You may want to choose one that matches your companys branding

			* @theme page

			*/

			body, #backgroundTable{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Page

			* @section email border

			* @tip Set the border for your email.

			*/

			#templateContainer{

				/*@editable*/ border: 1px solid #DDDDDD;

			}



			/**

			* @tab Page

			* @section heading 1

			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.

			* @style heading 1

			*/

			strong {

color: #5C5C5C;

}

			.h4-contactenos{

				font-family: Futura;

				color:#FE0002 !important;	

			}



			h1, .h1{

				/*@editable*/ color:#5C5C5C;

				display:block;

				/*@editable*/ 

			font-family: Futura;

				/*@editable*/ font-size:22px;

				/*@editable*/ 				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

				font-style:italic;

			}



			/**

			* @tab Page

			* @section heading 2

			* @tip Set the styling for all second-level headings in your emails.

			* @style heading 2

			*/

			h2, .h2{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:30px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 3

			* @tip Set the styling for all third-level headings in your emails.

			* @style heading 3

			*/

			h3, .h3{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:26px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 4

			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.

			* @style heading 4

			*/

			h4, .h4{

				

font-style:italic;				

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:22px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: PREHEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section preheader style

			* @tip Set the background color for your emails preheader area.

			* @theme page

			*/

			#templatePreheader{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Header

			* @section preheader text

			* @tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.

			*/

			.preheaderContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:100%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Header

			* @section preheader link

			* @tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.

			*/

			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section header style

			* @tip Set the background color and border for your emails header area.

			* @theme header

			*/

			#templateHeader{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-bottom:0;

			}



			/**

			* @tab Header

			* @section header text

			* @tip Set the styling for your emails header text. Choose a size and color that is easy to read.

			*/

			.headerContent{

				/*@editable*/ color:#202020;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:34px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				/*@editable*/ padding:0;

				/*@editable*/ text-align:center;

				/*@editable*/ vertical-align:middle;

			}

			#llamar{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			

			#email{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			/**

			* @tab Header

			* @section header link

			* @tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.

			*/

			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			#headerImage{

				height:auto;

				max-width:600px !important;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Body

			* @section body style

			* @tip Set the background color for your emails body area.

			*/

			#templateContainer, .bodyContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Body

			* @section body text

			* @tip Set the styling for your emails main content text. Choose a size and color that is easy to read.

			* @theme main

			*/

			.bodyContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Body

			* @section body link

			* @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.

			*/

			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.bodyContent img, .fullWidthBandContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: SIDEBAR /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Sidebar

			* @section sidebar style

			* @tip Set the background color and border for your emails sidebar area.

			*/

			#templateSidebar{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Sidebar

			* @section sidebar text

			* @tip Set the styling for your emails sidebar text. Choose a size and color that is easy to read.

			*/

			.sidebarContent div{

			/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Sidebar

			* @section sidebar link

			* @tip Set the styling for your emails sidebar links. Choose a color that helps them stand out from your text.

			*/

			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.sidebarContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COLUMNS; LEFT, RIGHT /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section left column link

			* @tip Set the styling for your emails left column links. Choose a color that helps them stand out from your text.

			*/

			.leftColumnContent div a:link, .leftColumnContent div a:visited, /* Yahoo! Mail Override */ .leftColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.leftColumnContent img{

				display:inline;

				height:auto;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section right column link

			* @tip Set the styling for your emails right column links. Choose a color that helps them stand out from your text.

			*/

			.rightColumnContent div a:link, .rightColumnContent div a:visited, /* Yahoo! Mail Override */ .rightColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.rightColumnContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Footer

			* @section footer style

			* @tip Set the background color and top border for your emails footer area.

			* @theme footer

			*/

			#templateFooter{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-top:0;

			}



			/**

			* @tab Footer

			* @section footer text

			* @tip Set the styling for your emails footer text. Choose a size and color that is easy to read.

			* @theme footer

			*/

			.footerContent div{

				/*@editable*/ color:#707070;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:125%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Footer

			* @section footer link

			* @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.

			*/

			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.footerContent img{

				display:inline;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			* @theme footer

			*/

			#social{

				/*@editable*/ background-color:#FAFAFA;

				/*@editable*/ border:0;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			*/

	.vinculo{

	color: #909090;

	font-weight:bold;

	

	}

	.vinculo-social a{

		color:#676767 !important;

font-weight:bold !important;

		font-size:16px;

		text-decoration:none !important;	

		

	}

	

.vinculo a{

	color: #D63432!important;	

			font-weight:bold;

			

			

}

#social div{

				/*@editable*/ text-align:center;

			}



			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			* @theme footer

			*/

			#utility{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border:0;

			}



			#utility div{

				 text-align:center;

			}



			#monkeyRewards img{

				max-width:190px;

			}

			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			*/

			

		</style>

	</head>

    <body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>

    	<center>

        

        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>

            	<tr>

                	<td align='center' valign='top'>

                        <!-- // Begin Template Preheader \\ -->

                        <table border='0' cellpadding='10' cellspacing='0' width='600' id='templatePreheader'>

                            <tr>

                                <td valign='top' class='preheaderContent'>

                                	

                                	<!-- // Begin Module: Standard Preheader \ -->

                                    <table border='0' cellpadding='10' cellspacing='0' width='100%'>

                                     </table>

                                	<!-- // End Module: Standard Preheader \ -->

                                

                                </td>

                            </tr>

                        </table>

                        <!-- // End Template Preheader \\ -->

                     <div>   

                    	<table border='0' cellpadding='0' cellspacing='0' width='636' id='templateContainer' style='border: 2px solid #999; padding:0px; margin:0px;'>

                        	<tr>

                            	<td width='600' align='center' valign='top'>

                                    <!-- // Begin Template Header \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateHeader'>

                                        <tr>

                                            <td class='headerContent'>

                                            

                                            	<!-- // Begin Module: Standard Header Image \\ -->

                                            	<img src='http://fierros.com.co/themes/guia/images/guia-fierros.jpg' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext width='100%'/>

                                            	<!-- // End Module: Standard Header Image \\ --></td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Header \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Body \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>

                                    	<tr>

                                       

                                        	<td valign='top' width='600'>

                                            	<table border='0' cellpadding='0' cellspacing='0' width='400'>

                                                    <tr>

                                                    	<td valign='top'>

                                                            <table border='0' cellpadding='0' cellspacing='0' width='600'>

                                                                <tr>

                                                                    <td valign='top' width='180' class='leftColumnContent'>

                                                                    

                                                                        <!-- // Begin Module: Top Image with Content \\ -->

                                                                        <table border='0'>

                                                                            <tr mc:repeatable>

                                                                                <td valign='middle'><div mc:edit='std_content00'>

				 	                    <br />                     <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

 line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'>Hola, $Nombre</h1>

                        <p class='vinculo' style='color: #000;font-size:16px;'>Sus datos han sido enviados a los anunciantes, según la selección realizada en 'Todo Para – Guía de Proveedores' de la Revista Fierros.<br />

   <br />

    <hr />

    <p class='vinculo' style='

	font-weight:bold; font-size:12px;'>¡Gracias por usar nuestros servicios!

    <br />

    <br />

    	Cordialmente

	<br />

		Servicio al Cliente,       <br /><a href='www.fierros.com.co/guia/'>www.fierros.com.co/guia/</a></p>

  

     <p class='vinculo' style='color: #909090;

	font-size:12px;'>

       <strong> Copyright 2015 

Axioma Comunicaciones Ltda. 

Todos Los Derechos Reservados. </strong></p>

            </div>

            

            

            

                        </td>         </tr>

</table>

<!-- // End Module: Top Image with Content \\ -->

                                                                        

                                                                    </td>

                                                                    

                                                                </tr>

                                                            </table>

                                                        </td>

                                                    </tr>

                                                </table>                                                

                                            </td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Body \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Footer \\ --><!-- // End Template Footer \\ -->

                                </td>

                            </tr>

                        </table>

                        </div>

                        <br />

                    </td>

                </tr>

            </table>

        </center>

    </body>

</html>";



	return $formularioCliente;

}







//////////////******************************////////////////////////////////////******************************//////////////////////



function formularioCliente($Nombre,$Cliente,$Pagina, $EmailCliente,$TelefonoCliente)	{
	$year =date("Y");
	$serverHost = $_SERVER['HTTP_HOST'];
	if(!preg_match('/www/', $_SERVER['HTTP_HOST'])) $serverHost = 'www.'.$serverHost;
	$formularioCliente="
		<body>
		    <div style='background-color:#111'>
		        <table style='background-color:#111' width='100%' cellspacing='0' cellpadding='0' border='0' align='center'>
		          <tbody>
		            <tr>
		              <td>
		                <table style='margin:0 auto;background-color:#111' width='600' cellspacing='0' cellpadding='0' border='0' align='center'>
		                  <tbody>
		                    <tr>
		                      <td align='center'>
		                        <table style='background-color:#111' width='600' cellspacing='0' cellpadding='0' border='0'>
		                          <tbody>
		                            <tr>
		                              <td align='center'>
		                                <table style='width:600px;text-align:left;padding-top:0px;background-color:#111' cellspacing='0' cellpadding='0'>
		                                  <tbody>
		                                    <tr>
		                                      <td>
		                                        <table cellspacing='0' cellpadding='0'>
		                                          <tbody>
		                                            <tr>
		                                              <td>
		                                                <table style='border-spacing:0px' width='600' cellspacing='0' cellpadding='0' border='0'>
		                                                  <tbody>
		                                                    <tr>
		                                                      <td style='line-height:0px;padding:20px 0px 10px 0px;' align='center'>
		                                                        <a href='http://".$serverHost."' style='color:inherit;text-decoration:none;vertical-align:middle' target='_blank'> <img src='http://".$serverHost."/files/desarrollo_axioma/fierros.png' alt='Revista Fierros' class='CToWUd'></a> <img src='http://".$serverHost."/files/desarrollo_axioma/transparent.png' alt='transparent' style='min-width:600px' class='CToWUd'> </td>
		                                                    </tr>
		                                                  </tbody>
		                                                </table>
		                                              </td>
		                                            </tr>
		                                            <tr>
		                                              <td style='padding:0px'>
		                                                <table width='590' cellspacing='0' cellpadding='0'>
		                                                  <tbody>
		                                                    <tr>
		                                                      <td style='vertical-align:top;' width='590'>
		                                                        <a href='http://".$serverHost."/guia' target='_blank'> <img style='display:block;padding:0px' alt='Banner Mailing Image' src='http://".$serverHost."/files/desarrollo_axioma/banner-mailing.jpg' class='CToWUd a6T' tabindex='0' width='600' height='153' border='0'> </a>
		                                                      </td>
		                                                    </tr>
		                                                  </tbody>
		                                                </table>
		                                              </td>
		                                            </tr>

		                                            <tr>
		                                              <td>
		                                                <table style='background-color:#FFF' width='600'>
		                                                  <tbody>
		                                                    <tr><td style='padding:30px 30px 0px 30px;vertical-align:top' align='left'>
		                                                      <div style='word-wrap:break-word;width:100%'>
		                                                        <div role='textbox'>
		                                                          <p style='font-family:Helvetica;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color#111'>
		                                                            <span style='color:#111;font-size:20px;padding-bottom:10px;font-style:italic;'>
		                                                              <strong>Hola, $Nombre</strong>
		                                                            </span>
		                                                             <br>
		                                                            <span style='color:#111;font-size:17px;'>
		                                                              Sus datos han sido enviados al anunciante del Micrositio en <br> <a href='http://".$serverHost."/guia' target='_blank'>Todo Para: Guía de Proveedores Fierros</a>: 
		                                                            </span>
		                                                          </p>
		                                                        </div>
		                                                      </div>
		                                                    </td>
		                                                  </tr></tbody>
		                                                </table>
		                                              </td>
		                                            </tr>
		                                            <tr>
		                                              <td>
		                                                <table style='background-color:#FFF' width='600' cellspacing='0' cellpadding='0'>
		                                                  <tbody>
		                                                    <tr>
		                                                      <td>
		                                                        <table cellspacing='0' cellpadding='0' border='0'>
		                                                          <tbody>
		                                                            <tr>
		                                                              <td style='padding:15px 30px;vertical-align:top' width='600'>
		                                                                <div style='word-wrap:break-word;'>
		                                                                  <h1 style='display:block;font-size:20px;font-weight:bolder;line-height:120%;margin:0px 0px 12px;word-wrap:break-word;color:#555;font-family:Helvetica,Arial,Gadget,sans-serif;' role='textbox'>
		                                                                  <em><b>Datos del Proveedor</b></em>
		                                                                  </h1>
		                                                                  <div style='font-family:Arial;font-size:14px;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color:#111' role='textbox'>
		                                                                    <strong style='color:#111;'>Nombre:&nbsp;</strong>
		                                                                    <span style='color:#111;'>$Cliente</span><br>

		                                                                    <strong style='color:#111;'>E-mail:&nbsp;</strong>
		                                                                    <a href='mailto:$Email' target='_blank'>$EmailCliente</a><br>

		                                                                    <strong style='color:#111;'>Teléfono:&nbsp;</strong>
		                                                                    <span style='color:#111;'>$TelefonoCliente</span><br>

		                                                                  </div>
		                                                                </div>
		                                                              </td>
		                                                            </tr>
		                                                          </tbody>
		                                                        </table>
		                                                      </td>
		                                                    </tr>
		                                                  </tbody>
		                                                </table>
		                                              </td>
		                                            </tr>
		                                          </tbody>
		                                        </table>
		                                      </td>
		                                    </tr>
		                                  </tbody>
		                                </table>
		                              </td>
		                            </tr>
		                            <tr>
		                              <td align='left'> </td>
		                            </tr>
		                            <tr>
		                              <td align='left'> </td>
		                            </tr>
		                          </tbody>
		                        </table>
		                      </td>
		                    </tr>
		                    <tr style='background-color:#FFF'>
		                      <td>
		                        <table width='600' cellspacing='0' cellpadding='0'>
		                          <tbody>
		                            <tr>
		                              <td style='background-color: #810606;padding: 10px 0px;border-top: 2px #FFF dashed;'>
		                                <p style='width:530px;padding:5px 30px;margin: 5px 0 5px;text-align:center;font-family:Helvetica,Arial,Gadget,sans-serif;font-size: 17px;font-weight: 700;color:#FFF;'>
		                                  <a href='http://".$serverHost."/guia' target='_blank' style='font-size: 16px;color:#FFF;font-weight: 600;/*! text-transform: uppercase; */text-decoration: none;'>Todo Para: Guía de Proveedores Fierros</a>
		                                </p>
		                                <p style='width:530px;padding:5px 30px;margin: 0px 0 5px;text-align:center;font-family:Helvetica,Arial,Gadget,sans-serif;font-size: 15px;font-weight: 700;color:#FFF;'>¡Gracias por usar nuestros servicios! </p>
		                              </td>
		                            </tr>
		                          </tbody>
		                        </table>
		                      </td>
		                    </tr>
		                    <tr>
		                      <td align='center'>
		                        <table style='margin:0 auto' width='600' cellspacing='0' cellpadding='0'>
		                          <tbody>
		                            <tr>
		                              <td style='padding:15px 0px 10px 0px' align='center'>
		                                  <p style='font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:11px;margin:0px;word-wrap:break-word;color:#FFF'>
		                                    <span style='font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:11px;margin:0px;word-wrap:break-word;color:#FFF'> Cordialmente&nbsp; <br> <span style='color:#FFF'>Servicio al Cliente,</span>&nbsp; </span>
		                                    <br>
		                                    <a href='http://".$serverHost."/guia/' style='font-size:11.5px;color:#DAAA1B;font-weight: 700;' target='_blank'>
		                                        ".$serverHost."/guia/
		                                    </a> 
		                                    <br><br>
		                                    <span style='padding-top:10px; font-size:12px;color:#FFF'>
		                                        Copyright $year Axioma Comunicaciones Ltda. Todos Los Derechos Reservados.
		                                    </span>
		                                  </p>
		                                </td>
		                            </tr>
		                          </tbody>
		                        </table>
		                      </td>
		                    </tr>
		                  </tbody>
		                </table>
		              </td>
		            </tr>
		          </tbody>
		        </table>
		    </div>
	    </body>
	";

	return $formularioCliente;
}



//////////////******************************////////////////////////////////////******************************//////////////////////

function formularioCliente_infoRestringida($Nombre,$Cliente,$Pagina, $TelefonoCliente, $WebCliente, $Categoria,$Categoria_url = ''){
	$year =date("Y");
	$serverHost = $_SERVER['HTTP_HOST'];
	if(!preg_match('/www/', $_SERVER['HTTP_HOST'])) $serverHost = 'www.'.$serverHost;

	$WebCliente = $WebCliente != '' ? $WebCliente : 'N/A';
	$TelefonoCliente = $TelefonoCliente != '' ? $TelefonoCliente : 'N/A';

	$formularioCliente ="
		<body>
		    <div style='background-color:#111'>
		        <table style='background-color:#111' width='100%' cellspacing='0' cellpadding='0' border='0' align='center'>
		          <tbody>
		            <tr>
		              <td>
		                <table style='margin:0 auto;background-color:#111' width='600' cellspacing='0' cellpadding='0' border='0' align='center'>
		                  <tbody>
		                    <tr>
		                      <td align='center'>
		                        <table style='background-color:#111' width='600' cellspacing='0' cellpadding='0' border='0'>
		                          <tbody>
		                            <tr>
		                              <td align='center'>
		                                <table style='width:600px;text-align:left;padding-top:0px;background-color:#111' cellspacing='0' cellpadding='0'>
		                                  <tbody>
		                                    <tr>
		                                      <td>
		                                        <table cellspacing='0' cellpadding='0'>
		                                          <tbody>
		                                            <tr>
		                                              <td>
		                                                <table style='border-spacing:0px' width='600' cellspacing='0' cellpadding='0' border='0'>
		                                                  <tbody>
		                                                    <tr>
		                                                      <td style='line-height:0px;padding:20px 0px 10px 0px;' align='center'>
		                                                        <a href='http://".$serverHost."' style='color:inherit;text-decoration:none;vertical-align:middle' target='_blank'> <img src='http://".$serverHost."/files/desarrollo_axioma/fierros.png' alt='Revista Fierros' class='CToWUd'></a> <img src='http://".$serverHost."/files/desarrollo_axioma/transparent.png' alt='transparent' style='min-width:600px' class='CToWUd'> </td>
		                                                    </tr>
		                                                  </tbody>
		                                                </table>
		                                              </td>
		                                            </tr>
		                                            <tr>
		                                              <td style='padding:0px'>
		                                                <table width='590' cellspacing='0' cellpadding='0'>
		                                                  <tbody>
		                                                    <tr>
		                                                      <td style='vertical-align:top;' width='590'>
		                                                        <a href='http://".$serverHost."/guia' target='_blank'> <img style='display:block;padding:0px' alt='Banner Mailing Image' src='http://".$serverHost."/files/desarrollo_axioma/banner-mailing.jpg' class='CToWUd a6T' tabindex='0' width='600' height='153' border='0'> </a>
		                                                      </td>
		                                                    </tr>
		                                                  </tbody>
		                                                </table>
		                                              </td>
		                                            </tr>

		                                            <tr>
		                                              <td>
		                                                <table style='background-color:#FFF' width='600'>
		                                                  <tbody>
		                                                    <tr><td style='padding:30px 30px 0px 30px;vertical-align:top' align='left'>
		                                                      <div style='word-wrap:break-word;width:100%'>
		                                                        <div role='textbox'>
		                                                          <p style='font-family:Helvetica;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color#111'>
		                                                            <span style='color:#111;font-size:20px;padding-bottom:10px;font-style:italic;'>
		                                                              <strong>Hola, $Nombre</strong>
		                                                            </span>
		                                                             <br>
		                                                            <p style='font-family:Helvetica;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color#111'>
		                                                                <span style='color:#111;font-size:17px;'>
				                                                          Le informamos que el proveedor <a href='".$serverHost."/guia/$Pagina'>$Cliente</a> no ha recibido su cotización, puesto que no cuenta con este servicio, sin embargo, esta ha sido enviada a los proveedores destacados dentro de la categoría <a href='http://".$serverHost."/guia/category/$Categoria_url'>$Categoria</a>. 
				                                                        </span>
		                                                              </p>
		                                                              <p style='font-family:Helvetica;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color#111'>
		                                                                <span style='color:#111;font-size:17px;'>
		                                                                   Si desea realizar la cotización con <a href='".$serverHost."/guia/$Pagina'>$Cliente</a>, intente realizándola a través de servicio de teléfono o página web.
		                                                                </span>
		                                                              </p>
		                                                          </p>
		                                                        </div>
		                                                      </div>
		                                                    </td>
		                                                  </tr></tbody>
		                                                </table>
		                                              </td>
		                                            </tr>
		                                            <tr>
		                                              <td>
		                                                <table style='background-color:#FFF' width='600' cellspacing='0' cellpadding='0'>
		                                                  <tbody>
		                                                    <tr>
		                                                      <td>
		                                                        <table cellspacing='0' cellpadding='0' border='0'>
		                                                          <tbody>
		                                                            <tr>
		                                                              <td style='padding:15px 30px;vertical-align:top' width='600'>
		                                                                <div style='word-wrap:break-word;'>
		                                                                  <h1 style='display:block;font-size:20px;font-weight:bolder;line-height:120%;margin:0px 0px 12px;word-wrap:break-word;color:#555;font-family:Helvetica,Arial,Gadget,sans-serif;' role='textbox'>
		                                                                  <em><b>Datos del Proveedor</b></em>
		                                                                  </h1>
		                                                                  <div style='font-family:Arial;font-size:14px;line-height:160%;margin:0px 0px 12px;word-wrap:break-word;color:#111' role='textbox'>
		                                                                        <strong style='color:#111;'>Nombre:&nbsp;</strong>
		                                                                        <span style='color:#111;'>$Cliente</span><br>

		                                                                        <strong style='color:#111;'>Teléfono:&nbsp;</strong>
		                                                                        <span style='color:#111;'>$TelefonoCliente</span><br>

		                                                                        <strong style='color:#111;'>Web:&nbsp;</strong>
		                                                                        <span style='color:#111;'>$WebCliente</span><br>
		                                                                      </div>
		                                                                </div>
		                                                              </td>
		                                                            </tr>
		                                                          </tbody>
		                                                        </table>
		                                                      </td>
		                                                    </tr>
		                                                  </tbody>
		                                                </table>
		                                              </td>
		                                            </tr>
		                                          </tbody>
		                                        </table>
		                                      </td>
		                                    </tr>
		                                  </tbody>
		                                </table>
		                              </td>
		                            </tr>
		                            <tr>
		                              <td align='left'> </td>
		                            </tr>
		                            <tr>
		                              <td align='left'> </td>
		                            </tr>
		                          </tbody>
		                        </table>
		                      </td>
		                    </tr>
		                    <tr style='background-color:#FFF'>
		                      <td>
		                        <table width='600' cellspacing='0' cellpadding='0'>
		                          <tbody>
		                            <tr>
		                              <td style='background-color: #810606;padding: 10px 0px;border-top: 2px #FFF dashed;'>
		                                <p style='width:530px;padding:5px 30px;margin: 5px 0 5px;text-align:center;font-family:Helvetica,Arial,Gadget,sans-serif;font-size: 17px;font-weight: 700;color:#FFF;'>
		                                  <a href='http://".$serverHost."/guia' target='_blank' style='font-size: 16px;color:#FFF;font-weight: 600;/*! text-transform: uppercase; */text-decoration: none;'>Todo Para: Guía de Proveedores Fierros</a>
		                                </p>
		                                <p style='width:530px;padding:5px 30px;margin: 0px 0 5px;text-align:center;font-family:Helvetica,Arial,Gadget,sans-serif;font-size: 15px;font-weight: 700;color:#FFF;'>¡Gracias por usar nuestros servicios! </p>
		                              </td>
		                            </tr>
		                          </tbody>
		                        </table>
		                      </td>
		                    </tr>
		                    <tr>
		                      <td align='center'>
		                        <table style='margin:0 auto' width='600' cellspacing='0' cellpadding='0'>
		                          <tbody>
		                            <tr>
		                              <td style='padding:15px 0px 10px 0px' align='center'>
		                                  <p style='font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:11px;margin:0px;word-wrap:break-word;color:#FFF'>
		                                    <span style='font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:11px;margin:0px;word-wrap:break-word;color:#FFF'> Cordialmente&nbsp; <br> <span style='color:#FFF'>Servicio al Cliente,</span>&nbsp; </span>
		                                    <br>
		                                    <a href='http://".$serverHost."/guia/' style='font-size:11.5px;color:#DAAA1B;font-weight: 700;' target='_blank'>
		                                        ".$serverHost."/guia/
		                                    </a> 
		                                    <br><br>
		                                    <span style='padding-top:10px; font-size:12px;color:#FFF'>
		                                        Copyright $year Axioma Comunicaciones Ltda. Todos Los Derechos Reservados.
		                                    </span>
		                                  </p>
		                                </td>
		                            </tr>
		                          </tbody>
		                        </table>
		                      </td>
		                    </tr>
		                  </tbody>
		                </table>
		              </td>
		            </tr>
		          </tbody>
		        </table>
		    </div>
	    </body>
	";
	return $formularioCliente;
}
//////////////******

function formContactIAlimentos($Nombre,$Email,$Telefono,$Observaciones,$Subject){

	$formHomeIalimentos="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

<html>

    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

        

        <!-- Facebook sharing information tags -->

        <meta property='og:title' content='*|MC:SUBJECT|*' />

        

        <title>*|MC:SUBJECT|*</title>

		<style type='text/css'>

			/* Client-specific Styles */

			#outlook a{padding:0;} /* Force Outlook to provide a 'view in browser' button. */

			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */

			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */



			/* Reset Styles */

			body{margin:0; padding:0;}

			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}

			table td{border-collapse:collapse;}

			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}



			/* Template Styles */



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Page

			* @section background color

			* @tip Set the background color for your email. You may want to choose one that matches your companys branding

			* @theme page

			*/

			body, #backgroundTable{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Page

			* @section email border

			* @tip Set the border for your email.

			*/

			#templateContainer{

				/*@editable*/ border: 1px solid #DDDDDD;

			}



			/**

			* @tab Page

			* @section heading 1

			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.

			* @style heading 1

			*/

			strong {

color: #5C5C5C;

}

			.h4-contactenos{

				font-family: Futura;

				color:#FE0002 !important;	

			}



			h1, .h1{

				/*@editable*/ color:#5C5C5C;

				display:block;

				/*@editable*/ 

			font-family: Futura;

				/*@editable*/ font-size:22px;

				/*@editable*/ 				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

				font-style:italic;

			}



			/**

			* @tab Page

			* @section heading 2

			* @tip Set the styling for all second-level headings in your emails.

			* @style heading 2

			*/

			h2, .h2{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:30px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 3

			* @tip Set the styling for all third-level headings in your emails.

			* @style heading 3

			*/

			h3, .h3{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:26px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 4

			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.

			* @style heading 4

			*/

			h4, .h4{

				

font-style:italic;				

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:22px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: PREHEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section preheader style

			* @tip Set the background color for your emails preheader area.

			* @theme page

			*/

			#templatePreheader{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Header

			* @section preheader text

			* @tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.

			*/

			.preheaderContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:100%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Header

			* @section preheader link

			* @tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.

			*/

			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section header style

			* @tip Set the background color and border for your emails header area.

			* @theme header

			*/

			#templateHeader{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-bottom:0;

			}



			/**

			* @tab Header

			* @section header text

			* @tip Set the styling for your emails header text. Choose a size and color that is easy to read.

			*/

			.headerContent{

				/*@editable*/ color:#202020;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:34px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				/*@editable*/ padding:0;

				/*@editable*/ text-align:center;

				/*@editable*/ vertical-align:middle;

			}

			#llamar{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			

			#email{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			/**

			* @tab Header

			* @section header link

			* @tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.

			*/

			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			#headerImage{

				height:auto;

				max-width:600px !important;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Body

			* @section body style

			* @tip Set the background color for your emails body area.

			*/

			#templateContainer, .bodyContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Body

			* @section body text

			* @tip Set the styling for your emails main content text. Choose a size and color that is easy to read.

			* @theme main

			*/

			.bodyContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Body

			* @section body link

			* @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.

			*/

			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.bodyContent img, .fullWidthBandContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: SIDEBAR /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Sidebar

			* @section sidebar style

			* @tip Set the background color and border for your emails sidebar area.

			*/

			#templateSidebar{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Sidebar

			* @section sidebar text

			* @tip Set the styling for your emails sidebar text. Choose a size and color that is easy to read.

			*/

			.sidebarContent div{

			/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Sidebar

			* @section sidebar link

			* @tip Set the styling for your emails sidebar links. Choose a color that helps them stand out from your text.

			*/

			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.sidebarContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COLUMNS; LEFT, RIGHT /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section left column link

			* @tip Set the styling for your emails left column links. Choose a color that helps them stand out from your text.

			*/

			.leftColumnContent div a:link, .leftColumnContent div a:visited, /* Yahoo! Mail Override */ .leftColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.leftColumnContent img{

				display:inline;

				height:auto;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section right column link

			* @tip Set the styling for your emails right column links. Choose a color that helps them stand out from your text.

			*/

			.rightColumnContent div a:link, .rightColumnContent div a:visited, /* Yahoo! Mail Override */ .rightColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.rightColumnContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Footer

			* @section footer style

			* @tip Set the background color and top border for your emails footer area.

			* @theme footer

			*/

			#templateFooter{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-top:0;

			}



			/**

			* @tab Footer

			* @section footer text

			* @tip Set the styling for your emails footer text. Choose a size and color that is easy to read.

			* @theme footer

			*/

			.footerContent div{

				/*@editable*/ color:#707070;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:125%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Footer

			* @section footer link

			* @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.

			*/

			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.footerContent img{

				display:inline;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			* @theme footer

			*/

			#social{

				/*@editable*/ background-color:#FAFAFA;

				/*@editable*/ border:0;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			*/

	.vinculo{

	color: #909090;

	font-weight:bold;

	

	}

	.vinculo-social a{

		color:#676767 !important;

font-weight:bold !important;

		font-size:16px;

		text-decoration:none !important;	

		

	}

	

.vinculo a{

	color: #D63432!important;	

			font-weight:bold;

			

			

}

#social div{

				/*@editable*/ text-align:center;

			}



			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			* @theme footer

			*/

			#utility{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border:0;

			}



			#utility div{

				 text-align:center;

			}



			#monkeyRewards img{

				max-width:190px;

			}

			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			*/

			

		</style>

	</head>

    <body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>

    	<center>

        

        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>

            	<tr>

                	<td align='center' valign='top'>

                        <!-- // Begin Template Preheader \\ -->

                        <table border='0' cellpadding='10' cellspacing='0' width='600' id='templatePreheader'>

                            <tr>

                                <td valign='top' class='preheaderContent'>

                                	

                                	<!-- // Begin Module: Standard Preheader \ -->

                                    <table border='0' cellpadding='10' cellspacing='0' width='100%'>

                                     </table>

                                	<!-- // End Module: Standard Preheader \ -->

                                

                                </td>

                            </tr>

                        </table>

                        <!-- // End Template Preheader \\ -->

                     <div>   

                    	<table border='0' cellpadding='0' cellspacing='0' width='636' id='templateContainer' style='border: 2px solid #999; padding:0px; margin:0px;'>

                        	<tr>

                            	<td width='600' align='center' valign='top'>

                                    <!-- // Begin Template Header \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateHeader'>

                                        <tr>

                                            <td class='headerContent'>

                                            

                                            	<!-- // Begin Module: Standard Header Image \\ -->

                                            	<img src='http://fierros.com.co/themes/ediciones/images/contactenos.jpg' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext width='100%'/>

                                            	<!-- // End Module: Standard Header Image \\ --></td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Header \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Body \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>

                                    	<tr>

                                       

                                        	<td valign='top' width='600'>

                                            	<table border='0' cellpadding='0' cellspacing='0' width='400'>

                                                    <tr>

                                                    	<td valign='top'>

                                                            <table border='0' cellpadding='0' cellspacing='0' width='600'>

                                                                <tr>

                                                                    <td valign='top' width='180' class='leftColumnContent'>

                                                                    

                                                                        <!-- // Begin Module: Top Image with Content \\ -->

                                                                        <table border='0'>

                                                                            <tr mc:repeatable>

                                                                                <td valign='middle'><div mc:edit='std_content00'>

				 	                    <br />                     <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

 line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'>Contacto Cliente</h1>

                <h2 style='color:#333333;

				display:block;

				font-family:Futura;

                font-size:18px;

 				line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'></h2>

                        <p class='vinculo' style='color: #000;

	 font-size:16px;'>Nuevo mensaje de <span class='vinculo' style='color: #000;

	 font-size:16px;'> <strong>&quot;Revista Fierros - La Comunidad #1 para Ferreteros en Colombia&quot;</strong></span>.</p>

      

            <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

                line-height:100%;

				margin-top:30px !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic; font-size:22px;'>Datos del mensaje enviado</h1>                       <div style='font-size:14px;'><strong>Nombre:</strong> &nbsp; $Nombre

       </div>

 <div style='

	 font-size:14px;''>

<strong>Email:</strong> &nbsp; $Email <br />

 </div>

<div style='

	font-size:14px;'><strong>Tel&eacute;fono:</strong>  &nbsp; $Telefono

    </div>


    <div style='

	font-size:14px;'><strong>Dirigido a:</strong>  &nbsp;$Subject

    </div>

    <div style='

	font-size:14px;'><strong>Descripción:</strong>  &nbsp;$Observaciones

    </div>

    </p>

    <br />



    <hr />

    <p class='vinculo' style='

	font-weight:bold; font-size:12px;'><a href='www.fierros.com.co/'>¡ Visite Revista Fierros - La Comunidad #1 para Ferreteros en Colombia  !</a>

    <br />

    <br />

    	Cordialmente

	<br />

		Servicio al Cliente,       <br /><a href='www.fierros.com.co/guia/'>www.fierros.com.co</a></p>

  

     <p class='vinculo' style='color: #909090;

	font-size:12px;'>

       <strong> Copyright 2015 

Axioma Comunicaciones Ltda. 

Todos Los Derechos Reservados. </strong></p>

            </div>

            

            

            

                        </td>         </tr>

</table>

<!-- // End Module: Top Image with Content \\ -->

                                                                        

                                                                    </td>

                                                                    

                                                                </tr>

                                                            </table>

                                                        </td>

                                                    </tr>

                                                </table>                                                

                                            </td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Body \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Footer \\ --><!-- // End Template Footer \\ -->

                                </td>

                            </tr>

                        </table>

                        </div>

                        <br />

                    </td>

                </tr>

            </table>

        </center>

    </body>

</html>";

	return $formHomeIalimentos;

}



//////////////******************************////////////////////////////////////******************************//////////////////////



function formContactIAlimentosCliente($Nombre,$Email,$Telefono,$Observaciones,$Subject){

	$formularioCliente="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

<html>

    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

        

        <!-- Facebook sharing information tags -->

        <meta property='og:title' content='*|MC:SUBJECT|*' />

        

        <title>*|MC:SUBJECT|*</title>

		<style type='text/css'>

			/* Client-specific Styles */

			#outlook a{padding:0;} /* Force Outlook to provide a 'view in browser' button. */

			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */

			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */



			/* Reset Styles */

			body{margin:0; padding:0;}

			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}

			table td{border-collapse:collapse;}

			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}



			/* Template Styles */



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Page

			* @section background color

			* @tip Set the background color for your email. You may want to choose one that matches your companys branding

			* @theme page

			*/

			body, #backgroundTable{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Page

			* @section email border

			* @tip Set the border for your email.

			*/

			#templateContainer{

				/*@editable*/ border: 1px solid #DDDDDD;

			}



			/**

			* @tab Page

			* @section heading 1

			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.

			* @style heading 1

			*/

			strong {

color: #5C5C5C;

}

			.h4-contactenos{

				font-family: Futura;

				color:#FE0002 !important;	

			}



			h1, .h1{

				/*@editable*/ color:#5C5C5C;

				display:block;

				/*@editable*/ 

			font-family: Futura;

				/*@editable*/ font-size:22px;

				/*@editable*/ 				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

				font-style:italic;

			}



			/**

			* @tab Page

			* @section heading 2

			* @tip Set the styling for all second-level headings in your emails.

			* @style heading 2

			*/

			h2, .h2{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:30px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 3

			* @tip Set the styling for all third-level headings in your emails.

			* @style heading 3

			*/

			h3, .h3{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:26px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 4

			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.

			* @style heading 4

			*/

			h4, .h4{

				

font-style:italic;				

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:22px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: PREHEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section preheader style

			* @tip Set the background color for your emails preheader area.

			* @theme page

			*/

			#templatePreheader{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Header

			* @section preheader text

			* @tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.

			*/

			.preheaderContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:100%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Header

			* @section preheader link

			* @tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.

			*/

			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section header style

			* @tip Set the background color and border for your emails header area.

			* @theme header

			*/

			#templateHeader{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-bottom:0;

			}



			/**

			* @tab Header

			* @section header text

			* @tip Set the styling for your emails header text. Choose a size and color that is easy to read.

			*/

			.headerContent{

				/*@editable*/ color:#202020;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:34px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				/*@editable*/ padding:0;

				/*@editable*/ text-align:center;

				/*@editable*/ vertical-align:middle;

			}

			#llamar{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			

			#email{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			/**

			* @tab Header

			* @section header link

			* @tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.

			*/

			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			#headerImage{

				height:auto;

				max-width:600px !important;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Body

			* @section body style

			* @tip Set the background color for your emails body area.

			*/

			#templateContainer, .bodyContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Body

			* @section body text

			* @tip Set the styling for your emails main content text. Choose a size and color that is easy to read.

			* @theme main

			*/

			.bodyContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Body

			* @section body link

			* @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.

			*/

			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.bodyContent img, .fullWidthBandContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: SIDEBAR /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Sidebar

			* @section sidebar style

			* @tip Set the background color and border for your emails sidebar area.

			*/

			#templateSidebar{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Sidebar

			* @section sidebar text

			* @tip Set the styling for your emails sidebar text. Choose a size and color that is easy to read.

			*/

			.sidebarContent div{

			/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Sidebar

			* @section sidebar link

			* @tip Set the styling for your emails sidebar links. Choose a color that helps them stand out from your text.

			*/

			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;


				/*@editable*/ text-decoration:underline;

			}



			.sidebarContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COLUMNS; LEFT, RIGHT /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section left column link

			* @tip Set the styling for your emails left column links. Choose a color that helps them stand out from your text.

			*/

			.leftColumnContent div a:link, .leftColumnContent div a:visited, /* Yahoo! Mail Override */ .leftColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.leftColumnContent img{

				display:inline;

				height:auto;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section right column link

			* @tip Set the styling for your emails right column links. Choose a color that helps them stand out from your text.

			*/

			.rightColumnContent div a:link, .rightColumnContent div a:visited, /* Yahoo! Mail Override */ .rightColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.rightColumnContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Footer

			* @section footer style

			* @tip Set the background color and top border for your emails footer area.

			* @theme footer

			*/

			#templateFooter{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-top:0;

			}



			/**

			* @tab Footer

			* @section footer text

			* @tip Set the styling for your emails footer text. Choose a size and color that is easy to read.

			* @theme footer

			*/

			.footerContent div{

				/*@editable*/ color:#707070;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:125%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Footer

			* @section footer link

			* @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.

			*/

			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}




			.footerContent img{

				display:inline;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			* @theme footer

			*/

			#social{

				/*@editable*/ background-color:#FAFAFA;

				/*@editable*/ border:0;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			*/

	.vinculo{

	color: #909090;

	font-weight:bold;

	

	}

	.vinculo-social a{

		color:#676767 !important;

font-weight:bold !important;

		font-size:16px;

		text-decoration:none !important;	

		

	}

	

.vinculo a{

	color: #D63432!important;	

			font-weight:bold;

			

			

}

#social div{

				/*@editable*/ text-align:center;

			}



			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			* @theme footer

			*/

			#utility{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border:0;

			}



			#utility div{

				 text-align:center;

			}



			#monkeyRewards img{

				max-width:190px;

			}

			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			*/

			

		</style>

	</head>

    <body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>

    	<center>

        

        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>

            	<tr>

                	<td align='center' valign='top'>

                        <!-- // Begin Template Preheader \\ -->

                        <table border='0' cellpadding='10' cellspacing='0' width='600' id='templatePreheader'>

                            <tr>

                                <td valign='top' class='preheaderContent'>

                                	

                                	<!-- // Begin Module: Standard Preheader \ -->

                                    <table border='0' cellpadding='10' cellspacing='0' width='100%'>

                                     </table>

                                	<!-- // End Module: Standard Preheader \ -->

                                

                                </td>

                            </tr>

                        </table>

                        <!-- // End Template Preheader \\ -->

                     <div>   

                    	<table border='0' cellpadding='0' cellspacing='0' width='636' id='templateContainer' style='border: 2px solid #999; padding:0px; margin:0px;'>

                        	<tr>

                            	<td width='600' align='center' valign='top'>

                                    <!-- // Begin Template Header \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateHeader'>

                                        <tr>

                                            <td class='headerContent'>

                                            

                                            	<!-- // Begin Module: Standard Header Image \\ -->

                                            	<img src='http://fierros.com.co/themes/ediciones/images/contactenos.jpg' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext width='100%'/>

                                            	<!-- // End Module: Standard Header Image \\ --></td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Header \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Body \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>

                                    	<tr>

                                       

                                        	<td valign='top' width='600'>

                                            	<table border='0' cellpadding='0' cellspacing='0' width='400'>

                                                    <tr>

                                                    	<td valign='top'>

                                                            <table border='0' cellpadding='0' cellspacing='0' width='600'>

                                                                <tr>

                                                                    <td valign='top' width='180' class='leftColumnContent'>

                                                                    

                                                                        <!-- // Begin Module: Top Image with Content \\ -->

                                                                        <table border='0'>

                                                                            <tr mc:repeatable>

                                                                                <td valign='middle'><div mc:edit='std_content00'>

				 	                    <br />                     <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

 line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'>Sr (a) $Nombre</h1>

                <h2 style='color:#333333;

				display:block;

				font-family:Futura;

                font-size:18px;

 				line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'></h2>

                        <p class='vinculo' style='color: #000;

	 font-size:16px;'>Este es un email de confirmación de contacto con<span class='vinculo' style='color: #000;

	 font-size:16px;'> <strong>&quot;Revista Fierros - La Comunidad #1 para Ferreteros en Colombia&quot;</strong></span>.</p>

      

            <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

                line-height:100%;

				margin-top:30px !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic; font-size:22px;'>Datos del mensaje enviado</h1>                       <div style='font-size:14px;'><strong>Nombre:</strong> &nbsp; $Nombre

       </div>

 <div style='

	 font-size:14px;''>

<strong>Email:</strong> &nbsp; $Email <br />

 </div>

<div style='

	font-size:14px;'><strong>Tel&eacute;fono:</strong>  &nbsp; $Telefono

    </div>

    <div style='

	font-size:14px;'><strong>Dirigido a:</strong>  &nbsp;$Subject

    </div>

    <div style='

	font-size:14px;'><strong>Descripción:</strong>  &nbsp;$Observaciones

    </div>

    </p>

    <br />



    <hr />

    <p class='vinculo' style='

	font-weight:bold; font-size:12px;'><a href='www.fierros.com.co/'>¡ Visite Revista Fierros - La Comunidad #1 para Ferreteros en Colombia  !</a>

    <br />

    <br />

    	Cordialmente

	<br />

		Servicio al Cliente,       <br /><a href='www.fierros.com.co/guia/'>www.fierros.com.co</a></p>

  

     <p class='vinculo' style='color: #909090;

	font-size:12px;'>

       <strong> Copyright 2015 

Axioma Comunicaciones Ltda. 

Todos Los Derechos Reservados. </strong></p>

            </div>

            

            

            

                        </td>         </tr>

</table>

<!-- // End Module: Top Image with Content \\ -->

                                                                        

                                                                    </td>

                                                                    

                                                                </tr>

                                                            </table>

                                                        </td>

                                                    </tr>

                                                </table>                                                

                                            </td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Body \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Footer \\ --><!-- // End Template Footer \\ -->

                                </td>

                            </tr>

                        </table>

                        </div>

                        <br />

                    </td>

                </tr>

            </table>

        </center>

    </body>

</html>";

	return $formularioCliente;

}















//////////////******************************////////////////////////////////////******************************//////////////////////suscripciones



function formSuscriptionIAlimentos($Nombre,$Telefono,$Email,$Ciudad,$Comments){

	$formHomeIalimentos="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

<html>

    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

        

        <!-- Facebook sharing information tags -->

        <meta property='og:title' content='*|MC:SUBJECT|*' />

        

        <title>*|MC:SUBJECT|*</title>

		<style type='text/css'>

			/* Client-specific Styles */

			#outlook a{padding:0;} /* Force Outlook to provide a 'view in browser' button. */

			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */

			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */



			/* Reset Styles */

			body{margin:0; padding:0;}

			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}

			table td{border-collapse:collapse;}

			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}



			/* Template Styles */



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Page

			* @section background color

			* @tip Set the background color for your email. You may want to choose one that matches your companys branding

			* @theme page

			*/

			body, #backgroundTable{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Page

			* @section email border

			* @tip Set the border for your email.

			*/

			#templateContainer{

				/*@editable*/ border: 1px solid #DDDDDD;

			}



			/**

			* @tab Page

			* @section heading 1

			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.

			* @style heading 1

			*/

			strong {

color: #5C5C5C;

}

			.h4-contactenos{

				font-family: Futura;

				color:#FE0002 !important;	

			}



			h1, .h1{

				/*@editable*/ color:#5C5C5C;

				display:block;

				/*@editable*/ 

			font-family: Futura;

				/*@editable*/ font-size:22px;

				/*@editable*/ 				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

				font-style:italic;

			}



			/**

			* @tab Page

			* @section heading 2

			* @tip Set the styling for all second-level headings in your emails.

			* @style heading 2

			*/

			h2, .h2{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:30px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 3

			* @tip Set the styling for all third-level headings in your emails.

			* @style heading 3

			*/

			h3, .h3{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:26px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 4

			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.

			* @style heading 4

			*/

			h4, .h4{

				

font-style:italic;				

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:22px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: PREHEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section preheader style

			* @tip Set the background color for your emails preheader area.

			* @theme page

			*/

			#templatePreheader{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Header

			* @section preheader text

			* @tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.

			*/

			.preheaderContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:100%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Header

			* @section preheader link

			* @tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.

			*/

			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section header style

			* @tip Set the background color and border for your emails header area.

			* @theme header

			*/

			#templateHeader{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-bottom:0;

			}



			/**

			* @tab Header

			* @section header text

			* @tip Set the styling for your emails header text. Choose a size and color that is easy to read.

			*/

			.headerContent{

				/*@editable*/ color:#202020;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:34px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				/*@editable*/ padding:0;

				/*@editable*/ text-align:center;

				/*@editable*/ vertical-align:middle;

			}

			#llamar{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			

			#email{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			/**

			* @tab Header

			* @section header link

			* @tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.

			*/

			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			#headerImage{

				height:auto;

				max-width:600px !important;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Body

			* @section body style

			* @tip Set the background color for your emails body area.

			*/

			#templateContainer, .bodyContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Body

			* @section body text

			* @tip Set the styling for your emails main content text. Choose a size and color that is easy to read.

			* @theme main

			*/

			.bodyContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Body

			* @section body link

			* @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.

			*/

			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.bodyContent img, .fullWidthBandContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: SIDEBAR /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Sidebar

			* @section sidebar style

			* @tip Set the background color and border for your emails sidebar area.

			*/

			#templateSidebar{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Sidebar

			* @section sidebar text

			* @tip Set the styling for your emails sidebar text. Choose a size and color that is easy to read.

			*/

			.sidebarContent div{

			/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Sidebar

			* @section sidebar link

			* @tip Set the styling for your emails sidebar links. Choose a color that helps them stand out from your text.

			*/

			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.sidebarContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COLUMNS; LEFT, RIGHT /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section left column link

			* @tip Set the styling for your emails left column links. Choose a color that helps them stand out from your text.

			*/

			.leftColumnContent div a:link, .leftColumnContent div a:visited, /* Yahoo! Mail Override */ .leftColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.leftColumnContent img{

				display:inline;

				height:auto;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section right column link

			* @tip Set the styling for your emails right column links. Choose a color that helps them stand out from your text.

			*/

			.rightColumnContent div a:link, .rightColumnContent div a:visited, /* Yahoo! Mail Override */ .rightColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.rightColumnContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Footer

			* @section footer style

			* @tip Set the background color and top border for your emails footer area.

			* @theme footer

			*/

			#templateFooter{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-top:0;

			}



			/**

			* @tab Footer

			* @section footer text

			* @tip Set the styling for your emails footer text. Choose a size and color that is easy to read.

			* @theme footer

			*/

			.footerContent div{

				/*@editable*/ color:#707070;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:125%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Footer

			* @section footer link

			* @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.

			*/

			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.footerContent img{

				display:inline;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			* @theme footer

			*/

			#social{

				/*@editable*/ background-color:#FAFAFA;

				/*@editable*/ border:0;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			*/

	.vinculo{

	color: #909090;

	font-weight:bold;

	

	}

	.vinculo-social a{

		color:#676767 !important;

font-weight:bold !important;

		font-size:16px;

		text-decoration:none !important;	

		

	}

	

.vinculo a{

	color: #D63432!important;	

			font-weight:bold;

			

			

}

#social div{

				/*@editable*/ text-align:center;

			}



			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			* @theme footer

			*/

			#utility{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border:0;

			}



			#utility div{

				 text-align:center;

			}



			#monkeyRewards img{

				max-width:190px;

			}

			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			*/

			

		</style>

	</head>

    <body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>

    	<center>

        

        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>

            	<tr>

                	<td align='center' valign='top'>

                        <!-- // Begin Template Preheader \\ -->

                        <table border='0' cellpadding='10' cellspacing='0' width='600' id='templatePreheader'>

                            <tr>

                                <td valign='top' class='preheaderContent'>

                                	

                                	<!-- // Begin Module: Standard Preheader \ -->

                                    <table border='0' cellpadding='10' cellspacing='0' width='100%'>

                                     </table>

                                	<!-- // End Module: Standard Preheader \ -->

                                

                                </td>

                            </tr>

                        </table>

                        <!-- // End Template Preheader \\ -->

                     <div>   

                    	<table border='0' cellpadding='0' cellspacing='0' width='636' id='templateContainer' style='border: 2px solid #999; padding:0px; margin:0px;'>

                        	<tr>

                            	<td width='600' align='center' valign='top'>

                                    <!-- // Begin Template Header \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateHeader'>

                                        <tr>

                                            <td class='headerContent'>

                                            

                                            	<!-- // Begin Module: Standard Header Image \\ -->

                                            	<img src='http://fierros.com.co/themes/ediciones/images/suscripcion-revista-impresa.jpg' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext width='100%'/>

                                            	<!-- // End Module: Standard Header Image \\ --></td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Header \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Body \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>

                                    	<tr>

                                       

                                        	<td valign='top' width='600'>

                                            	<table border='0' cellpadding='0' cellspacing='0' width='400'>

                                                    <tr>

                                                    	<td valign='top'>

                                                            <table border='0' cellpadding='0' cellspacing='0' width='600'>

                                                                <tr>

                                                                    <td valign='top' width='180' class='leftColumnContent'>

                                                                    

                                                                        <!-- // Begin Module: Top Image with Content \\ -->

                                                                        <table border='0'>

                                                                            <tr mc:repeatable>

                                                                                <td valign='middle'><div mc:edit='std_content00'>

				 	                    <br />                     <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

 line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'>Contacto Suscriptor</h1>

                <h2 style='color:#333333;

				display:block;

				font-family:Futura;

                font-size:18px;

 				line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'></h2>

                        <p class='vinculo' style='color: #000;

	 font-size:16px;'>Nuevo mensaje de <span class='vinculo' style='color: #000;

	 font-size:16px;'> <strong>&quot;Revista Fierros - La Comunidad #1 para Ferreteros en Colombia&quot;</strong></span>.</p>

      

            <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

                line-height:100%;

				margin-top:30px !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic; font-size:22px;'>Datos del mensaje enviado</h1>                       


                <div style='font-size:14px;'><strong>Nombre:</strong> &nbsp; $Nombre

       </div>

 <div style='

	 font-size:14px;''>

<strong>Email:</strong> &nbsp; $Email <br />

 </div>

<div style='

	font-size:14px;'><strong>Tel&eacute;fono:</strong>  &nbsp; $Telefono

    </div>

    <div style='

	font-size:14px;'><strong>Ciudad:</strong> &nbsp; $Ciudad

    </div>

    <div style='

	font-size:14px;'><strong>Comentarios:</strong>  &nbsp;$Comments

    </div>

    </p>

    <br />



    <hr />

    <p class='vinculo' style='

	font-weight:bold; font-size:12px;'><a href='www.fierros.com.co/'>¡ Visite Revista Fierros - La Comunidad #1 para Ferreteros en Colombia  !</a>

    <br />

    <br />

    	Cordialmente

	<br />

		Servicio al Cliente,       <br /><a href='www.fierros.com.co/guia/'>www.fierros.com.co</a></p>

  

     <p class='vinculo' style='color: #909090;

	font-size:12px;'>

       <strong> Copyright 2015 

Axioma Comunicaciones Ltda. 

Todos Los Derechos Reservados. </strong></p>

            </div>

            

            

            

                        </td>         </tr>

</table>

<!-- // End Module: Top Image with Content \\ -->

                                                                        

                                                                    </td>

                                                                    

                                                                </tr>

                                                            </table>

                                                        </td>

                                                    </tr>

                                                </table>                                                

                                            </td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Body \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Footer \\ --><!-- // End Template Footer \\ -->

                                </td>

                            </tr>

                        </table>

                        </div>

                        <br />

                    </td>

                </tr>

            </table>

        </center>

    </body>

</html>";

	return $formHomeIalimentos;

}



//////////////******************************////////////////////////////////////******************************//////////////////////suscripciones cliente



function formSuscriptionIAlimentosCliente($Nombre,$Telefono,$Email,$Ciudad,$Comments){

	$formularioCliente="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

<html>

    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

        

        <!-- Facebook sharing information tags -->

        <meta property='og:title' content='*|MC:SUBJECT|*' />

        

        <title>*|MC:SUBJECT|*</title>

		<style type='text/css'>

			/* Client-specific Styles */

			#outlook a{padding:0;} /* Force Outlook to provide a 'view in browser' button. */

			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */

			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */



			/* Reset Styles */

			body{margin:0; padding:0;}

			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}

			table td{border-collapse:collapse;}

			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}



			/* Template Styles */



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Page

			* @section background color

			* @tip Set the background color for your email. You may want to choose one that matches your companys branding

			* @theme page

			*/

			body, #backgroundTable{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Page

			* @section email border

			* @tip Set the border for your email.

			*/

			#templateContainer{

				/*@editable*/ border: 1px solid #DDDDDD;

			}



			/**

			* @tab Page

			* @section heading 1

			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.

			* @style heading 1

			*/

			strong {

color: #5C5C5C;

}

			.h4-contactenos{

				font-family: Futura;

				color:#FE0002 !important;	

			}



			h1, .h1{

				/*@editable*/ color:#5C5C5C;

				display:block;

				/*@editable*/ 

			font-family: Futura;

				/*@editable*/ font-size:22px;

				/*@editable*/ 				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

				font-style:italic;

			}



			/**

			* @tab Page

			* @section heading 2

			* @tip Set the styling for all second-level headings in your emails.

			* @style heading 2

			*/

			h2, .h2{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:30px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 3

			* @tip Set the styling for all third-level headings in your emails.

			* @style heading 3

			*/

			h3, .h3{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:26px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 4

			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.

			* @style heading 4

			*/

			h4, .h4{

				

font-style:italic;				

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:22px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: PREHEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section preheader style

			* @tip Set the background color for your emails preheader area.

			* @theme page

			*/

			#templatePreheader{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Header

			* @section preheader text

			* @tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.

			*/

			.preheaderContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:100%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Header

			* @section preheader link

			* @tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.

			*/

			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section header style

			* @tip Set the background color and border for your emails header area.

			* @theme header

			*/

			#templateHeader{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-bottom:0;

			}



			/**

			* @tab Header

			* @section header text

			* @tip Set the styling for your emails header text. Choose a size and color that is easy to read.

			*/

			.headerContent{

				/*@editable*/ color:#202020;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:34px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				/*@editable*/ padding:0;

				/*@editable*/ text-align:center;

				/*@editable*/ vertical-align:middle;

			}

			#llamar{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			

			#email{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			/**

			* @tab Header

			* @section header link

			* @tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.

			*/

			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;


				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			#headerImage{

				height:auto;

				max-width:600px !important;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Body

			* @section body style

			* @tip Set the background color for your emails body area.

			*/

			#templateContainer, .bodyContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Body

			* @section body text

			* @tip Set the styling for your emails main content text. Choose a size and color that is easy to read.

			* @theme main

			*/

			.bodyContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Body

			* @section body link

			* @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.

			*/

			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.bodyContent img, .fullWidthBandContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: SIDEBAR /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Sidebar

			* @section sidebar style

			* @tip Set the background color and border for your emails sidebar area.

			*/

			#templateSidebar{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Sidebar

			* @section sidebar text

			* @tip Set the styling for your emails sidebar text. Choose a size and color that is easy to read.

			*/

			.sidebarContent div{

			/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Sidebar

			* @section sidebar link

			* @tip Set the styling for your emails sidebar links. Choose a color that helps them stand out from your text.

			*/

			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.sidebarContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COLUMNS; LEFT, RIGHT /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section left column link

			* @tip Set the styling for your emails left column links. Choose a color that helps them stand out from your text.

			*/

			.leftColumnContent div a:link, .leftColumnContent div a:visited, /* Yahoo! Mail Override */ .leftColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.leftColumnContent img{


				display:inline;

				height:auto;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section right column link

			* @tip Set the styling for your emails right column links. Choose a color that helps them stand out from your text.

			*/

			.rightColumnContent div a:link, .rightColumnContent div a:visited, /* Yahoo! Mail Override */ .rightColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.rightColumnContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Footer

			* @section footer style

			* @tip Set the background color and top border for your emails footer area.

			* @theme footer

			*/

			#templateFooter{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-top:0;

			}



			/**

			* @tab Footer

			* @section footer text

			* @tip Set the styling for your emails footer text. Choose a size and color that is easy to read.

			* @theme footer

			*/

			.footerContent div{

				/*@editable*/ color:#707070;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:125%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Footer

			* @section footer link

			* @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.

			*/

			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.footerContent img{

				display:inline;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			* @theme footer

			*/

			#social{

				/*@editable*/ background-color:#FAFAFA;

				/*@editable*/ border:0;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			*/

	.vinculo{

	color: #909090;

	font-weight:bold;

	

	}

	.vinculo-social a{

		color:#676767 !important;

font-weight:bold !important;

		font-size:16px;

		text-decoration:none !important;	

		

	}

	

.vinculo a{

	color: #D63432!important;	

			font-weight:bold;

			

			

}

#social div{

				/*@editable*/ text-align:center;

			}



			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			* @theme footer

			*/

			#utility{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border:0;

			}



			#utility div{

				 text-align:center;

			}



			#monkeyRewards img{

				max-width:190px;

			}

			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			*/

			

		</style>


	</head>

    <body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>

    	<center>

        

        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>

            	<tr>

                	<td align='center' valign='top'>

                        <!-- // Begin Template Preheader \\ -->

                        <table border='0' cellpadding='10' cellspacing='0' width='600' id='templatePreheader'>

                            <tr>

                                <td valign='top' class='preheaderContent'>

                                	

                                	<!-- // Begin Module: Standard Preheader \ -->

                                    <table border='0' cellpadding='10' cellspacing='0' width='100%'>

                                     </table>

                                	<!-- // End Module: Standard Preheader \ -->

                                

                                </td>

                            </tr>

                        </table>

                        <!-- // End Template Preheader \\ -->

                     <div>   

                    	<table border='0' cellpadding='0' cellspacing='0' width='636' id='templateContainer' style='border: 2px solid #999; padding:0px; margin:0px;'>

                        	<tr>

                            	<td width='600' align='center' valign='top'>

                                    <!-- // Begin Template Header \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateHeader'>

                                        <tr>

                                            <td class='headerContent'>

                                            

                                            	<!-- // Begin Module: Standard Header Image \\ -->

                                            	<img src='http://fierros.com.co/themes/ediciones/images/suscripcion-revista-impresa.jpg' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext width='100%'/>

                                            	<!-- // End Module: Standard Header Image \\ --></td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Header \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Body \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>

                                    	<tr>

                                       

                                        	<td valign='top' width='600'>

                                            	<table border='0' cellpadding='0' cellspacing='0' width='400'>

                                                    <tr>

                                                    	<td valign='top'>

                                                            <table border='0' cellpadding='0' cellspacing='0' width='600'>

                                                                <tr>

                                                                    <td valign='top' width='180' class='leftColumnContent'>

                                                                    

                                                                        <!-- // Begin Module: Top Image with Content \\ -->

                                                                        <table border='0'>

                                                                            <tr mc:repeatable>

                                                                                <td valign='middle'><div mc:edit='std_content00'>

				 	                    <br />                     <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

 line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'>Sr (a) $Nombre</h1>

                <h2 style='color:#333333;

				display:block;

				font-family:Futura;

                font-size:18px;

 				line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'></h2>

                        <p class='vinculo' style='color: #000;

	 font-size:16px;'>Este es un email de confirmación de contacto con<span class='vinculo' style='color: #000;

	 font-size:16px;'> <strong>&quot;Revista Fierros - La Comunidad #1 para Ferreteros en Colombia&quot;</strong></span>.</p>

      

            <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

                line-height:100%;

				margin-top:30px !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic; font-size:22px;'>Datos del mensaje enviado</h1>                      

               
                 <div style='font-size:14px;'><strong>Nombre:</strong> &nbsp; $Nombre

       </div>

 <div style='

	 font-size:14px;''>

<strong>Email:</strong> &nbsp; $Email <br />

 </div>

<div style='

	font-size:14px;'><strong>Tel&eacute;fono:</strong>  &nbsp; $Telefono

    </div>

    <div style='

	font-size:14px;'><strong>Ciudad:</strong> &nbsp; $Ciudad

    </div>

   
    <div style='

	font-size:14px;'><strong>Comentarios:</strong>  &nbsp;$Comments

    </div>

    </p>

    <br />



    <hr />

    <p class='vinculo' style='

	font-weight:bold; font-size:12px;'><a href='www.fierros.com.co/'>¡ Visite Revista Fierros - La Comunidad #1 para Ferreteros en Colombia  !</a>

    <br />

    <br />

    	Cordialmente

	<br />

		Servicio al Cliente,       <br /><a href='www.fierros.com.co/guia/'>www.fierros.com.co</a></p>

  

     <p class='vinculo' style='color: #909090;

	font-size:12px;'>

       <strong> Copyright 2015 

Axioma Comunicaciones Ltda. 

Todos Los Derechos Reservados. </strong></p>

            </div>

            

            

            

                        </td>         </tr>

</table>

<!-- // End Module: Top Image with Content \\ -->

                                                                        

                                                                    </td>

                                                                    

                                                                </tr>

                                                            </table>

                                                        </td>

                                                    </tr>

                                                </table>                                                

                                            </td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Body \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Footer \\ --><!-- // End Template Footer \\ -->

                                </td>

                            </tr>

                        </table>

                        </div>

                        <br />

                    </td>

                </tr>

            </table>

        </center>

    </body>

</html>";

	return $formularioCliente;

}





//////////////******************************////////////////////////////////////******************************//////////////////////paute con nosotros



function formPauteIAlimentos($Nombre,$NombreEmpresa,$Telefono,$Email,$Ciudad,$Product,$Comments){

	$formHomeIalimentos="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

<html>

    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

        

        <!-- Facebook sharing information tags -->

        <meta property='og:title' content='*|MC:SUBJECT|*' />

        

        <title>*|MC:SUBJECT|*</title>

		<style type='text/css'>

			/* Client-specific Styles */

			#outlook a{padding:0;} /* Force Outlook to provide a 'view in browser' button. */

			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */

			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */



			/* Reset Styles */

			body{margin:0; padding:0;}

			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}

			table td{border-collapse:collapse;}

			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}



			/* Template Styles */



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Page

			* @section background color

			* @tip Set the background color for your email. You may want to choose one that matches your companys branding

			* @theme page

			*/

			body, #backgroundTable{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Page

			* @section email border

			* @tip Set the border for your email.

			*/

			#templateContainer{

				/*@editable*/ border: 1px solid #DDDDDD;

			}



			/**

			* @tab Page

			* @section heading 1

			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.

			* @style heading 1

			*/

			strong {

color: #5C5C5C;

}

			.h4-contactenos{

				font-family: Futura;

				color:#FE0002 !important;	

			}



			h1, .h1{

				/*@editable*/ color:#5C5C5C;

				display:block;

				/*@editable*/ 

			font-family: Futura;

				/*@editable*/ font-size:22px;

				/*@editable*/ 				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

				font-style:italic;

			}



			/**

			* @tab Page

			* @section heading 2

			* @tip Set the styling for all second-level headings in your emails.

			* @style heading 2

			*/

			h2, .h2{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:30px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 3

			* @tip Set the styling for all third-level headings in your emails.

			* @style heading 3

			*/

			h3, .h3{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:26px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 4

			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.

			* @style heading 4

			*/

			h4, .h4{

				

font-style:italic;				

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:22px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: PREHEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section preheader style

			* @tip Set the background color for your emails preheader area.

			* @theme page

			*/

			#templatePreheader{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Header

			* @section preheader text

			* @tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.

			*/

			.preheaderContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:100%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Header

			* @section preheader link

			* @tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.

			*/

			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section header style

			* @tip Set the background color and border for your emails header area.

			* @theme header

			*/

			#templateHeader{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-bottom:0;

			}



			/**

			* @tab Header

			* @section header text

			* @tip Set the styling for your emails header text. Choose a size and color that is easy to read.

			*/

			.headerContent{

				/*@editable*/ color:#202020;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:34px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				/*@editable*/ padding:0;

				/*@editable*/ text-align:center;

				/*@editable*/ vertical-align:middle;

			}

			#llamar{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			

			#email{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			/**

			* @tab Header

			* @section header link

			* @tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.

			*/

			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			#headerImage{

				height:auto;

				max-width:600px !important;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Body

			* @section body style

			* @tip Set the background color for your emails body area.

			*/

			#templateContainer, .bodyContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Body

			* @section body text

			* @tip Set the styling for your emails main content text. Choose a size and color that is easy to read.

			* @theme main

			*/

			.bodyContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Body

			* @section body link

			* @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.

			*/

			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.bodyContent img, .fullWidthBandContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: SIDEBAR /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Sidebar

			* @section sidebar style

			* @tip Set the background color and border for your emails sidebar area.

			*/

			#templateSidebar{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Sidebar

			* @section sidebar text

			* @tip Set the styling for your emails sidebar text. Choose a size and color that is easy to read.

			*/

			.sidebarContent div{

			/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Sidebar

			* @section sidebar link

			* @tip Set the styling for your emails sidebar links. Choose a color that helps them stand out from your text.

			*/

			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.sidebarContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COLUMNS; LEFT, RIGHT /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section left column link

			* @tip Set the styling for your emails left column links. Choose a color that helps them stand out from your text.

			*/

			.leftColumnContent div a:link, .leftColumnContent div a:visited, /* Yahoo! Mail Override */ .leftColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.leftColumnContent img{

				display:inline;

				height:auto;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section right column link

			* @tip Set the styling for your emails right column links. Choose a color that helps them stand out from your text.

			*/

			.rightColumnContent div a:link, .rightColumnContent div a:visited, /* Yahoo! Mail Override */ .rightColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.rightColumnContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Footer

			* @section footer style

			* @tip Set the background color and top border for your emails footer area.

			* @theme footer

			*/

			#templateFooter{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-top:0;

			}



			/**

			* @tab Footer

			* @section footer text

			* @tip Set the styling for your emails footer text. Choose a size and color that is easy to read.

			* @theme footer

			*/

			.footerContent div{

				/*@editable*/ color:#707070;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:125%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Footer

			* @section footer link

			* @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.

			*/

			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.footerContent img{

				display:inline;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			* @theme footer

			*/

			#social{

				/*@editable*/ background-color:#FAFAFA;

				/*@editable*/ border:0;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			*/

	.vinculo{

	color: #909090;

	font-weight:bold;

	

	}

	.vinculo-social a{

		color:#676767 !important;

font-weight:bold !important;

		font-size:16px;

		text-decoration:none !important;	

		

	}

	

.vinculo a{

	color: #D63432!important;	

			font-weight:bold;

			

			

}

#social div{

				/*@editable*/ text-align:center;

			}



			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			* @theme footer

			*/

			#utility{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border:0;

			}



			#utility div{

				 text-align:center;

			}



			#monkeyRewards img{

				max-width:190px;

			}

			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			*/

			

		</style>

	</head>

    <body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>

    	<center>

        

        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>

            	<tr>

                	<td align='center' valign='top'>

                        <!-- // Begin Template Preheader \\ -->

                        <table border='0' cellpadding='10' cellspacing='0' width='600' id='templatePreheader'>

                            <tr>

                                <td valign='top' class='preheaderContent'>

                                	

                                	<!-- // Begin Module: Standard Preheader \ -->

                                    <table border='0' cellpadding='10' cellspacing='0' width='100%'>

                                     </table>

                                	<!-- // End Module: Standard Preheader \ -->

                                

                                </td>

                            </tr>

                        </table>

                        <!-- // End Template Preheader \\ -->

                     <div>   

                    	<table border='0' cellpadding='0' cellspacing='0' width='636' id='templateContainer' style='border: 2px solid #999; padding:0px; margin:0px;'>

                        	<tr>

                            	<td width='600' align='center' valign='top'>

                                    <!-- // Begin Template Header \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateHeader'>

                                        <tr>

                                            <td class='headerContent'>

                                            

                                            	<!-- // Begin Module: Standard Header Image \\ -->

                                            	<img src='http://fierros.com.co/themes/ediciones/images/pauteconnosotros.jpg' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext width='100%'/>

                                            	<!-- // End Module: Standard Header Image \\ --></td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Header \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Body \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>

                                    	<tr>

                                       

                                        	<td valign='top' width='600'>

                                            	<table border='0' cellpadding='0' cellspacing='0' width='400'>

                                                    <tr>

                                                    	<td valign='top'>

                                                            <table border='0' cellpadding='0' cellspacing='0' width='600'>

                                                                <tr>

                                                                    <td valign='top' width='180' class='leftColumnContent'>

                                                                    

                                                                        <!-- // Begin Module: Top Image with Content \\ -->

                                                                        <table border='0'>

                                                                            <tr mc:repeatable>

                                                                                <td valign='middle'><div mc:edit='std_content00'>

				 	                    <br />                     <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

 line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'>Contacto Suscriptor</h1>

                <h2 style='color:#333333;

				display:block;

				font-family:Futura;

                font-size:18px;

 				line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'></h2>

                        <p class='vinculo' style='color: #000;

	 font-size:16px;'>Nuevo mensaje de <span class='vinculo' style='color: #000;

	 font-size:16px;'> <strong>&quot;Revista Fierros - La Comunidad #1 para Ferreteros en Colombia&quot;</strong></span>.</p>

      

            <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

                line-height:100%;

				margin-top:30px !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic; font-size:22px;'>Datos del mensaje enviado</h1>                       

                <div style='font-size:14px;'><strong>Nombre empresa:</strong> &nbsp; $NombreEmpresa

       </div>

                <div style='font-size:14px;'><strong>Nombre:</strong> &nbsp; $Nombre

       </div>

 <div style='

	 font-size:14px;''>

<strong>Email:</strong> &nbsp; $Email <br />

 </div>

<div style='

	font-size:14px;'><strong>Tel&eacute;fono:</strong>  &nbsp; $Telefono

    </div>

    <div style='

	font-size:14px;'><strong>Ciudad:</strong> &nbsp; $Ciudad

    </div>

    <div style='

	font-size:14px;'><strong>Producto:</strong>  &nbsp;$Product

    </div>

    <div style='

	font-size:14px;'><strong>Comentarios:</strong>  &nbsp;$Comments

    </div>

    </p>

    <br />



    <hr />

    <p class='vinculo' style='

	font-weight:bold; font-size:12px;'><a href='www.fierros.com.co/'>¡ Visite Revista Fierros - La Comunidad #1 para Ferreteros en Colombia  !</a>

    <br />

    <br />

    	Cordialmente

	<br />

		Servicio al Cliente,       <br /><a href='www.fierros.com.co/guia/'>www.fierros.com.co</a></p>

  

     <p class='vinculo' style='color: #909090;

	font-size:12px;'>

       <strong> Copyright 2015 

Axioma Comunicaciones Ltda. 

Todos Los Derechos Reservados. </strong></p>

            </div>

            

            

            

                        </td>         </tr>

</table>

<!-- // End Module: Top Image with Content \\ -->

                                                                        

                                                                    </td>

                                                                    

                                                                </tr>

                                                            </table>

                                                        </td>

                                                    </tr>

                                                </table>                                                

                                            </td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Body \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Footer \\ --><!-- // End Template Footer \\ -->

                                </td>

                            </tr>

                        </table>

                        </div>

                        <br />

                    </td>

                </tr>

            </table>

        </center>

    </body>

</html>";

	return $formHomeIalimentos;

}



//////////////******************************////////////////////////////////////******************************//////////////////////paute con nosotros cliente



function formPauteIAlimentosCliente($Nombre,$NombreEmpresa,$Telefono,$Email,$Cargo,$Ciudad,$Product){

	$formularioCliente="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

<html>

    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

        

        <!-- Facebook sharing information tags -->

        <meta property='og:title' content='*|MC:SUBJECT|*' />

        

        <title>*|MC:SUBJECT|*</title>

		<style type='text/css'>

			/* Client-specific Styles */

			#outlook a{padding:0;} /* Force Outlook to provide a 'view in browser' button. */

			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */

			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */



			/* Reset Styles */

			body{margin:0; padding:0;}

			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}

			table td{border-collapse:collapse;}

			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}



			/* Template Styles */



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Page

			* @section background color

			* @tip Set the background color for your email. You may want to choose one that matches your companys branding

			* @theme page

			*/

			body, #backgroundTable{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Page

			* @section email border

			* @tip Set the border for your email.

			*/

			#templateContainer{

				/*@editable*/ border: 1px solid #DDDDDD;

			}



			/**

			* @tab Page

			* @section heading 1

			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.

			* @style heading 1

			*/

			strong {

color: #5C5C5C;

}

			.h4-contactenos{

				font-family: Futura;

				color:#FE0002 !important;	

			}



			h1, .h1{

				/*@editable*/ color:#5C5C5C;

				display:block;

				/*@editable*/ 

			font-family: Futura;

				/*@editable*/ font-size:22px;

				/*@editable*/ 				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

				font-style:italic;

			}



			/**

			* @tab Page

			* @section heading 2

			* @tip Set the styling for all second-level headings in your emails.

			* @style heading 2

			*/

			h2, .h2{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:30px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 3

			* @tip Set the styling for all third-level headings in your emails.

			* @style heading 3

			*/

			h3, .h3{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:26px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 4

			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.

			* @style heading 4

			*/

			h4, .h4{

				

font-style:italic;				

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:22px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: PREHEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section preheader style

			* @tip Set the background color for your emails preheader area.

			* @theme page

			*/

			#templatePreheader{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Header

			* @section preheader text

			* @tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.

			*/

			.preheaderContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:100%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Header

			* @section preheader link

			* @tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.

			*/

			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section header style

			* @tip Set the background color and border for your emails header area.

			* @theme header

			*/

			#templateHeader{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-bottom:0;

			}



			/**

			* @tab Header

			* @section header text

			* @tip Set the styling for your emails header text. Choose a size and color that is easy to read.

			*/

			.headerContent{

				/*@editable*/ color:#202020;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:34px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				/*@editable*/ padding:0;

				/*@editable*/ text-align:center;

				/*@editable*/ vertical-align:middle;

			}

			#llamar{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			

			#email{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			/**

			* @tab Header

			* @section header link

			* @tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.

			*/

			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			#headerImage{

				height:auto;

				max-width:600px !important;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Body

			* @section body style

			* @tip Set the background color for your emails body area.

			*/

			#templateContainer, .bodyContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Body

			* @section body text

			* @tip Set the styling for your emails main content text. Choose a size and color that is easy to read.

			* @theme main

			*/

			.bodyContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Body

			* @section body link

			* @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.

			*/

			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.bodyContent img, .fullWidthBandContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: SIDEBAR /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Sidebar

			* @section sidebar style

			* @tip Set the background color and border for your emails sidebar area.

			*/

			#templateSidebar{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Sidebar

			* @section sidebar text

			* @tip Set the styling for your emails sidebar text. Choose a size and color that is easy to read.

			*/

			.sidebarContent div{

			/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Sidebar

			* @section sidebar link

			* @tip Set the styling for your emails sidebar links. Choose a color that helps them stand out from your text.

			*/

			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.sidebarContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COLUMNS; LEFT, RIGHT /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section left column link

			* @tip Set the styling for your emails left column links. Choose a color that helps them stand out from your text.

			*/

			.leftColumnContent div a:link, .leftColumnContent div a:visited, /* Yahoo! Mail Override */ .leftColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.leftColumnContent img{

				display:inline;

				height:auto;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section right column link

			* @tip Set the styling for your emails right column links. Choose a color that helps them stand out from your text.

			*/

			.rightColumnContent div a:link, .rightColumnContent div a:visited, /* Yahoo! Mail Override */ .rightColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.rightColumnContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Footer

			* @section footer style

			* @tip Set the background color and top border for your emails footer area.

			* @theme footer

			*/

			#templateFooter{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-top:0;

			}



			/**

			* @tab Footer

			* @section footer text

			* @tip Set the styling for your emails footer text. Choose a size and color that is easy to read.

			* @theme footer

			*/

			.footerContent div{

				/*@editable*/ color:#707070;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:125%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Footer

			* @section footer link

			* @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.

			*/

			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.footerContent img{

				display:inline;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			* @theme footer

			*/

			#social{

				/*@editable*/ background-color:#FAFAFA;

				/*@editable*/ border:0;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			*/

	.vinculo{

	color: #909090;

	font-weight:bold;

	

	}

	.vinculo-social a{

		color:#676767 !important;

font-weight:bold !important;

		font-size:16px;

		text-decoration:none !important;	

		

	}

	

.vinculo a{

	color: #D63432!important;	

			font-weight:bold;

			

			

}

#social div{

				/*@editable*/ text-align:center;

			}



			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			* @theme footer

			*/

			#utility{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border:0;

			}



			#utility div{

				 text-align:center;

			}



			#monkeyRewards img{

				max-width:190px;

			}

			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			*/

			

		</style>

	</head>

    <body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>

    	<center>

        

        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>

            	<tr>

                	<td align='center' valign='top'>

                        <!-- // Begin Template Preheader \\ -->

                        <table border='0' cellpadding='10' cellspacing='0' width='600' id='templatePreheader'>

                            <tr>

                                <td valign='top' class='preheaderContent'>

                                	

                                	<!-- // Begin Module: Standard Preheader \ -->

                                    <table border='0' cellpadding='10' cellspacing='0' width='100%'>

                                     </table>

                                	<!-- // End Module: Standard Preheader \ -->

                                

                                </td>

                            </tr>

                        </table>

                        <!-- // End Template Preheader \\ -->

                     <div>   

                    	<table border='0' cellpadding='0' cellspacing='0' width='636' id='templateContainer' style='border: 2px solid #999; padding:0px; margin:0px;'>

                        	<tr>

                            	<td width='600' align='center' valign='top'>

                                    <!-- // Begin Template Header \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateHeader'>

                                        <tr>

                                            <td class='headerContent'>

                                            

                                            	<!-- // Begin Module: Standard Header Image \\ -->

                                            	<img src='http://fierros.com.co/themes/ediciones/images/pauteconnosotros.jpg' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext width='100%'/>

                                            	<!-- // End Module: Standard Header Image \\ --></td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Header \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Body \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>

                                    	<tr>

                                       

                                        	<td valign='top' width='600'>

                                            	<table border='0' cellpadding='0' cellspacing='0' width='400'>

                                                    <tr>

                                                    	<td valign='top'>

                                                            <table border='0' cellpadding='0' cellspacing='0' width='600'>

                                                                <tr>

                                                                    <td valign='top' width='180' class='leftColumnContent'>

                                                                    

                                                                        <!-- // Begin Module: Top Image with Content \\ -->

                                                                        <table border='0'>

                                                                            <tr mc:repeatable>

                                                                                <td valign='middle'><div mc:edit='std_content00'>

				 	                    <br />                     <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

 line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'>Sr (a) $Nombre</h1>

                <h2 style='color:#333333;

				display:block;

				font-family:Futura;

                font-size:18px;

 				line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'></h2>

                        <p class='vinculo' style='color: #000;

	 font-size:16px;'>Este es un email de confirmación de contacto con<span class='vinculo' style='color: #000;

	 font-size:16px;'> <strong>&quot;Revista Fierros - La Comunidad #1 para Ferreteros en Colombia&quot;</strong></span>.</p>

      

            <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

                line-height:100%;

				margin-top:30px !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic; font-size:22px;'>Datos del mensaje enviado</h1>                      

                <div style='font-size:14px;'><strong>Nombre:</strong> &nbsp; $Nombre

       </div>

                

                 <div style='font-size:14px;'><strong>Nombre Empresa:</strong> &nbsp; $NombreEmpresa

       </div>

 <div style='

	 font-size:14px;''>

<strong>Email:</strong> &nbsp; $Email <br />

 </div>

<div style='

	font-size:14px;'><strong>Tel&eacute;fono:</strong>  &nbsp; $Telefono

    </div>

    <div style='

	font-size:14px;'><strong>Ciudad:</strong> &nbsp; $Ciudad

    </div>

    <div style='

	font-size:14px;'><strong>Cargo:</strong>  &nbsp;$Cargo

    </div>

    <div style='

	font-size:14px;'><strong>Producto:</strong>  &nbsp;$Product

    </div>

    </p>

    <br />







    <hr />

    <p class='vinculo' style='

	font-weight:bold; font-size:12px;'><a href='www.fierros.com.co/'>¡ Visite Revista Fierros - La Comunidad #1 para Ferreteros en Colombia  !</a>

    <br />

    <br />

    	Cordialmente

	<br />

		Servicio al Cliente,       <br /><a href='www.fierros.com.co/guia/'>www.fierros.com.co</a></p>

  

     <p class='vinculo' style='color: #909090;

	font-size:12px;'>

       <strong> Copyright 2015 

Axioma Comunicaciones Ltda. 

Todos Los Derechos Reservados. </strong></p>

            </div>

            

            

            

                        </td>         </tr>

</table>

<!-- // End Module: Top Image with Content \\ -->

                                                                        

                                                                    </td>

                                                                    

                                                                </tr>

                                                            </table>

                                                        </td>

                                                    </tr>

                                                </table>                                                

                                            </td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Body \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Footer \\ --><!-- // End Template Footer \\ -->

                                </td>

                            </tr>

                        </table>

                        </div>

                        <br />

                    </td>

                </tr>

            </table>

        </center>

    </body>

</html>";

	return $formularioCliente;

}

function formTop500($email,$name,$industria){

	$formularioCliente="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

<html>

    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

        

        <!-- Facebook sharing information tags -->

        <meta property='og:title' content='*|MC:SUBJECT|*' />

        

        <title>*|MC:SUBJECT|*</title>

		<style type='text/css'>

			/* Client-specific Styles */

			#outlook a{padding:0;} /* Force Outlook to provide a 'view in browser' button. */

			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */

			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */



			/* Reset Styles */

			body{margin:0; padding:0;}

			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}

			table td{border-collapse:collapse;}

			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}



			/* Template Styles */



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Page

			* @section background color

			* @tip Set the background color for your email. You may want to choose one that matches your companys branding

			* @theme page

			*/

			body, #backgroundTable{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Page

			* @section email border

			* @tip Set the border for your email.

			*/

			#templateContainer{

				/*@editable*/ border: 1px solid #DDDDDD;

			}



			/**

			* @tab Page

			* @section heading 1

			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.

			* @style heading 1

			*/

			strong {

color: #5C5C5C;

}

			.h4-contactenos{

				font-family: Futura;

				color:#FE0002 !important;	

			}



			h1, .h1{

				/*@editable*/ color:#5C5C5C;

				display:block;

				/*@editable*/ 

			font-family: Futura;

				/*@editable*/ font-size:22px;

				/*@editable*/ 				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

				font-style:italic;

			}



			/**

			* @tab Page

			* @section heading 2

			* @tip Set the styling for all second-level headings in your emails.

			* @style heading 2

			*/

			h2, .h2{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:30px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 3

			* @tip Set the styling for all third-level headings in your emails.

			* @style heading 3

			*/

			h3, .h3{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:26px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 4

			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.

			* @style heading 4

			*/

			h4, .h4{

				

font-style:italic;				

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:22px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: PREHEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section preheader style

			* @tip Set the background color for your emails preheader area.

			* @theme page

			*/

			#templatePreheader{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Header

			* @section preheader text

			* @tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.

			*/

			.preheaderContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:100%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Header

			* @section preheader link

			* @tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.

			*/

			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section header style

			* @tip Set the background color and border for your emails header area.

			* @theme header

			*/

			#templateHeader{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-bottom:0;

			}



			/**

			* @tab Header

			* @section header text

			* @tip Set the styling for your emails header text. Choose a size and color that is easy to read.

			*/

			.headerContent{

				/*@editable*/ color:#202020;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:34px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				/*@editable*/ padding:0;

				/*@editable*/ text-align:center;

				/*@editable*/ vertical-align:middle;

			}

			#llamar{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			

			#email{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			/**

			* @tab Header

			* @section header link

			* @tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.

			*/

			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			#headerImage{

				height:auto;

				max-width:600px !important;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Body

			* @section body style

			* @tip Set the background color for your emails body area.

			*/

			#templateContainer, .bodyContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Body

			* @section body text

			* @tip Set the styling for your emails main content text. Choose a size and color that is easy to read.

			* @theme main

			*/

			.bodyContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Body

			* @section body link

			* @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.

			*/

			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.bodyContent img, .fullWidthBandContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: SIDEBAR /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Sidebar

			* @section sidebar style

			* @tip Set the background color and border for your emails sidebar area.

			*/

			#templateSidebar{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Sidebar

			* @section sidebar text

			* @tip Set the styling for your emails sidebar text. Choose a size and color that is easy to read.

			*/

			.sidebarContent div{

			/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Sidebar

			* @section sidebar link

			* @tip Set the styling for your emails sidebar links. Choose a color that helps them stand out from your text.

			*/

			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.sidebarContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COLUMNS; LEFT, RIGHT /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section left column link

			* @tip Set the styling for your emails left column links. Choose a color that helps them stand out from your text.

			*/

			.leftColumnContent div a:link, .leftColumnContent div a:visited, /* Yahoo! Mail Override */ .leftColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.leftColumnContent img{

				display:inline;

				height:auto;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section right column link

			* @tip Set the styling for your emails right column links. Choose a color that helps them stand out from your text.

			*/

			.rightColumnContent div a:link, .rightColumnContent div a:visited, /* Yahoo! Mail Override */ .rightColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.rightColumnContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Footer

			* @section footer style

			* @tip Set the background color and top border for your emails footer area.

			* @theme footer

			*/

			#templateFooter{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-top:0;

			}



			/**

			* @tab Footer

			* @section footer text

			* @tip Set the styling for your emails footer text. Choose a size and color that is easy to read.

			* @theme footer

			*/

			.footerContent div{

				/*@editable*/ color:#707070;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:125%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Footer

			* @section footer link

			* @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.

			*/

			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.footerContent img{

				display:inline;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			* @theme footer

			*/

			#social{

				/*@editable*/ background-color:#FAFAFA;

				/*@editable*/ border:0;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			*/

	.vinculo{

	color: #909090;

	font-weight:bold;

	

	}

	.vinculo-social a{

		color:#676767 !important;

font-weight:bold !important;

		font-size:16px;

		text-decoration:none !important;	

		

	}

	

.vinculo a{

	color: #D63432!important;	

			font-weight:bold;

			

			

}

#social div{

				/*@editable*/ text-align:center;

			}



			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			* @theme footer

			*/

			#utility{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border:0;

			}



			#utility div{

				 text-align:center;

			}



			#monkeyRewards img{

				max-width:190px;

			}

			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			*/

			

		</style>

	</head>

    <body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>

    	<center>

        

        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>

            	<tr>

                	<td align='center' valign='top'>

                        <!-- // Begin Template Preheader \\ -->

                        <table border='0' cellpadding='10' cellspacing='0' width='600' id='templatePreheader'>

                            <tr>

                                <td valign='top' class='preheaderContent'>

                                	

                                	<!-- // Begin Module: Standard Preheader \ -->

                                    <table border='0' cellpadding='10' cellspacing='0' width='100%'>

                                     </table>

                                	<!-- // End Module: Standard Preheader \ -->

                                

                                </td>

                            </tr>

                        </table>

                        <!-- // End Template Preheader \\ -->

                     <div>   

                    	<table border='0' cellpadding='0' cellspacing='0' width='636' id='templateContainer' style='border: 2px solid #999; padding:0px; margin:0px;'>

                        	<tr>

                            	<td width='600' align='center' valign='top'>

                                    <!-- // Begin Template Header \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateHeader'>

                                        <tr>

                                            <td class='headerContent'>

                                            

                                            	<!-- // Begin Module: Standard Header Image \\ -->

                                            	<img src='http://www.fierros.com.co/images/Top500.jpg' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext width='100%'/>

                                            	<!-- // End Module: Standard Header Image \\ --></td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Header \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Body \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>

                                    	<tr>

                                       

                                        	<td valign='top' width='600'>

                                            	<table border='0' cellpadding='0' cellspacing='0' width='400'>

                                                    <tr>

                                                    	<td valign='top'>

                                                            <table border='0' cellpadding='0' cellspacing='0' width='600'>

                                                                <tr>

                                                                    <td valign='top' width='180' class='leftColumnContent'>

                                                                    

                                                                        <!-- // Begin Module: Top Image with Content \\ -->

                                                                        <table border='0'>

                                                                            <tr mc:repeatable>

                                                                                <td valign='middle'><div mc:edit='std_content00'>

				 	                    <br />                     <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

 line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'>Nueva Descarga Top 500</h1>

                <h2 style='color:#333333;

				display:block;

				font-family:Futura;

                font-size:18px;

 				line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'></h2>

                        <p class='vinculo' style='color: #000;

	 font-size:16px;'>Nueva descarga del Top 500 de<span class='vinculo' style='color: #000;

	 font-size:16px;'> <strong>&quot;Revista Fierros - La Comunidad #1 para Ferreteros en Colombia&quot;</strong></span>.</p>

      

            <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

                line-height:100%;

				margin-top:30px !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic; font-size:22px;'>Datos del cliente: </h1>                      

                <div style='font-size:14px;'><strong>Nombre:</strong> &nbsp; $email

       </div>

                

                 <div style='font-size:14px;'><strong>Email:</strong> &nbsp; $name

       </div>

 <div style='

	 font-size:14px;''>

<strong>Industria:</strong> &nbsp; $industria <br />




 </div>



    </p>

    <br />







    <hr />

    <p class='vinculo' style='

	font-weight:bold; font-size:12px;'><a href='www.revistaialimentos.com.co/'>¡ Visite Revista Fierros - La Comunidad #1 para Ferreteros en Colombia  !</a>

    <br />

    <br />

    	Cordialmente

	<br />

		Servicio al Cliente,       <br /><a href='www.fierros.com.co'>www.fierros.com.co</a></p>

  

     <p class='vinculo' style='color: #909090;

	font-size:12px;'>

       <strong> Copyright 2015 

Axioma Comunicaciones Ltda. 

Todos Los Derechos Reservados. </strong></p>

            </div>

            

            

            

                        </td>         </tr>

</table>

<!-- // End Module: Top Image with Content \\ -->

                                                                        

                                                                    </td>

                                                                    

                                                                </tr>

                                                            </table>

                                                        </td>

                                                    </tr>

                                                </table>                                                

                                            </td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Body \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Footer \\ --><!-- // End Template Footer \\ -->

                                </td>

                            </tr>

                        </table>

                        </div>

                        <br />

                    </td>

                </tr>

            </table>

        </center>

    </body>

</html>";

	return $formularioCliente;
}



function formTop500Cliente($email,$name,$industria){

	$formularioCliente="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

<html>

    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

        

        <!-- Facebook sharing information tags -->

        <meta property='og:title' content='*|MC:SUBJECT|*' />

        

        <title>*|MC:SUBJECT|*</title>

		<style type='text/css'>

			/* Client-specific Styles */

			#outlook a{padding:0;} /* Force Outlook to provide a 'view in browser' button. */

			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */

			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */



			/* Reset Styles */

			body{margin:0; padding:0;}

			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none; }

			table td{border-collapse:collapse;}

			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
			
			IMG.imgcenter{
      display: block;
      margin-left: auto;
      margin-right: auto;
      border:none;
      } 


			/* Template Styles */



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Page

			* @section background color

			* @tip Set the background color for your email. You may want to choose one that matches your companys branding

			* @theme page

			*/

			body, #backgroundTable{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Page

			* @section email border

			* @tip Set the border for your email.

			*/

			#templateContainer{

				/*@editable*/ border: 1px solid #DDDDDD;

			}



			/**

			* @tab Page

			* @section heading 1

			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.

			* @style heading 1

			*/

			strong {

color: #5C5C5C;

}

			.h4-contactenos{

				font-family: Futura;

				color:#FE0002 !important;	

			}



			h1, .h1{

				/*@editable*/ color:#5C5C5C;

				display:block;

				/*@editable*/ 

			font-family: Futura;

				/*@editable*/ font-size:22px;

				/*@editable*/ 				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

				font-style:italic;

			}



			/**

			* @tab Page

			* @section heading 2

			* @tip Set the styling for all second-level headings in your emails.

			* @style heading 2

			*/

			h2, .h2{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:30px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 3

			* @tip Set the styling for all third-level headings in your emails.

			* @style heading 3

			*/

			h3, .h3{

				/*@editable*/ color:#202020;

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:26px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Page

			* @section heading 4

			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.

			* @style heading 4

			*/

			h4, .h4{

				

font-style:italic;				

				display:block;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:22px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

				/*@editable*/ text-align:left;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: PREHEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section preheader style

			* @tip Set the background color for your emails preheader area.

			* @theme page

			*/

			#templatePreheader{

				/*@editable*/ background-color:#FAFAFA;

			}



			/**

			* @tab Header

			* @section preheader text

			* @tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.

			*/

			.preheaderContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:100%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Header

			* @section preheader link

			* @tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.

			*/

			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Header

			* @section header style

			* @tip Set the background color and border for your emails header area.

			* @theme header

			*/

			#templateHeader{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-bottom:0;

			}



			/**

			* @tab Header

			* @section header text

			* @tip Set the styling for your emails header text. Choose a size and color that is easy to read.

			*/

			.headerContent{

				/*@editable*/ color:#202020;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:34px;

				/*@editable*/ font-weight:bold;

				/*@editable*/ line-height:100%;

				/*@editable*/ padding:0;

				/*@editable*/ text-align:center;

				/*@editable*/ vertical-align:middle;

			}

			#llamar{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			

			#email{

				margin-top: 8px !important;

float: left;

margin-right: 10px !important;

			}

			/**

			* @tab Header

			* @section header link

			* @tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.

			*/

			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			#headerImage{

				height:auto;

				max-width:600px !important;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Body

			* @section body style

			* @tip Set the background color for your emails body area.

			*/

			#templateContainer, .bodyContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Body

			* @section body text

			* @tip Set the styling for your emails main content text. Choose a size and color that is easy to read.

			* @theme main

			*/

			.bodyContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Body

			* @section body link

			* @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.

			*/

			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.bodyContent img, .fullWidthBandContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: SIDEBAR /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Sidebar

			* @section sidebar style

			* @tip Set the background color and border for your emails sidebar area.

			*/

			#templateSidebar{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Sidebar

			* @section sidebar text

			* @tip Set the styling for your emails sidebar text. Choose a size and color that is easy to read.

			*/

			.sidebarContent div{

			/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Sidebar

			* @section sidebar link

			* @tip Set the styling for your emails sidebar links. Choose a color that helps them stand out from your text.

			*/

			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.sidebarContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COLUMNS; LEFT, RIGHT /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section left column text

			* @tip Set the styling for your emails left column text. Choose a size and color that is easy to read.

			*/

			.leftColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section left column link

			* @tip Set the styling for your emails left column links. Choose a color that helps them stand out from your text.

			*/

			.leftColumnContent div a:link, .leftColumnContent div a:visited, /* Yahoo! Mail Override */ .leftColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.leftColumnContent img{

				display:inline;

				height:auto;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent{

				/*@editable*/ background-color:#FFFFFF;

			}



			/**

			* @tab Columns

			* @section right column text

			* @tip Set the styling for your emails right column text. Choose a size and color that is easy to read.

			*/

			.rightColumnContent div{

				/*@editable*/ color:#505050;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:150%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Columns

			* @section right column link

			* @tip Set the styling for your emails right column links. Choose a color that helps them stand out from your text.

			*/

			.rightColumnContent div a:link, .rightColumnContent div a:visited, /* Yahoo! Mail Override */ .rightColumnContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.rightColumnContent img{

				display:inline;

				height:auto;

			}



			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */



			/**

			* @tab Footer

			* @section footer style

			* @tip Set the background color and top border for your emails footer area.

			* @theme footer

			*/

			#templateFooter{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border-top:0;

			}



			/**

			* @tab Footer

			* @section footer text

			* @tip Set the styling for your emails footer text. Choose a size and color that is easy to read.

			* @theme footer

			*/

			.footerContent div{

				/*@editable*/ color:#707070;

				/*@editable*/ font-family:'Futura LT Std Light';

				/*@editable*/ font-size:14px;

				/*@editable*/ line-height:125%;

				/*@editable*/ text-align:left;

			}



			/**

			* @tab Footer

			* @section footer link

			* @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.

			*/

			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{

				/*@editable*/ color:#336699;

				/*@editable*/ font-weight:normal;

				/*@editable*/ text-decoration:underline;

			}



			.footerContent img{

				display:inline;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			* @theme footer

			*/

			#social{

				/*@editable*/ background-color:#FAFAFA;

				/*@editable*/ border:0;

			}



			/**

			* @tab Footer

			* @section social bar style

			* @tip Set the background color and border for your emails footer social bar.

			*/

	.vinculo{

	color: #909090;

	font-weight:bold;

	

	}

	.vinculo-social a{

		color:#676767 !important;

font-weight:bold !important;

		font-size:16px;

		text-decoration:none !important;	

		

	}

	

.vinculo a{

	color: #D63432!important;	

			font-weight:bold;

			

			

}

#social div{

				/*@editable*/ text-align:center;

			}



			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			* @theme footer

			*/

			#utility{

				/*@editable*/ background-color:#FFFFFF;

				/*@editable*/ border:0;

			}



			#utility div{

				 text-align:center;

			}



			#monkeyRewards img{

				max-width:190px;

			}

			/**

			* @tab Footer

			* @section utility bar style

			* @tip Set the background color and border for your emails footer utility bar.

			*/

			

		</style>

	</head>

    <body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>

    	<center>

        

        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>

            	<tr>

                	<td align='center' valign='top'>

                        <!-- // Begin Template Preheader \\ -->

                        <table border='0' cellpadding='10' cellspacing='0' width='600' id='templatePreheader'>

                            <tr>

                                <td valign='top' class='preheaderContent'>

                                	

                                	<!-- // Begin Module: Standard Preheader \ -->

                                    <table border='0' cellpadding='10' cellspacing='0' width='100%'>

                                     </table>

                                	<!-- // End Module: Standard Preheader \ -->

                                

                                </td>

                            </tr>

                        </table>

                        <!-- // End Template Preheader \\ -->

                     <div>   

                    	<table border='0' cellpadding='0' cellspacing='0' width='636' id='templateContainer' style='border: 2px solid #999; padding:0px; margin:0px;'>

                        	<tr>

                            	<td width='600' align='center' valign='top'>

                                    <!-- // Begin Template Header \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateHeader'>

                                        <tr>

                                            <td class='headerContent'>

                                            

                                            	<!-- // Begin Module: Standard Header Image \\ -->

                                            	<img src='http://www.fierros.com.co/images/Top500.jpg' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext width='100%'/>

                                            	<!-- // End Module: Standard Header Image \\ --></td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Header \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Body \\ -->

                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>

                                    	<tr>

                                       

                                        	<td valign='top' width='600'>

                                            	<table border='0' cellpadding='0' cellspacing='0' width='400'>

                                                    <tr>

                                                    	<td valign='top'>

                                                            <table border='0' cellpadding='0' cellspacing='0' width='600'>

                                                                <tr>

                                                                    <td valign='top' width='180' class='leftColumnContent'>

                                                                    

                                                                        <!-- // Begin Module: Top Image with Content \\ -->

                                                                        <table border='0'>

                                                                            <tr mc:repeatable>

                                                                                <td valign='middle'><div mc:edit='std_content00'>

				 	                    <br />                     <h1 class='h1' style='color:#333333;

				display:block;

				font-family:Futura;

				font-size:22px;

 line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'>Sr (a). $email </h1>

                <h2 style='color:#333333;

				display:block;

				font-family:Futura;

                font-size:18px;

 				line-height:100%;

				margin-top:0 !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic;'></h2>

                        <p class='vinculo' style='color: #000;

	 font-size:16px;'>Gracias por tu interes en obtener esta edición especial del TOP 500 de las empresas que más venden en Colombia y en sus diferentes regiones.<span class='vinculo' style='color: #000;

	 font-size:16px;'> <strong>&quot;Revista Fierros - La Comunidad #1 para Ferreteros en Colombia&quot;</strong></span>.</p>


      

            <h1 class='h1' style='color:#333333;

				display:block;


				font-family:Futura;

				font-size:22px;

                line-height:100%;

				margin-top:30px !important;

				margin-right:0 !important;

				margin-bottom:10px !important;

				margin-left:0 !important;

text-align:left;

				font-style:italic; font-size:22px;'></h1>                      

                <div style='font-size:14px;'>
       </div>

                
<center>
                 <div style='font-size:14px; align:center'>
<a href='http://fierros.com.co/images/TOP_500FR.pdf'><img src='http://www.fierros.com.co/images/botondescarga200.jpg' width='200px' class='imgcenter' /></a>
       </div></center>

 <div style='

	 font-size:14px;''>



<strong>Link de descarga:</strong> &nbsp; <a href='http://fierros.com.co/images/TOP_500FR.pdf'>Top500.pdf</a><br />


 </div>



    </p>

    <br />







    <hr />

    <p class='vinculo' style='

	font-weight:bold; font-size:12px;'><a href='www.fierros.com.co/'>¡ Visite Revista Fierros - La Comunidad #1 para Ferreteros en Colombia  !</a>

    <br />

    <br />

    	Cordialmente

	<br />

		Servicio al Cliente,       <br /><a href='www.fierros.com.co/guia/'>www.fierros.com.co</a></p>

  

     <p class='vinculo' style='color: #909090;

	font-size:12px;'>

       <strong> Copyright 2015 

Axioma Comunicaciones Ltda. 

Todos Los Derechos Reservados. </strong></p>

            </div>

            

            

            

                        </td>         </tr>

</table>

<!-- // End Module: Top Image with Content \\ -->

                                                                        

                                                                    </td>

                                                                    

                                                                </tr>

                                                            </table>

                                                        </td>

                                                    </tr>

                                                </table>                                                

                                            </td>

                                        </tr>

                                    </table>

                                    <!-- // End Template Body \\ -->

                                </td>

                            </tr>

                        	<tr>

                            	<td align='center' valign='top'>

                                    <!-- // Begin Template Footer \\ --><!-- // End Template Footer \\ -->

                                </td>

                            </tr>

                        </table>

                        </div>

                        <br />

                    </td>

                </tr>

            </table>

        </center>

    </body>

</html>";

	return $formularioCliente;
}

?>