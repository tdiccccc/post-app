<?php
  //セッション処理を開始する関数。php文の冒頭に記述する必要がある。
  session_start();

  if (!empty($_POST)){
    //エラー項目の確認
    if ( $_POST['name'] == '') {
      $error['name'] = 'blank';
    }
    if ( $_POST['emai;'] == '') {
      $error['email'] = 'blank';
    }
    if (strlen($_POST['password'] < 4)) {
      $error['password'] = 'length';
    }
    if ( $_POST['password'] == '') {
      $error['password'] = 'blank';
    }
    $filename = $_FILES['image']['name'];
    //inputで指定した[image]のファイルの名前[name]を抽出して、$filenameに格納しています。
    if (!empty($filename)){
      $ext =substr($filename, -3);
      //substrは文字数を数えるファンクション.
      //末尾3文字抽出
      if ($ext !='jpg' && $ext !='gif' && $ext !='png') {
        $error['image'] = 'type';
      }
    }
    if ( empty($error)) {
      $_SESSION['join'] = $_POST;
      $_SESSION['join']['image'] = $image;
      header('Location: check.php');
      exit();
    }
  }
  if ( $_REQUEST['action'] == 'rewrite') {
    $_POST = $_SESSION['join'];
    $error = ['rewrite'] == true;
  }
?>


<p>次のフォームに必要事項を入力してください</p>
<form action="" method="post" enctype="multipart/form-data">
<!-- enctype="multipart/form-data ファイルの送信に必要 -->
	<dl>
		<dt>ニックネーム<span class="required">必須</span></dt>
		<dd><input type="text" name="name" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['name'],ENT_QUOTES); ?>"/></dd>
    <?php if ( $error['name'] == 'blank'):?>
			<p class = "error">*　ニックネームを入力してください</p>
		<?php endif; ?>

		<dt>メールアドレス<span class="required">必須</span></dt>
		<dd><input type="text" name="email" size="35" maxlength="255"/></dd>

		<dt>パスワード<span class="required">必須</span></dt>
		<dd><input type="text" name="password" size="10" maxlength="20"/></dd>

		<dt>写真など</dt>
		<dd>
			<input type="file" name="image" size="35"/>
      <?php if ( $error ['image'] == 'type'):?>
			    <p class="error"> * 写真などは「.gif」または「.jpg」、「.png」の画像を指定してください。</p>
			<?php endif ; ?>
			<?php if ( !empty($error)):?>
			    <p class="error">* 恐れ入りますが、画像を改めて指定してください。</p>
			<?php endif; ?>
		</dd>

    </dl>
	<div><input type="submit" value="入力内容を確認する" /></div>

</form>