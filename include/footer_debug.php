<!-- デバッグ用モジュール　
 footerの下に、各ページへのリンク、ワンクリックユーザー切り替え、$_POST,$_GETなどのスーパーグローバル変数を表示する
  -->

<div class="debugArea inner mt2rem">Debug Tool!
    <div style="display: flex; margin-bottom: 30px;">
        <div style="padding-left: 30px;     max-width: 40%;">
            <ul>
                <li><?php echoHeaderLink(PAGE_ABOUT, 'ヒウィッヒヒーとは'); ?></li>
                <li><?php echoHeaderLink(PAGE_TIMELINE, 'タイムライン'); ?></li>
                <li><?php echoHeaderLink(PAGE_USER, 'ユーザーページ'); ?></li>
                <li><?php echoHeaderLink(PAGE_TWEET, 'ツイート'); ?></li>
                <li><?php echoHeaderLink(PAGE_LOGIN, 'ログイン'); ?></li>
                <li><?php echoHeaderLink(PAGE_SIGNUP, '新規登録'); ?></li>
                <li><?php echoHeaderLink(PAGE_PASS_REMINDER, 'パスワードリマインダー'); ?></li>
            </ul>
            <?php
            echo('<br>time:'.time().'<br>');
            echo('<br>$_POST<br>');
            dump($_POST);
            echo('<br>$_SESSION<br>');
            echo('session_id(): '.session_id());
            echo '<br>';
            dump($_SESSION);
            echo('<br>$_COOKIE<br>');
            dump($_COOKIE);
            echo('<br>$_SERVER<br>');
            dump($_SERVER);
            ?>
        </div>
        <div style="padding-left: 30px;">
            <p>ユーザー切り替え</p>
            <ul>
                <?php require_once(dirname(__FILE__).'/../core/db/table/UserTable.php');
                $userIDs = UserTable::getAllUserList(100,'id,name,char_id,email');
                foreach ($userIDs as $item)
                {
                    $uID = $item['id'];
                    $uName = $item['name'];
                    $uCID = $item['char_id'];
                    $uEmail = $item['email'];
                    $linkText = "ID: $uID $uName @$uCID $uEmail";
                    ?>
                    <li>
                        <a href="debugLogin.php?uid=<?php echo $uID ?>">
                            <?php echo $linkText; ?></a>
                    </li>
                    <?php
                }

                ?>
            </ul>
        </div>
    </div>

</div>