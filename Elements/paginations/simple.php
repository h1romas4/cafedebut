<?php
/* SVN FILE: $Id$ */
/**
 * [PUBLISH] ページネーションシンプル
 *
 * PHP versions 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2012, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			baser.views
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
if(empty($paginator)) {
	return;
}
if(!isset($modules)) {
	$modules = 8;
}
?>
<?php $this->Paginator->options = array('url' => $this->passedArgs) ?>
<?php if((int)$this->Paginator->counter(array('format'=>'%pages%')) > 1): ?>
<div class="pagination">
<?php echo $this->Paginator->prev('<', array('class'=>'prev'), null, array('class'=>'disabled')) ?>
<?php echo $this->Html->tag('span', $this->Paginator->numbers(array('separator' => '', 'class' => 'number', 'modulus' => $modules), array('class' => 'page-numbers'))) ?>
<?php echo $this->Paginator->next('>', array('class'=>'next'), null, array('class'=>'disabled')) ?>
</div>
<?php endif; ?>