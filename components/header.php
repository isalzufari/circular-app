<header>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/index.php"><b>Circular</b></a>    
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart.php">Cart</a>
                    </li>
                    
                    <?php   
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }
                        if(isset($_SESSION['status'])) {
                            ?> 
                            <li class="nav-item">
                                <a class="nav-link" href="#"><?php echo $_SESSION['nama_user']?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout.php">Logout</a>
                            </li>
                            <?php
                        } else {
                            ?> 
                            <li class="nav-item">
                                <a class="nav-link" href="/login.php">Login</a>
                            </li>
                            <?php
                        }
                    ?>
                </ul>
        </div>
    </nav>
</header>