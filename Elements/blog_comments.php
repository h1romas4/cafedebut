<?php
/**
 * [PUBLISH] ブログコメント一覧
 */
$prefix = '';
if(Configure::read('BcRequest.agent')) {
	$prefix = '/'.Configure::read('BcRequest.agentAlias');
}
?>
<script type="text/javascript">
$(function(){
	loadAuthCaptcha();
	$("#BlogCommentAddButton").click(function(){
		sendComment();
		return false;
	});
});
/**
 * コメントを送信する
 */
function sendComment() {
	var msg = '';
	if(!$("#BlogCommentName").val()){
		msg += 'お名前を入力してください\n';
	}
	if(!$("#BlogCommentMessage").val()){
		msg += 'コメントを入力してください\n';
	}
	<?php if($blogContent['BlogContent']['auth_captcha']): ?>
	if(!$("#BlogCommentAuthCaptcha").val()){
		msg += '画象の文字を入力してください\n';
	}
	<?php endif ?>
	if(!msg){
		$.ajax({
			url: $("#BlogCommentAddForm").attr('action'),
			type: 'POST',
			data: $("#BlogCommentAddForm").serialize(),
			dataType: 'html',
			beforeSend: function() {
				$("#BlogCommentAddButton").attr('disabled', 'disabled');
				$("#ResultMessage").slideUp();
			},
			success: function(result){
				if(result){
					<?php if($blogContent['BlogContent']['auth_captcha']): ?>
					loadAuthCaptcha();
					<?php endif ?>
					$("#BlogCommentName").val('');
					$("#BlogCommentEmail").val('');
					$("#BlogCommentUrl").val('');
					$("#BlogCommentMessage").val('');
					$("#BlogCommentAuthCaptcha").val('');
					var resultMessage = '';
					<?php if($blogContent['BlogContent']['comment_approve']): ?>
					resultMessage = '送信が完了しました。送信された内容は確認後公開させて頂きます。';
					<?php else: ?>
					var comment = $(result);
					comment.hide();
					$("#BlogCommentList").append(comment);
					comment.show(500);
					resultMessage = 'コメントの送信が完了しました。';
					<?php endif ?>
					$("#ResultMessage").html(resultMessage);
					$("#ResultMessage").slideDown();
				}else{
					<?php if($blogContent['BlogContent']['auth_captcha']): ?>
					loadAuthCaptcha();
					<?php endif ?>
					$("#ResultMessage").html('コメントの送信に失敗しました。入力内容を見なおしてください。');
					$("#ResultMessage").slideDown();
				}
			},
			error: function(result){
				alert('コメントの送信に失敗しました。入力内容を見なおしてください。');
			},
			complete: function(xhr, textStatus) {
				$("#BlogCommentAddButton").removeAttr('disabled');
			}
		});
	}else{
		alert(msg);
	}
}
/**
 * キャプチャ画像を読み込む
 */
function loadAuthCaptcha(){

	var src = $("#BlogCommentCaptchaUrl").html()+'?'+Math.floor( Math.random() * 100 );	
	$("#AuthCaptchaImage").hide();
	$("#CaptchaLoader").show();
	$("#AuthCaptchaImage").load(function(){
		$("#CaptchaLoader").hide();
		$("#AuthCaptchaImage").fadeIn(1000);
	});
	$("#AuthCaptchaImage").attr('src',src);

}
</script>

<div id="BlogCommentCaptchaUrl" class="display-none"><?php echo $this->BcBaser->getUrl($prefix.'/blog/blog_comments/captcha') ?></div>

<?php if($blogContent['BlogContent']['comment_use']): ?>
<div id="BlogComment">

	<h4 class="contents-head">Comments</h4>
	
	<div id="BlogCommentList">
	<?php if(!empty($post['BlogComment'])): ?>
		<?php foreach($post['BlogComment'] as $comment): ?>
		<?php $this->BcBaser->element('blog_comment', array('dbData'=>$comment)) ?>
		<?php endforeach ?>
	<?php endif ?>
	</div>

	<?php echo $this->BcForm->create('BlogComment', array('url' => $prefix.'/blog/blog_comments/add/'.$blogContent['BlogContent']['id'].'/'. $post['BlogPost']['id'], 'id' => 'BlogCommentAddForm')) ?>
	
	<div id="comment-form" class="mod-comment-form">
	<dl class="mod-comment-form-dl">
		<dt class="mod-comment-form-dt"><span class="mod-comment-form-bg"><?php echo $this->BcForm->label('BlogComment.name','Name') ?></span></dt>
		<dd class="mod-comment-form-dd"><?php echo $this->BcForm->input('BlogComment.name', array('type' => 'text')) ?></dd>
		<dt class="mod-comment-form-dt"><span class="mod-comment-form-bg"><?php echo $this->BcForm->label('BlogComment.email','E-Mail') ?></span></dt>
		<dd class="mod-comment-form-dd"><?php echo $this->BcForm->input('BlogComment.email', array('type' => 'text', 'size'=>30)) ?>&nbsp;
				<small>※メールは公開されません</small>
		</dd>
		<dt class="mod-comment-form-dt"><span class="mod-comment-form-bg"><?php echo $this->BcForm->label('BlogComment.url','URL') ?></span></dt>
		<dd class="mod-comment-form-dd"><?php echo $this->BcForm->input('BlogComment.url',array('type' => 'text', 'size'=>30)) ?></dd>
		<dt class="mod-comment-form-dt Comment"><span class="mod-comment-form-bg"><?php echo $this->BcForm->label('BlogComment.message','Comment') ?></span></dt>
		<dd class="mod-comment-form-dd Comment"><?php echo $this->BcForm->input('BlogComment.message', array('type' => 'textarea', 'rows' => 10, 'cols' => 60)) ?></dd>
	</dl>

	<?php if($blogContent['BlogContent']['auth_captcha']): ?>
	<div class="auth-captcha clearfix">
		<div class="auth-captcha-figure">
			<img src="" alt="認証画象" class="auth-captcha-image" id="AuthCaptchaImage" style="display:none">
			<?php $this->BcBaser->img('/img/captcha_loader.gif', array('alt' => 'Loading...', 'class' => 'auth-captcha-image', 'id'=>'CaptchaLoader')) ?>
		</div>
		<div class="auth-captcha-contents">
			<?php echo $this->BcForm->text('BlogComment.auth_captcha') ?>
			<p class="auth-captcha-notes">画像の文字を入力してください</p>
		</div>
	</div>
	<?php endif ?>

	<?php echo $this->BcForm->end(array('label'=>'SUBMIT', 'class' => 'mod-button', 'id'=>'BlogCommentAddButton')) ?>
	
	
	<div id="ResultMessage" class="message" style="display:none;text-align:center">&nbsp;</div>
	<!--/#comment-form--></div>
	
</div>
<?php endif ?>