<nav class="navbar navbar-expand bg-indigo" style="margin-bottom: 80px;">
    <div class="container">
        <a href="view-items.php" class="navbar-brand">
            <h3>Company_xyz</h3>
        </a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><span class="nav-link">Hi! <?= $_SESSION['username'] ?></span> </li>
            <li class="nav-item"><a href="sign-out.php" class="nav-link">Log out</a></li>
        </ul>
    </div>

</nav>