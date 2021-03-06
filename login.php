<?php
//2017/11/08
$msgError = "預設密碼是0000";
if(isset($_POST["Enter"])){
    session_start();
    require_once 'db_func5.php';
    //    $GLOBALS['dbconfig'] = $dbconfig;
    $SID = $_POST["SID"];
    $SCode = $_POST["SCode"];
    $UserData = CheckUserTest($SID, $SCode);
    if($UserData != NULL)
    {
        $_SESSION['authenticated'] = time();
        $redir = 'vote2.php';
        header("Location: $redir");
        exit;
    }
    else
    $msgError = "帳號或密碼錯誤";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-Hant-TW">
<head>

<!-- Required meta tags -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="CSS/signin.css" rel="stylesheet">
    <link href="CSS/titlefont.css" rel="stylesheet">
    <link href="CSS/enterbutton.css" rel="stylesheet">

    <!-- Optional JavaScript -->
    <script src="http://jq22com.qiniudn.com/two.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tween.js/17.1.1/Tween.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    
<title>登入系統</title>

</head>
<body>
    <div style = "text-align:center">
            <canvas style = "border-radius: 0% ; height:320px ; width:100%">
                <script src="JS/yellowDot_T.js"></script>
            </canvas>
    </div>
    
    <div id="app" style="padding:0px auto">
        <div class="text-wrapper">
            <div class="text part1">
    
                <anim-word v-bind:text="word1" @poof="rem"> </anim-word>
            </div>
            <!-- <div class="text part2">
            <anim-word v-bind:text="word2" @poof="rem"></anim-word>
            </div> -->
            <div class="how-to"> <span v-if="clickTimes === 0">Just click a letter~</span><span v-else-if="clickTimes >= 5 && clickTimes < totalLetters">Hahahahaaaa! Click them all!!</span><span v-else-if="clickTimes >= totalLetters">Yeah~ you did it! You did it!!</span><span v-else="v-else">Keep going... </span></div>
        </div>
    </div>
    <div style="text-align:center ; margin: 0px 42%">
      <form class="form-signin" method="POST" action="login.php">
        <input type="text" name="SID" id="SID" class="form-control" placeholder="Account" required autofocus>
        <input type="password" name="SCode" id="SCode" class="form-control" placeholder="Password" required>
        <div class='btn-container'>
        <button class='btn btn--shockwave is-active' type="submit" name="Enter" id="Enter">
            登入
        </button>
    </div>
      </form>

    </div> <!-- /container -->

    

<script src="JS/titlefont.js"></script>
<script src="JS/enterbutton.js"></script>
</body>
</html>