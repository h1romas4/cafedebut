<?php
/**
 * cafedebutテーマヘルパー
 */
class CafedebutHelper extends AppHelper {
	public $helpers = array('BcBaser', 'BcGooglemaps', 'BcHtml', 'Blog.Blog');

    /**
     * GoogleMaps を全てのビューで出力する.
     */
	public function load_googlemaps() {
    	$bcGooglemaps = $this->BcGooglemaps;
    	$bcBaser = $this->BcBaser;
    	$this->BcGooglemaps->mapId = 'map';
    	$this->BcGooglemaps->zoom = 16;
    	$this->BcGooglemaps->title = $this->BcBaser->siteConfig['name'];
    	$address = $this->BcBaser->siteConfig['address'];
    	$this->BcGooglemaps->markerText
    		= '<span class="sitename">'.$this->BcBaser->siteConfig['name'].'</span><br /><span class="address">' . $address . '</span>';;
    	if(!$this->BcGooglemaps->load($address, 400, 275)) {
    		echo '<p>Google Maps を読み込めません。管理画面で正しい住所が設定されているか確認してください。</p>';
    	}
    }

    /**
     * メタタグ用ディスクリプションをビュー状態で分岐して出力.
     */
	public function metaDescription() {
    	if($this->isBlog()) {
    		echo $this->BcHtml->meta('description', trim(strip_tags($this->Blog->getDescription())));
    	} else {
	    	$this->BcBaser->metaDescription();
    	}
    }

    /**
     * ディスクリプションをビュー状態で分岐して出力.
     */
	public function description() {
    	echo strip_tags($this->BcBaser->siteConfig['description']);
    }

    /**
     * タイトルをビュー状態で分岐して出力.
     */
	public function contentsTitle() {
    	$blogBaserHelper = $this->getBlogHelper();
    	// 表示状態判定
    	if($this->isBlog()) {
    		// ブログだったら全てのページでブログタイトルを出力
    		$this->Blog->title();
    	} else {
    		// 固定ページだったら固定ページのタイトルを出力
    		$this->BcBaser->contentsTitle();
    	}
    }
    
    /**
     * ブログヘルパーオブジェクトを返却.
     *
     * @return Ambigous <NULL, BlogBaserHelper>
     */
	public function getBlogHelper() {
    	// BlogBaserHelper を見つける
    	$blogBaserHelper = null;
    	foreach($this->BcBaser->pluginBasers as $helper) {
    		if($helper instanceof BlogBaserHelper) {
    			$blogBaserHelper = $helper;
    			break;
    		}
    	}
    	return $blogBaserHelper;
    }

    /**
     * ブログビューを判定して true を返却する.
     *
     * @return boolean
     */
	public function isBlog() {
    	$blogBaserHelper = $this->getBlogHelper();
    	if($blogBaserHelper != null && $blogBaserHelper->params['controller'] == 'blog') {
    		return true;
    	}
    	return false;
    }
	public function is_mobile() {
		$useragents = array('iPhone', 'Android');
		$pattern = '/' . implode('|', $useragents) . '/i';
		return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
	}
}

