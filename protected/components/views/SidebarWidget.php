<?php

//emptyText for Tag

if($tag && $tag!='r')

$emptyText = 'No hay resultados para el Tag "'.$tag.'"';

else

$emptyText = '';

//controller name

$controller=Yii::app()->controller->id;

//action name

$action=Yii::app()->controller->action->id;

?>

<!-- Sidebar

================================================== -->

<aside id="sidebar">

	<div class="widget">

    	<div class="banner">

        <?php //define view banner

			if($controller=='site' && $action=='index'){

				$viewPos2 = '../../views/guia/banners/_view250x600GeneralHome';

			}else{

				$viewPos2 = '../../views/guia/banners/_view250x600GeneralPos2';

			}

			//print banner

			$this->widget('zii.widgets.CListView', array(

			'dataProvider'=>$dataProviderBanners,

			'itemView'=>$viewPos2,

			'enableSorting' => false,

			'enablePagination' => false,

			'emptyText' => '',

			'enablePagination' => false,

			'enableSorting' => false,

			'template' => '{items}{pager}',

				)); 

			?>

        </div>

    </div>


	<div class="widget">



        <h3>Productos <?php if(!$tag){ ?>Destacados<?php }

							elseif($tag!='r'){ echo '"'.$tag.'"';}

							else{ ?>Relacionados<?php }?></h3>



        <div class="article-block">

			

            <?php $this->widget('zii.widgets.CListView', array(

                'dataProvider'=>$classifiedsFeateresDataProvider,

                'itemView'=>'../../views/guia/classifieds/_viewHomeSidebarEdiciones',

                'enableSorting' => false,

                'enablePagination' => false,

                'emptyText' => $emptyText,

                'enablePagination' => false,

                'enableSorting' => false,

                'template' => '{items}{pager}',

                    )); 

            ?>

            

        </div>



    </div>

	<div class="widget">
      <div class="sidebarNewsletter">
        <big>Encuentre las noticias más importantes del sector directamente en correo.</big><form name="formNewsletter" id="formNewsletter_sidebar" action="/suscripcion-al-newsletter" method="post">
        <div class="input-group">
    
          <input type="email" name="NewsletterFormModal[email]" id="NewsletterFormModal_email_sidebar" class="form-control input-lg newsletter" placeholder="Ingrese su Correo" aria-hidden="true" required="">
          <!-- Area -->
          <input type="hidden" name="NewsletterFormModal[area]" id="NewsletterFormModal_area_sidebar" value="General - Todos">
          <!-- industria-->
          <input type="hidden" name="NewsletterFormModal[industria]" id="NewsletterFormModal_industria_sidebar" value="General - Todos">
          <input type="hidden" value="content" name="ajax" id="ajax">
        </div>
        <button type="submit" class="btn newsletter"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </form>
      </div>
    </div>

	<div class="widget">

        <div class="banner" id="Pos1">

            <?php 

			//define view banner

			if($controller=='site' && $action=='index'){

				$viewPos1 = '../../views/guia/banners/_view250x250Pos1Home';

			}else{

				$viewPos1 = '../../views/guia/banners/_view250x250Pos1';

			}

			//print banner

			$this->widget('zii.widgets.CListView', array(

                'dataProvider'=>$dataProviderBanners,

                'itemView'=>$viewPos1,

                'enableSorting' => false,

                'enablePagination' => false,

                'emptyText' => '',

                'enablePagination' => false,

                'enableSorting' => false,

                'template' => '{items}{pager}',

                    )); 

            ?>

        </div>

    </div>					

 	<div class="widget">

      <h3>Proveedores De</h3>

      <div class="tagcloud">

        <?php 
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProviderCategories,
			'itemView'=>'../../views/guia/categories/_viewEdiciones',
			'enablePagination' => false,
			'enableSorting' => false,
			'template' => '{items}{pager}',
		)); ?>

      </div>

    </div>

    

    

    <div class="sidebar-fixed">

    

        <div class="widget">

            <h3>Redes Sociales</h3>

            <div class="socialize-widget">

                <div class="ot-social-block">
                	<? if(Yii::app()->params->facebook){ ?>
                	<!--Facebook-->
					<a href="https://www.facebook.com/<?php echo Yii::app()->params->facebook; ?>" class="soc-link soc-facebook" target="_blank">
                        <strong id="likesFB"><i class="fa fa-facebook"></i></strong>
                        <span>facebook</span>
                    </a>
                    <? }
                    if(Yii::app()->params->twitter){ ?>
                    <!--Twitter-->
					<a href="https://twitter.com/<?php echo Yii::app()->params->twitter; ?>" class="soc-link soc-twitter" target="_blank">
                        <strong><i class="fa fa-twitter"></i></strong>
                        <span>twitter</span>
                    </a>
                    <? }
                    if(Yii::app()->params->googleplus){ ?>
                    <!--Google Plus-->
					<a href="https://plus.google.com/<?php echo Yii::app()->params->googleplus; ?>" class="soc-link soc-google ot-pluss" target="_blank">
						<strong><i class="fa fa-google-plus"></i></strong>
						<span>google+</span>
					</a>
                    <? }
                    if(Yii::app()->params->linkedin){ ?>
                    <!--Linkedin-->
					<a href="http://www.linkedin.com/<?php echo Yii::app()->params->linkedin; ?>" class="soc-link soc-linkedin ot-link" target="_blank">
						<strong><i class="fa fa-linkedin-square"></i></strong>
						<span>linkedin</span>
					</a>
                    <? }
                    if(Yii::app()->params->youtube){ ?>
                    <!--YouTube-->
					<a href="http://www.youtube.com/<?php echo Yii::app()->params->youtube; ?>" class="soc-link soc-google" target="_blank">
                        <strong><i class="fa fa-youtube"></i></strong>
                        <span>YouTube</span>
                    </a>
                    <? } ?>
				</div>

            </div>

        </div>

    

        <div class="widget">

            <div class="banner">

                <?php //define view banner

			if($controller=='site' && $action=='index'){

				$viewPos3 = '../../views/guia/banners/_view250x250Pos3Home';

			}else{

				$viewPos3 = '../../views/guia/banners/_view250x250Pos3';

			}

			//print banner

			$this->widget('zii.widgets.CListView', array(

                    'dataProvider'=>$dataProviderBanners,

                    'itemView'=>$viewPos3,

                    'enableSorting' => false,

                    'enablePagination' => false,

                    'emptyText' => '',

                    'enablePagination' => false,

                    'enableSorting' => false,

                    'template' => '{items}{pager}',

                        )); 

                ?>

            </div>

        </div>

    

    </div>

    

    <!-- END #sidebar -->

</aside>