<?php
namespace app\modules\menu\controllers;

use app\modules\menu\models\Menu;
use app\modules\menu\models\MenuItem;
use Yii;
use app\components\ApanelAdminController;
use yii\helpers\Url;

class AdminController extends ApanelAdminController
{

	public function actionIndex()
	{
		$models = Menu::find()->all();
		return $this->render('index', ['models' => $models]);
	}

	public function actionAdd($id=0)
	{
		$id = intval($id);
		if(!$id){
			$model = new Menu();
		}else{
			$model = Menu::findOne($id);
			if(empty($model)){
				$model = new Menu();
			}
		}

		if(isset($_POST['Menu'])){
			$model->attributes = Yii::$app->request->post('Menu');
			if ($model->validate()) {
				$model->save();
				$this->redirect('index');
			}
		}
		$menuItemsTree = MenuItem::getTree($model->id);
		return $this->render('add', ['model' => $model, 'menuItemsTree' => $menuItemsTree]);
	}

	public function actionEdit($id)
	{
		return $this->actionAdd(intval($id));
	}

	public function actionDelete($id)
	{
		$model = Menu::findOne($id);
		if($model){
			$model->delete();
		}
		$this->redirect('index');
	}

	public function actionDeleteSelected()
	{
		$idDeleted = array();
		if(isset($_POST['Menu'])){

			foreach($_POST['Menu'] as $k=>$val){
				if($val['id']){
					array_push($idDeleted, $k);
				}
			}
			Menu::deleteAll(['in', 'id', $idDeleted]);
		}
		$this->redirect('index');
	}

	public function actionItemAdd($id=0, $id_menu = 0)
	{
		$id = intval($id);

		if(!$id){
			$model = new MenuItem();
			$model->id_menu = $id_menu;
		}else{
			$model = MenuItem::findOne($id);;
			if(empty($model)){
				$model = new MenuItem();
			}
		}
		$model->id_parent = 'id'.$model->id_parent;

		if(isset($_POST['MenuItem'])){
			$postData = Yii::$app->request->post('MenuItem');
			$model->attributes = $postData;
			$model->id_parent = preg_replace("/[^0-9+]/", "", $postData['id_parent'] );
			if(!isset($postData['display'])){
				$model->display = 0;
			}
			if($model->validate()){
				$model->save();
				$this->redirect(array('edit', 'id'=>$model->id_menu));
			}
		}

		return $this->render('item_add', [
			'model' => $model,
			'itemList' => MenuItem::getTreeSelectArr($model->id_menu, $id)
		]);
	}

	public function actionItemEdit($id)
	{
		return $this->actionItemAdd(intval($id));
	}

	public function actionItemDelete($id)
	{
		$model = MenuItem::findOne($id);
		$menuId = $model->id_menu;
		if($model){
			$model->delete();
			MenuItem::deleteAll(['id_parent' => $id]);
		}
		$this->redirect(array('edit', 'id' => $menuId));
	}
}