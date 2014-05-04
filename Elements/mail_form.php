<?php
/**
 * [PUBLISH] フォーム
 */
$prefix = '';
if(Configure::read('BcRequest.agent')) {
	$prefix = '/'.Configure::read('BcRequest.agentAlias');
}
?>
<?php /* フォーム開始タグ */ ?>
<?php if(!$freezed): ?>
<?php echo $this->Mailform->create('Message', array('url' => $prefix.'/'.$mailContent['MailContent']['name'].'/confirm')) ?>
<?php else: ?>
<?php echo $this->Mailform->create('Message', array('url' => $prefix.'/'.$mailContent['MailContent']['name'].'/submit')) ?>
<?php endif; ?>
<?php /* フォーム本体 */ ?>

<?php echo $this->Mailform->hidden('Message.mode') ?>

<?php $this->BcBaser->element('mail_input', array('blockStart' => 1)) ?>

<?php if ($mailContent['MailContent']['auth_captcha']): ?>
	<?php if (!$freezed): ?>
<div class="auth-captcha clearfix">
		<div class="auth-captcha-figure">
			<?php $this->BcBaser->img($prefix.'/'.$mailContent['MailContent']['name'] . '/captcha', array('alt' => '認証画像', 'class' => 'auth-captcha-image')) ?>
		</div>
		<div class="auth-captcha-contents">
			<?php echo $this->Mailform->text('Message.auth_captcha') ?>
			<p class="auth-captcha-notes">画像の文字を入力してください</p>
			<?php echo $this->Mailform->error('Message.auth_captcha', '入力された文字が間違っています。入力をやり直してください。') ?>
		</div>
</div>
	<?php else: ?>
		<?php echo $this->Mailform->hidden('Message.auth_captcha') ?>
	<?php endif ?>
<?php endif ?>

<?php /* 送信ボタン */ ?>
<div class="submit">
<?php if($this->action=='index'): ?>
	<input name="resetdata" value="　取り消す　" type="reset" class="mod-button" />
<?php endif; ?>
<?php if($freezed): ?>
	<?php echo $this->Mailform->submit('　送信する　', array('div' => false, 'class' => 'mod-button', 'id' => 'MessageSubmit'))  ?>
<?php elseif($this->action != 'submit'): ?>
	<?php echo $this->Mailform->submit('　入力内容を確認する　', array('div' => false, 'class' => 'mod-button', 'id' => 'MessageConfirm'))  ?>
<?php endif; ?>
</div>

<?php echo $this->Mailform->end() ?>