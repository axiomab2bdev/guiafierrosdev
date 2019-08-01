<?php

class SidebarEditions extends CWidget {
	
	public $t='';
	
	public function init(){
	}
	
	public function getData(){
		
	}
	
	public function run(){
		
		$dataProviderBanners='';
		if($_GET['t'])
			$t = $_GET['t'];
		elseif($this->t)
			$t = 'r';
		//Lista de Banners
		$dataProviderBanners=new CActiveDataProvider('Banners', 
					array('criteria' => array(
						'condition'=>' t.type_id>8',
						"order" => "t.id ASC",
						'limit'=>30
						),
					'pagination'=>array('pageSize'=>30
					),
				));
				
		//Featured Products Home Guia  AND 
		if($_GET['t']){
		$classifiedsFeateresDataProvider = new 
			CActiveDataProvider('Classifieds',
				array(
					'criteria'=> array(
						'join' => 'join pmd_listings on pmd_listings.id=t.listing_id',
						'condition'=>'custom_15 LIKE "%'.$_GET['t'].'%" AND status="active" AND template_file<>""',
						"order" => "rand()",
						'limit'=>4,
					),
					'pagination'=>array('pageSize'=>4
					),
				)
			);
		}elseif($this->t){
			//define active tags
			$tags = str_replace(', ',',',$this->t);
			$tags = explode(",",$tags); 
			
			foreach($tags as $tag){
				$cond .= 'custom_15 LIKE "%'.$tag.'%"';
				if(end($tags) !== $tag){
					$cond .= ' OR '; // not the last element
				}else{
					$cond .= ' AND '; // last element
				}
			}
			$classifiedsFeateresDataProvider = new 
			CActiveDataProvider('Classifieds',
				array(
					'criteria'=> array(
						'join' => 'join pmd_listings on pmd_listings.id=t.listing_id',
						'condition'=>' '.$cond.' status="active" AND template_file<>""',
						"order" => "rand()",
						'limit'=>4,
					),
					'pagination'=>array('pageSize'=>4
					),
				)
			);
			
		}else{
		$classifiedsFeateresDataProvider = new 
			CActiveDataProvider('Classifieds',
				array(
					'criteria'=> array(
						'join' => 'join pmd_listings on pmd_listings.id=t.listing_id',
						'condition'=>'custom_14=1 AND status="active" AND template_file<>""',
						"order" => "rand()",
						'limit'=>4,
					),
					'pagination'=>array('pageSize'=>4
					),
				)
			);
	
		}
		
		//Categories
		$dataProviderCategories=Categories::model()->getCategoriesEdiciones();
		
		$tag = str_replace('-',' ',$t);		
		$this->render('SidebarWidget',array(
			'dataProviderBanners'=>$dataProviderBanners,
			'classifiedsFeateresDataProvider'=>$classifiedsFeateresDataProvider,
			'dataProviderCategories'=>$dataProviderCategories,
			'tag'=>$tag,
		));
	}
}
?>