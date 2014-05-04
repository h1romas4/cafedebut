<?php
/**
 * CafedebutConfigsController
 * 
 * @author Komorikomasha
 */
App::uses('BcPluginAppController', 'Controller');
class CafedebutConfigsController extends BcPluginAppController {
	public $name = 'CafedebutConfigs';
	public $uses = array('Cafedebut.CafedebutConfig');
	public $components = array('BcAuth', 'Cookie', 'BcAuthConfigure', 'RequestHandler');
	public $helpers = array('BcForm');
	public $crumbs = array(
		array('name' => 'プラグイン管理', 'url' => array('plugin' => '', 'controller' => 'plugins', 'action' => 'index')),
		array('name' => 'CafeDebut管理', 'url' => array('plugin' => 'cafedebut', 'controller' => 'cafedebut_configs', 'action' => 'index'))
	);
	public $subMenuElements = array('cafedebut');

	// InstagramコールバックURL
	public $callback = '/admin/cafedebut/cafedebut_configs/callback';

	/**
	 * beforeFilter
	 */
	public function beforeFilter(){
		parent::beforeFilter();
	}

	/**
	 * admin_index
	 */
	public function admin_index() {
		if(!$this->request->data) {
			$data = $this->CafedebutConfig->findExpanded();
			$data['access'] = $this->CafedebutConfig->toValidString($data['access']);
			$data['tel'] = $this->CafedebutConfig->toValidString($data['tel']);
			$data['limitTime'] = $this->CafedebutConfig->toValidString($data['limitTime']);
			$data['closed'] = $this->CafedebutConfig->toValidString($data['closed']);
			$data['facebook'] = $this->CafedebutConfig->toValidString($data['facebook']);
			$data['twitter'] = $this->CafedebutConfig->toValidString($data['twitter']);
			$this->request->data = array('CafedebutConfig' => $data);
		} else {
			$this->store();
			$this->redirect(array('admin'=>true, 'action' => 'index'));
		}
		$this->pageTitle = '基本設定';
	}

	/**
	 * admin_instagram
	 */
	public function admin_instagram() {
		if(!$this->request->data) {
			$data = $this->CafedebutConfig->findExpanded();
			$data['insta_clientid'] = $this->CafedebutConfig->toValidString($data['insta_clientid']);
			$data['insta_client_secret'] = $this->CafedebutConfig->toValidString($data['insta_client_secret']);
			$this->request->data = array('CafedebutConfig' => $data);
		} else {
			$this->store();
			$this->redirect(array('admin'=>true, 'action' => 'instagram'));
		}
		$this->pageTitle = 'Instagram設定';
	}

	/**
	 * admin_authorize
	 */
	public function admin_authorize() {
		$data = $this->CafedebutConfig->findExpanded();
		$authorizeUri = $this->CafedebutConfig->authorize(
				$data['insta_clientid'], Router::url($this->callback, true), $this->Session);
		$this->redirect($authorizeUri);
	}

	/**
	 * admin_callback
	 */
	public function admin_callback() {
		$data = $this->CafedebutConfig->findExpanded();
		$token = $this->CafedebutConfig->getAccessToken(
				$data['insta_clientid']
				, $data['insta_client_secret']
				, Router::url($this->callback, true)
				, $this->params['url']['code']);
		if(isset($token->access_token)) {
			$data['insta_access_token'] = $token->access_token;
			$data['insta_userid'] = $token->user->id;
			$data['insta_result_expire'] = 0;
			$this->request->data = array('CafedebutConfig' => $data);
			$this->store();
			$this->Session->setFlash('Instagramアプリ認証に成功しました。 デバッグモードを無効にしてください。');
		} else {
			$this->Session->setFlash('Instagramアプリ認証に失敗しました。');
		}
		$this->redirect(array('admin'=>true, 'action'=>'instagram'));
	}

	/**
	 * store
	 * 
	 * @param string $action
	 */
	public function store($action = 'index') {
		if($this->CafedebutConfig->validates()) {
			if($this->CafedebutConfig->saveKeyValue($this->request->data)) {
				$this->Session->setFlash('保存しました。');
			} else {
				$this->Session->setFlash('保存に失敗しました。');
			}
		} else {
			$this->Session->setFlash('入力値にエラーがあります。');
		}
	}
}