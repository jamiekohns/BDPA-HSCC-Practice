
<div style="z-index:3000" class="container col-md-12 p-0 m-0  sticky-top mb-1">
    <nav class="navbar navbar-expand-md navbar-light bg-light rounded-bottom">

        <!-- <img src="/web-assets/images/BDPA-Flights-Black.jpeg" class="rounded" width="44" height="44" alt="" loading="lazy"> -->
        <span class="navbar-brand mb-0 h1 ml-3">BDPA Flights</span> <!-- Make name Airlanta -->
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="/">Flights</a>
                <a class="nav-item nav-link" href="/">My Trips</a>
            </div>
            <div class="navbar-nav">
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
                            <a class="nav-item nav-link" href="user_signup.php
                            ">Signup</a>
                            <a class="nav-item nav-link" href="login.php">Login</a>
                            <?php
                            break;
                        case 2:
                            ?>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
