<?php
/* @var $this ContactController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cotizaciones',
);

/*$this->menu=array(
	array('label'=>'Create Contact', 'url'=>array('create')),
	array('label'=>'Manage Contact', 'url'=>array('admin')),
);*/
?>
<!-- Content
================================================== -->

<div class="container" itemscope="" itemtype="http://schema.org/Recipe">
<div class="container">
	<!-- Masonry -->
	<div class="sixteen columns">
    <!-- Headline -->
 		<h1 class="headline">Cotizaciones</h1>
		<span class="line rb margin-bottom-35"></span>
		<div class="clearfix"></div>
        <div id="forms_contact">
            <form id="date_rang" name="date_rang_user" method="post" action="/guia/contact/export" target="_blank">
            <div class="group">
              <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </span>
              <input class="form-control_year_month" id="rangeDate" name="Date[range]" size="16" min="1" type="text" placeholder="Año/Mes" required="required" readonly>
              <div class="btn-group">
                  <input type="submit" value="Exportar Usuarios" />
              </div>
            </div>
            </form>
            <form id="date_rang" name="date_rang_contact" method="post" action="/guia/contact/exportContact" target="_blank">
            <div class="group">
              <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </span>
              <input class="form-control_year_month" id="rangeDate" name="Date[range]" size="16" min="1" type="text" placeholder="Año/Mes" required="required" readonly>
              <div class="btn-group">
                  <input type="submit" value="Exportar Cotizaciones" />
              </div>
            </div>
            </form>
        </div>
<table class="tbl_admin_lead" class="table td display responsive no-wrap" width="100%" cellspacing="2">
            <thead>
                <tr>
                	<th></th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Desde</th>
                    <th>Tipo</th>
                    <th>Micrositio</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                	<th></th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Desde</th>
                    <th>Tipo</th>
                    <th>Micrositio</th>
                </tr>
            </tfoot>
            <tbody>
			<?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'_view',
            )); ?>
            </tbody>
        </table>
        <div class="clearfix"></div>

	</div>
   </div>
  </div>
  <div class="clearfix"></div>
<?php /*?><h1>Contacts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?><?php */?>
