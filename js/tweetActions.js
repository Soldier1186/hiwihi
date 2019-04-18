//ツイート編集・削除
$(function () {
    console.log('tweetAction');

    let $tweetBox;
    let $editor;
    let $tweetText;
    let $tweetContent;
    let $tweetEditorTextArea;
    let initText ='';
    addEvents();

    function addEvents(){
        //「…」クリック時に、サブアクションメニューを開く
        $(document).on('click','.js-openSub',function(){
            console.log('openSub');
            if($tweetBox){
                return;
            }
            $('.subTweetAction').hide();
            $(this).next('.subTweetAction').show();
        });
        //「…」以外をクリック時に、サブアクションメニューを閉じる
        $(document).click(function(event){
            if(!$(event.target).closest('.js-openSub').length) {
                //console.log('外側がクリックされました。');
                $('.subTweetAction').hide();
            }else{
                //console.log('内側がクリックされました。');
            }
        });

        //削除ボタン押した時の処理 ajaxでツイート削除
        $(document).on('click','.js-delete',function(){
            let $tweetBox = $(this).closest('.tweetBox');
            $tweetBox.fadeOut();
            let id = $tweetBox.data('id');
            $.ajax({
                url: 'ajax/deleteTweet.php',
                type: 'POST',
                data: { id: id }
            }).done(function (data) {
                console.log('ajax delete success');
                console.log(data);
            }).fail(function (msg) {
                 console.log('Ajax Error:', msg);
            });
        });

        //編集モードを開く
        $(document).on('click','.js-edit',function(){
            $tweetBox = $(this).closest('.tweetBox');
            $editor =$tweetBox.find('.tweetEditor');
            $tweetText =$tweetBox.find('.tweetText');
            $tweetContent =$tweetBox.find('.tweetContent');
            $tweetEditorTextArea = $tweetBox.find('.tweetEditorTextarea');
            initText = $tweetEditorTextArea.val();

            $editor.show();
            $tweetText.hide();
            $tweetContent.css('width','100%');

        });

        //編集完了
        $(document).on('click','.js-tweetEditComplete',function(){
            let id = $tweetBox.data('id');
            let editedText = $tweetEditorTextArea.val();
            initText = editedText;
            $tweetText.html(editedText.replace(/\r?\n/g, '<br>'));
            $.ajax({
                url: 'ajax/editTweet.php',
                type: 'POST',
                data: { id: id, text: editedText }
            }).done(function (data) {
                console.log('ajax edit success');
                console.log(data);
            }).fail(function (msg) {
                // console.log('Ajax Error:', msg);
            });

            initEditorState();
        });

        //編集キャンセル
        $(document).on('click','.js-tweetEditCancel',function(){
            $tweetBox.find('.tweetEditorText').val(initText);
            initEditorState();
        });
    }

    //エディタ初期化
    function initEditorState() {
        $editor.hide();
        $tweetText.show();
        $tweetContent.css('width','');
        $tweetEditorTextArea.val(initText);
        initText = '';
        $tweetBox = null;
        $editor = null;
        $tweetText = null;
        $tweetContent = null;
    }





});