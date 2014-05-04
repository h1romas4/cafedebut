<?php
/**
 * メールフォーム確認ページ
 */
$this->BcBaser->css(array('/mail/css/style', 'admin/jquery-ui/ui.all'), array('inline' => false));
$this->BcBaser->js(array('admin/jquery-ui-1.8.19.custom.min','admin/i18n/ui.datepicker-ja'), false);
if($freezed){
	$this->Mailform->freeze();
}
?>

<?php if($freezed): ?>
<h3 class="contents-head">入力内容をご確認ください。</h3>
<p class="section">入力した内容に間違いがなければ「送信する」ボタンをクリックしてください。</p>
<?php endif ?>

<div class="section">
<?php $this->BcBaser->flash() ?>
	<div class="mail-confirm">
		<?php $this->BcBaser->element('mail_form') ?>
	</div>
</div>
