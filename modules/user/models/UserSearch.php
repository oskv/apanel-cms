<?php

namespace app\modules\user\models;

use yii\data\ActiveDataProvider;

class UserSearch extends User
{
	public function rules()
	{
		return [
			[['username'], 'safe'],
		];
	}

	public function search($params)
	{
		$query = self::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 10,
			]
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere(['like', 'username', $this->username]);

		return $dataProvider;
	}
}
