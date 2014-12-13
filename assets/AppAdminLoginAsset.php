<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAdminLoginAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'css/admin/login.css'
	];
	public $js = [];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
		'yii\bootstrap\BootstrapPluginAsset'
	];
}
