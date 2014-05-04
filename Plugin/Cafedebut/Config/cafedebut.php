<?php
$config['BcApp.adminNavi.cafedebut'] = array(
	'name'	=> 'CafeDebutテーマ設定',
	'contents'	=> array(
		array(
			'name' => '基本設定',
			'url' => array(
				'admin' => true,
				'plugin' => 'cafedebut',
				'controller' => 'cafedebut_configs',
				'action' => 'index')),
		array(
			'name' => 'Instagram設定',
			'url' => array(
				'admin' => true,
				'plugin' => 'cafedebut',
				'controller' => 'cafedebut_configs',
				'action' => 'instagram'))
	));
?>