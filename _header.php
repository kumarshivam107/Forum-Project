<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Forum Project</title>
</head>

<body>
<?php
session_start();
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">iDiscuss</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/threadlist.php?cat_id=1">Python</a>
                        <a class="dropdown-item" href="/threadlist.php?cat_id=4">HTML</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/threadlist.php?cat_id=2">CSS</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/contact.php">Contact</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>';
                if (isset($_SESSION['loggedin']) && $_SESSION["loggedin"]==true){
                    echo ' </form>
                    <p style="color:white;" class="mr-2 ml-2">Welcome'.$_SESSION["username"].'</p>
                    <a href="/_logout.php" class="btn btn-primary mx-2">Logout</a>
                </div> 
            </nav>';
                }
                else{
                    echo ' </form>
                    <button class="btn btn-primary mx-2" data-toggle="modal" data-target="#loginModal">Login</button>
                    <button class="btn btn-primary mx-2" data-toggle="modal" data-target="#singupModal">SingUp</button>
                </div>
            </nav>';
                }
           
?>
    <!--************ Singup Modal Starts Here ********************-->
    <div class="modal fade" id="singupModal" tabindex="-1" role="dialog" aria-labelledby="singupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="singupModalLabel">Signup Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/_handleSingup.php" method="POST">
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Your Username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Your Email Id">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Please Confirm Your Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--************ Singup Modal Closes Here ********************-->

    <!--************ Login Modal Starts Here ********************-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="/_loginhandle.php" method="POST">
                        <div class="form-group">
                            <label for="uname">UserName</label>
                            <input type="text" class="form-control" id="email" name="uname"
                                placeholder="Enter Your Email Id">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="lpassword" name="lpassword" placeholder="Enter Your Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--************ Login Modal Closes Here ********************-->
    <?php
    if (isset($_GET["singupSucess"]) && $_GET["singupSucess"]=="true"){
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success</strong> You are Successfully Singup. You May Login Now.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    if (isset($_GET["singupSucess"]) && $_GET["singupSucess"]=="false"){
        echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
        <strong>Error!</strong>Duplicate Account or Password Mismatched.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    if (isset($_GET["login"]) && $_GET["login"]=="false"){
        echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
        <strong>Error!</strong> Invalid Credential
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>