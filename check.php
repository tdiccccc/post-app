<form action="" method="post">
  <input type="hidden" name="action" value="submit" />
	<dl>
		<dt>ニックネーム</dt>
		<dd>
      <?php echo htmlspecialchars( $_SESSION['join']['name'], ENT_QUOTES); ?>
    </dd>
		<dt>メールアドレス</dt>
		<dd>
      <?php echo htmlspecialchars( $_SESSION['join']['email'] , ENT_QUOTES);?>
    </dd>
		<dt>パスワード</dt>
		<dd>
			【表示されません】
    </dd> 
		<dt>写真など</dt>
		<dd>
    <img src="../member_picture/<?php echo htmlspecialchars( $_SESSION['join']['image'] , ENT_QUOTES);?>" width="100" alt="" />
    </dd>
    </dl>
	<div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a> 
	| 
	<input type="submit" value="登録する" /></div>

</form>