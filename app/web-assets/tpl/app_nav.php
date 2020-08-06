
<div class="container col-md-11 mt-3 sticky-top mb-1">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark rounded">

        <img src="/web-assets/images/BDPA-Flights-Black.jpeg" class="rounded" width="44" height="44" alt="" loading="lazy">
        <span class="navbar-brand mb-0 h1 ml-3">BDPA Flights</span>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="/">Flights</a>
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

                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Account
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="user_dashboard.php">Dashboard</a>
                                        <a class="dropdown-item" href="#">My Tickets</a>
                                        <a class="dropdown-item" href="logout.php">Logout</a>
                                    </div>
                                </div>
                            <?php
                            break;
                    }?>
            </div>
        </div>
    </nav>
</div>
