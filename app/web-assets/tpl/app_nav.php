
<div class="container col-md-11 mt-3 sticky-top mb-1">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark rounded">
        <span class="navbar-brand mb-0 h1">BDPA Flights</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#">Book</a>
                <a class="nav-item nav-link" href="#">My Flights</a>

                <?php
                    $session_status = session_status();
                    if(isset($_SESSION['user'])|| isset($_COOKIE['user'])){
                        $status = 2;
                    } else{
                        $status = 1;
                    }
                    switch ($status) {
                        case 0:
                            echo "Session is disabled!";
                            break;
                        case 1:
                            ?>
                            <a class="nav-item nav-link mr-auto" href="user_signup.php
                            ">Signup</a>
                            <a class="nav-item nav-link mr-auto" href="login.php">Login</a>;
                            <?php
                            break;
                        case 2:
                            ?>
                            <a class="nav-item nav-link" href="#">My Account</a>
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Dashboard</a>
                                    <a class="dropdown-item" href="#">My Tickets</a>
                                    <a class="dropdown-item" href="#"></a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-muted" href="logout.php">Logout</a>
                                </div>;
                            <?php
                            break;
                    }?>
            </div>
        </div>
    </nav>
</div>
