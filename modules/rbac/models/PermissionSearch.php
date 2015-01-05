<?php
namespace app\modules\rbac\models;

use Yii;
use yii\data\ActiveDataProvider;

class PermissionSearch extends AuthItem
{

	public function rules()
	{
		return [
			[ ['name','description'], 'safe']
		];
	}

	public function attributeLabels()
	{
		$auth = Yii::$app->authManager;
		$attributes =  [
			'name' => 'Название',
			'description' => 'Описание'
		];

		foreach($auth->getRoles() as $role){
			$attributes[$role->name] = $role->description;

		}
		return $attributes;
	}

	public function search($params)
	{
		$query = self::find()
					->where(['type' => 2]);

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 15,
			]
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere(['like', 'name', $this->name]);
		$query->andFilterWhere(['like', 'description', $this->description]);

		return $dataProvider;
	}
}