<nav>
    <div class="logo">
        <a href="index.php">Authentication System</a>
    </div>
    <ul>
        <li><a class="<?= activeLink('index.php') ?>" href="index.php">Home</a></li>
        <li><a class="<?= activeLink('about.php') ?>" href="about.php">About</a></li>
        <li><a class="<?= activeLink('contact.php') ?>" href="contact.php">Contact</a></li>
        <li><a class="<?= activeLink('dashboard.php') ?>" href="dashboard.php">Dashboard</a></li>
    </ul>
    <ol>
        <li class="login-btn">Login</li>
        <li class="signup-btn">Register</li>
    </ol>
</nav>