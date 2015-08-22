<?php
$filename = './bbs.txt';
$list = file($filename);
if(isset($_POST['submit'])){
    $thread = $_POST['thread'];
    $name = $_POST['name'];
    $body = $_POST['body'];
    $line = $thread.','.$name.",".$body."\n";
    $fp = fopen($filename, "a");  
    //var_dump($fp);
    fwrite($fp, $line);  
    fclose($fp);
    header('location: bbs.php');
    exit;
}
?>

<! DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>掲示板</title>
        <style type="text/css">
        <!--
        body {width: 800px; margin-right: auto; margin-left: auto;}
        #thread { background-color:gray; font-weight:bold; width:100%;
                  margin-bottom: 10px;}
        -->
        </style>
    </head> 
    <body>
        <h2>掲示板</h2>
        <form acion="bbs.php" method="post">
            <dl>
                <dt>スレ名</dt>
                <dd><input name="thread"></dd>
                <dt>名前</dt>
                <dd><input name="name"></dd>
                <dt>内容</dt>
                <dd><textarea name="body" rows="10" cols="60"></textarea></dd>
            </dl>
            <input type="submit" name="submit" value="投稿">
        </form>
        <hr>
        <?php  foreach($list as $value){
        list($v_thread, $v_name, $v_body)  = explode(',', $value);?>
        <div id="thread"><?php echo '■ '.$v_thread;?></div>
        <?php echo '名前：'.$v_name.'<br>内容：'.$v_body.'<br><hr>';
        }?>
    </body>
</html>
