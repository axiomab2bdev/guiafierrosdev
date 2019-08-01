<?php

class SearchLocations extends CWidget {
	
	public function init(){
	}
	
	public function getData(){
		
	}
	
	public function run(){
		
		$modelLocations='';
		////////Sesiones del Servicio/////////
		$modelLocations = new CActiveDataProvider('Locations');
				
		$this->render('LocationsWidget',array(
			'modelLocations'=>$modelLocations,
		));
	}
}
?>