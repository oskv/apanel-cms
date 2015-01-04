<?php
namespace app\modules\dynamic_page\controllers;

use app\modules\dynamic_page\models\DynamicPageSearch;
use Yii;
use app\components\ApanelAdminController;
use app\modules\dynamic_page\models\DynamicPage;

class AdminController extends ApanelAdminController
{

	public function actionIndex()
	{
		$searchModel = new DynamicPageSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->get());

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
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
		if(isset($_GET['selection'])){
			DynamicPage::deleteAll(['in', 'id', $_GET['selection']]);
		}
		$this->redirect('index');
	}
}