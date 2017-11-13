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
<link href="CSS/signin.css" rel="stylesheet">

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
<title>登入系統</title>

</head>

<body>
<div class="text-center">
         <image class="rounded-circle" src="images\123.jpg" alt="my_image2" height="250" width="350" />
    </div>
    
<div style="text-align:center;">

      <form class="form-signin" method="POST" action="login.php">
        <h2 class="form-signin-heading">畢業旅行投票</h2>
        <label for="inputEmail" class="sr-only">學號</label>
        <input type="text" name="SID" id="SID" class="form-control" placeholder="Account" required autofocus>
        <?php echo $msgError; ?>
        <label for="inputPassword" class="sr-only">密碼</label>
        <input type="password" name="SCode" id="SCode" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> 記得我
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="Enter" id="Enter">登入</button>
      </form>

    </div> <!-- /container -->
</body>
</html>


