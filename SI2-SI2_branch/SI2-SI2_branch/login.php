<html>
    <head>
        <link rel="stylesheet" href="login.css">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    </head>

    <body id="LoginForm">
        <div class="container">
            <div class="login-form">
                <div class="main-div">
                    <div class="panel">
                        <h2>Admin Login</h2>
                        <p>Please enter your email and password</p>
                    </div>
                    <form id="Login" method = "POST" action="login.php">
                        <div class = "form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="email" name = "email" class="form-control" id="inputEmail" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" name = "password" class="form-control" id="inputPassword" placeholder="Password">
                            </div>
                        </div>    
                        <div class="forgot">
                            <a href="reset.html">Forgot password?</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" name = "login_button" class="btn btn-primary"><i class="glyphicon glyphicon-log-in"></i> Login</button>
                        </div>                                          
                    </form>
                    <form action="signup.html">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
        <?php

            if(isset($_POST["login_button"]))
            {
                $email = $_POST["email"];
                $password = $_POST["password"];
                $db_name = "SI2";
                $flag = 1;

                //echo $email."<br>".$password;

                $konekcija = new mysqli('localhost', 'root', '');
                mysqli_select_db($konekcija, $db_name);

                $vlasnici = "SELECT * FROM AUTORIZOVANI_KORISNICI WHERE Nivo_pristupa = 'Vlasnik'";
                $admini = "SELECT * FROM AUTORIZOVANI_KORISNICI WHERE Nivo_pristupa = 'Administrator'";
                $komercijalisti = "SELECT * FROM AUTORIZOVANI_KORISNICI WHERE Nivo_pristupa = 'Komercijalista'";
                $radnici = "SELECT * FROM AUTORIZOVANI_KORISNICI WHERE Nivo_pristupa = 'Radnik'";

                $nizVlasnika = $konekcija->query($vlasnici)->fetch_all();
                $nizAdmina = $konekcija->query($admini)->fetch_all();
                $nizKomercijalista = $konekcija->query($komercijalisti)->fetch_all();
                $nizRadnika = $konekcija->query($radnici)->fetch_all();

                for($i = 0 ; $i < sizeof($nizVlasnika); $i++)
                {
                    if($nizVlasnika[$i][3] == $email && $nizVlasnika[$i][4] == $password)
                    {
                        $flag = 0;
                        header('Location:admin.php');
                    }
                }

                for($i = 0 ; $i < sizeof($nizAdmina); $i++)
                {
                    if($nizAdmina[$i][3] == $email && $nizAdmina[$i][4] == $password)
                    {
                        $flag = 0;
                        header('Location:admin.php');
                    }
                }

                for($i = 0 ; $i < sizeof($nizKomercijalista); $i++)
                {
                    if($nizKomercijalista[$i][3] == $email && $nizKomercijalista[$i][4] == $password)
                    {
                        $flag = 0;
                        header('Location:komercijalista.php');
                    }
                }

                for($i = 0 ; $i < sizeof($nizRadnika); $i++)
                {
                    if($nizRadnika[$i][3] == $email && $nizRadnika[$i][4] == $password)
                    {
                        $flag = 0;
                        header('Location:radnik.php');
                    }
                }



                if($flag)
                {                  
                    echo '<script type="text/javascript">
                        window.onload = function(){
                        alert("Incorrect email address or password.");
                        }
                    </script>';
                }
            }

        ?>
    </body>
</html>