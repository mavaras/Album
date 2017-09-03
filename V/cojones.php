<html>
<head>
    <meta charset="UTF-8">
    <title>INDEX</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="/Album/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <br>
        <div id="login-form" class="login-form">
            <h2><center>Login</center></h2>
            <form class="form-horizontal" method="POST" action="/Album/index.php?action=login">
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <a onclick="changeForm(1);" href="#">Not registered yet?</a>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <center><button type="submit" class="btn btn-success">Sign in</button><center>
                    </div>
                </div>
            </form>
        </div>
        <div id="register-form" class="register-form hidden">
            <h2><center>Register</center></h2>
            <form class="form-horizontal" method="POST" action="/Album/index.php?action=register">
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="passwordR" name="passwordR" placeholder="Retype Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <a href="#" onclick="changeForm(2);">Login</a>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <center><button type="submit" class="btn btn-success">Sign in</button><center>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src='/Album/js/jquery.js'></script>
    <script src='/Album/js/bootstrap.min.js'></script>
    <script type="text/javascript">
        function changeForm(i) {
            if (i == 1) {
                var loginForm = document.getElementById('login-form');
                var registerForm = document.getElementById('register-form');
                loginForm.className = "login-form hidden";
                registerForm.className = "register-form";
            } else if (i == 2) {
                var loginForm = document.getElementById('login-form');
                var registerForm = document.getElementById('register-form');
                registerForm.className = "login-form hidden";
                loginForm.className = "register-form";
            }   
        }
    </script>
 </body>
 </html>