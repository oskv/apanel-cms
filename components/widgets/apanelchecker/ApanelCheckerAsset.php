<?php

namespace app\components\widgets\apanelchecker;

use yii\web\AssetBundle;

class ApanelCheckerAsset extends AssetBundle
{
	public $sourcePath = '@app/components/widgets/apanelchecker/assets';
	//public $basePath = '@webroot';
    //public $baseUrl = '@web';
    /*public $css = [

    ];*/
    public $js = [
		'js/apanelchecker.js'
    ];
	//public $depends = [
	//	'yii\web\YiiAsset'
	//];

	/*public function init()
	{
		$this->sourcePath = '@app/components/widgets/apanelchecker/assets';
		//$this->baseUrl = '@web';
		//$this->basePath = '@webroot';
		$this->js = [
			'apanelchecker.js'
		];
	}*/
}
