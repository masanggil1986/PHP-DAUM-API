<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row"><h1>PHP Daum API Test Page</h1></div>
        <!-- <div class="row"><input type="text" class="form-control" name="client_id" id="client_id" placeholder="client_id"></div>
        <div class="row"><input type="text" class="form-control" name="redirect_uri" id="redirect_uri" placeholder="redirect_uri"></div> -->
        <div class="row"><textarea id="result" class="form-control" name="result" rows="10" cols="30"></textarea></div>
        <div class="row"><input type="image" onclick="login()" src="/images/login/en/kakao_account_login_btn_medium_narrow.png" alt="카카오계정 로그인"></div>
        <div class="row"><button type="button" onclick="logout()" class="btn btn-dark">Logout</button></div>
    </div>

    <script>
        function login() {
            window.open("/authorize.php", "_blank", "width=500,height=500");
        }

        function logout() {
            window.open("/logout.php", "_blank", "width=500,height=500");
        }

        function showResult(result) {
            document.getElementById('result').value = result;
        }
    </script>
</body>
</html>