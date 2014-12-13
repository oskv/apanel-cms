<?php
namespace app\modules\dynamic_page\controllers;

use Yii;
use app\components\ApanelAdminController;
use app\modules\dynamic_page\models\DynamicPage;

class AdminController extends ApanelAdminController
{

	public function actionIndex()
	{
		$models = DynamicPage::find()->all();
		return $this->render('index', ['models' => $models]);
	}

	public function actionAdd($id=0)
	{
		$id = intval($id);
		if(!$id){
			$model = new DynamicPage();
			$model->loadDefaultValues();
		}else{
			$model = DynamicPage::findOne($id);
			if(empty($model)){
				$model = new DynamicPage();
				$model->loadDefaultValues();
			}
		}

		if(isset($_POST['DynamicPage'])){
			$postData = Yii::$app->request->post('DynamicPage');
			$model->attributes = $postData;
			if(!isset($postData['display'])){
				$model->display = 0;
			}
			if(!isset($postData['public'])){
				$model->public = 0;
			}
			if ($model->validate()) {
				$model->save();
				$this->redirect('index');
			}
		}
		return $this->render('add', ['model' => $model]);
	}

	public function actionEdit($id)
	{
		return $this->actionAdd(intval($id));
	}

	public function actionDelete($id)
	{
		$model = DynamicPage::findOne($id);
		if($model){
			$model->delete();
		}
		$this->redirect('index');
	}

	public function actionDeleteSelected()
	{
		$idDeleted = array();
		if(isset($_POST['DynamicPage'])){

			foreach($_POST['DynamicPage'] as $k=>$val){
				if($val['id']){
					array_push($idDeleted, $k);
				}
			}
			DynamicPage::deleteAll(['in', 'id', $idDeleted]);
		}
		$this->redirect('index');
	}
}