<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAdminAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'css/admin/main.css',
		'css/admin/top-nav.css',
		'css/admin/main-nav.css'
	];
	public $js = [
		'js/apanel-plugins.js',
		'js/admin/app.js'
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
		'yii\bootstrap\BootstrapPluginAsset'
	];
}
