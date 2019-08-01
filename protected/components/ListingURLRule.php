<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class ListingURLRule
{
	public $connectionID = "db";

	public function createURL($manager, $route, $params, $ampersand){
		if($route === 'listings/index' || $route === 'classifieds/'){

		}
		return false;
	}

	public function parseUrl($manager, $request, $pathInfo, $rawPathInfo){
		
		
		if(preg_match('%^search_results.php(.*)$%', $pathInfo, $matches) || preg_match('%^search.php(.*)$%', $pathInfo, $matches))
		{
			//echo '/listings/index'.$matches[1];
			return '/listings/index'.$matches[1];
		}
		elseif(preg_match('%^browse_categories.php$%', $pathInfo, $matches))
		{
			return '/categories/index';
		}
		elseif(preg_match('%^browse_locations.php$%', $pathInfo, $matches))
		{
			return '/locations/index';
		}
		elseif(preg_match('%^location\/(.*)$%', $pathInfo, $matches))
		{
			$model = Locations::model()->findByAttributes(array('friendly_url'=>$matches[1]));
			
			if($model===null){
				preg_match('%^location\/(.*)\/$%', $pathInfo, $matches);
				$model = Locations::model()->findByAttributes(array('friendly_url'=>$matches[1]));
				if($model===null){
					return false;
				}
			}
			
			$_GET[lid]=$model->id;
			$_GET[location]=$model->title;
			$_GET[location_description]=$model->description_short;
			$_GET[location_keywords]=$model->keywords;
			return '/listings/index';
		}
		elseif(preg_match('%^category\/products\/(.*)$%', $pathInfo, $matches) || preg_match('%^listings\/index\/categoryProduct\/(.*)\/Classifieds_page\/(.*)$%', $pathInfo, $matches))
		{
			
			$model = Categories::model()->findByAttributes(array('friendly_url'=>$matches[1]));
			if($model===null){
				$piecesUrl = explode("/", $matches[1]);
				if(preg_match('%^'.$piecesUrl[0].'\/products\/(.*)$%', $matches[1], $subMatches))
				{
					$subModel = Categories::model()->findByAttributes(array('friendly_url'=>$piecesUrl[1]));
					
					if($subModel===null){
						return false;
					}else
					{
						$_GET[categoryProduct]=$subModel->id;
						return '/listings/index';
					}
				}else
				{return false;}
			}else{
				$_GET['categoryProduct']=$model->id;
				return '/listings/index';
				//return '/categories/view';
			}
		}elseif(preg_match('%^category\/(.*)\/location\/(.*)\/$%', $pathInfo, $matches) || preg_match('%^category\/(.*)\/location\/(.*)$%', $pathInfo, $matches)){
			  $keyword = str_replace('-','+',$matches[1]);
			CController::redirect(Yii::app()->request->baseUrl.'/listings/index?keyword='.$keyword.'&location='.$matches[2]);
			
		}elseif(preg_match('%^category\/(.*)$%', $pathInfo, $matches))
		{
			$model = Categories::model()->findByAttributes(array('friendly_url'=>$matches[1]));
			if($model===null){
				$piecesUrl = explode("/", $matches[1]);
				if(preg_match('%^'.$piecesUrl[0].'\/(.*)$%', $matches[1], $subMatches))
				{
					$subModel = Categories::model()->findByAttributes(array('friendly_url'=>$piecesUrl[1]));
					
					if($subModel===null){
						return false;
					}else
					{
						$_GET[cid]=$subModel->id;
						return '/listings/index';
					}
				}else
				{return false;}
			}else{
				$_GET['cid']=$model->id;
				return '/listings/index';
				//return '/categories/view';
			}
		}
		elseif(preg_match('%^classified\/(.*)-(.*)\.html$%', $pathInfo, $matches))
		{
			$model = Classifieds::model()->findByAttributes(array('id'=>$matches[2]));
			if($model===null){
				return false;
			}else{
				$_GET['id']=$model->id;
				return '/classifieds/view';
			}
		}
		elseif(preg_match('%^(.*)\.html$%', $pathInfo, $matches) || preg_match('%^(.*)\.html\/Classifieds_page\/(.*)$%', $pathInfo, $matches)){
			if(preg_match('%^(.*)\/send-message\.html$%', $pathInfo, $subMatches) || preg_match('%^(.*)\/send-message-friend\.html$%', $pathInfo, $subMatches) || preg_match('%^(.*)\/images\.html$%', $pathInfo, $subMatches) || preg_match('%^(.*)\/documents\.html$%', $pathInfo, $subMatches))
				CController::redirect(Yii::app()->request->baseUrl.'/'.$subMatches[1].'.html');
			elseif(preg_match('%^(.*)\/classifieds\.html$%', $pathInfo, $subMatches))
				CController::redirect(Yii::app()->request->baseUrl.'/'.$subMatches[1].'.html#productos');
			/*elseif(preg_match('%^out-(.*)\.html$%', $pathInfo, $matches))
				$model = Listings::model()->findByPk($matches[1]);*/
			else
				$model = Listings::model()->findByAttributes(array('friendly_url'=>$matches[1]));
			
			if($model===null){
				return false;
			}else{
				if(preg_match('%^(.*)\.html\/Classifieds_page\/(.*)$%', $pathInfo, $matchesPage))
				$_GET['Classifieds_page']=$matchesPage[2];
				$_GET['id']=$model->id;
				return '/listings/view';
			}
		}elseif(preg_match('%^vendor.php$%', $pathInfo, $matches))
		{
			return '/site/vendor';
		}elseif(preg_match('%^members/user_account_add.php$%', $pathInfo, $matches))
		{
			return '/listings/create';
		}elseif(preg_match('%^members/index.php$%', $pathInfo, $matches))
		{
			return '/site/login';
		}elseif(preg_match('%^sitemap.php(.*)$%', $pathInfo, $matches))
		{
			CController::redirect(Yii::app()->request->baseUrl);
		}elseif(preg_match('%^compare.php(.*)$%', $pathInfo, $matches))
		{
			CController::redirect(Yii::app()->request->baseUrl);
		}elseif(preg_match('%^contact.php(.*)$%', $pathInfo, $matches))
		{
			CController::redirect(Yii::app()->request->baseUrl);
		}
		return false;
	}

	
}