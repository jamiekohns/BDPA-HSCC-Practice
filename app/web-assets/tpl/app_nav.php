
<div style="z-index:1000;" class="container col-md-12 p-0 m-0  sticky-top mb-1">
    <nav class="navbar navbar-expand-md navbar-light bg-light rounded-bottom">

        <!-- <img src="/web-assets/images/BDPA-Flights-Black.jpeg" class="rounded" width="44" height="44" alt="" loading="lazy"> -->
        <span class="navbar-brand mb-0 h1 ml-3">BDPA Flights</span> <!-- Make name Airlanta -->

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?=$_ENV['BASE_URL'] .  '/' ?>">Flights</a>
                <a class="nav-item nav-link" href="/">My Trips</a>
            </div>
            <div class="navbar-nav ml-auto">
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
                            <a class="nav-item nav-link" href="<?= $_ENV['BASE_URL'] .  '/user_signup.php'?>
                            ">Signup</a>
                            <a class="nav-item nav-link" href="<?= $_ENV['BASE_URL'] . '/login.php' ?>">Login</a>
                            <?php
                            break;
                        case 2:
                            ?>
                                <div class="dropdown">

                                    <button class="btn btn-link dropdown-toggle" style="text-decoration: none;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mt-5">Me </span>
                                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-circle mb-0" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                          <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                          <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                        </svg>

                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                        <a class="dropdown-item" href="/dashboard/?tab=tickets">My Tickets</a>
                                        <a class="dropdown-item" href="/dashboard/?tab=tickets">Settings</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/logout.php">Logout</a>
                                    </div>
                                </div>
                            <?php
                            break;
                    }?>
            </div>
        </div>
    </nav>
</div>
