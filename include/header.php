
<?php require_once( dirname(__FILE__)."/importCore.php" ); ?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/ress.css">
    <link rel="stylesheet" href="css/mainStyle.css">
    <link rel="stylesheet" href="css/loginForm.css">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/tweet.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="js/toggleMenubar.js"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-37616025-9"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-37616025-9');
	</script>

    
    <title>ﾋｳｨｯﾋﾋｰ</title>
</head>
<body>

<!--    ヘッダー   ヒウィッヒヒーとは/ [ログイン] / マイページ -->
<header>
    <div class="inner">
        <h1>ヒウィッヒヒー</h1>
        <a href="index.php"><img src="img/logo.png" alt="ﾋｳｨｯﾋﾋｰ" class="hiwihi-logo"></a>
        <button class="menubar"><i class="fas fa-bars"></i></button>
        <ul class="nav">
            <li><?php echoHeaderLink(PAGE_ABOUT, 'ﾋｳｨｯﾋﾋｰとは'); ?></li>
            <?php if (Session::isLogin()) : ?>
                <li><?php echoHeaderLink(PAGE_TIMELINE, 'タイムライン'); ?></li>
                <li><?php echoHeaderLink(PAGE_USER, 'マイページ'); ?></li>
                <li><?php echoHeaderLink(PAGE_LOGOUT, 'ログアウト'); ?></li>
                <!--        <li>--><?php //echoHeaderLink(PAGE_TWEET,'ツイート'); ?><!--</li>-->
            <?php else : ?>
                <li><?php echoHeaderLink(PAGE_LOGIN, 'ログイン'); ?></li>
                <li><?php echoHeaderLink(PAGE_SIGNUP, '新規登録'); ?></li>
            <?php endif; ?>
        </ul>
    </div>
</header>