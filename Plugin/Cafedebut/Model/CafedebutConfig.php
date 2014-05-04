<?php
/**
 * CafedebutConfig
 * 
 * @author Komorikomasha
 */
class CafedebutConfig extends BcPluginAppModel {
	public $name = 'CafedebutConfig';
	public $plugin = 'Cafedebut';
	
	// Instagram 設定
	public $insta_auth_url =
		'https://api.instagram.com/oauth/authorize/?client_id=${CLIENT-ID}&redirect_uri=${REDIRECT-URI}&response_type=code';
	public $insta_access_token_url = 'https://api.instagram.com/oauth/access_token';
	public $insta_images_url = 'https://api.instagram.com/v1/users/${INSTA_USERID}/media/recent?access_token=${INSTA_ACCESS_TOKEN}';
	public $insta_expire_time = 300;

	/**
	 * authorize
	 * 
	 * @param unknown $clientid
	 * @param unknown $redirect
	 * @return unknown
	 */
	public function authorize($clientid, $redirect) {
		$url = str_replace('${CLIENT-ID}' , $clientid, $this->insta_auth_url);
		$url = str_replace('${REDIRECT-URI}' , $redirect, $url);
		return $url;
	}
	
	/**
	 * getAccessToken
	 * 
	 * @param unknown $clientid
	 * @param unknown $client_secret
	 * @param unknown $redirect_uri
	 * @param unknown $code
	 * @return unknown
	 */
	public function getAccessToken($clientid, $client_secret, $redirect_uri, $code) {
		$post = "client_id=$clientid"
			. "&client_secret=$client_secret"
			. "&grant_type=authorization_code" 
			. "&redirect_uri=$redirect_uri"
			. "&code=$code";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->insta_access_token_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$json = @json_decode(curl_exec($ch));
		curl_close($ch);
		return $json;
	}
	
	/**
	 * getInstagramImages
	 * 
	 * @return unknown
	 */
	public function getInstagramImages() {
		$config = $this->findExpanded();
		if(!isset($config['insta_access_token'])) return null;
		// 指定秒数が経過していない場合はキャッシュを利用する。
		if(isset($config['insta_result_json'])) {
			$json = $config['insta_result_json'];
		}
		if(!isset($config['insta_result_expire'])
				|| time() - $config['insta_result_expire'] > $this->insta_expire_time ) {
			$url = str_replace('${INSTA_USERID}' , $config['insta_userid'], $this->insta_images_url);
			$url = str_replace('${INSTA_ACCESS_TOKEN}' , $config['insta_access_token'], $url);
			$conn = curl_init();
			curl_setopt($conn, CURLOPT_URL, $url);
			curl_setopt($conn, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($conn, CURLOPT_TIMEOUT, 3);
			curl_setopt($conn, CURLOPT_HEADER, FALSE);
			$json = @curl_exec($conn);
			curl_close($conn);
			if($json !== false) {
				$config['insta_result_expire'] = time();
			}
		}
		$result = @json_decode($json);
		// レスポンスが不正の場合は次のリクエストで再取得（キャッシュがある場合はそちらを利用）
		// アクセストークン有効期限切れの場合は管理画面から再認証とする
		if(!isset($result->data)) {
			$config['insta_result_expire'] = 0;
			$result->data = array();
		} else {
			$config['insta_result_json'] = $json;
		}
		$this->saveKeyValue($config);
		return $result;
	}
	
	/**
	 * toValidString
	 * 
	 * @param unknown $value
	 */
	public function toValidString($value) {
		return trim("" . $value);
	}
}

