<?php
/* SVN FILE: $Id$ */
/**
 * [PUBLISH] メールフォーム
 * 
 * PHP versions 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2012, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			baser.plugins.mail.views
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
$this->BcBaser->css(array('/mail/css/style', 'admin/jquery-ui/ui.all'), array('inline' => false));
$this->BcBaser->js(array('admin/jquery-ui-1.8.19.custom.min','admin/i18n/ui.datepicker-ja'), false);
?>


<div class="section mail-description">
	<?php $this->Mail->description() ?>
</div>

<div class="section">
	<div class="mail-form">
		<?php $this->BcBaser->flash() ?>
		<?php $this->BcBaser->element('mail_form') ?>
	</div>
</div>
