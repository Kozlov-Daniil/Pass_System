<?php
    if($_COOKIE['user'] == 'Охрана'):
?>

<?php elseif($_COOKIE['user'] == ''): ?>
    <nav class="py-2 bg-light border-bottom">
        <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="index.php" class="nav-link link-dark px-2 active" aria-current="page">Главная</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">FAQs</a></li>
            <li class="nav-item"><a href="allpass.php" class="nav-link link-dark px-2">Пользватели(демо)</a></li>
            <li class="nav-item"><a href="addusers.php" class="nav-link link-dark px-2 active" aria-current="page">Одобрение пользователя</a></li>

        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="auth.php" class="nav-link link-dark px-2">Login</a></li>
            <li class="nav-item"><a href="reg.php" class="nav-link link-dark px-2">Sign up</a></li>
        </ul>
        </div>

</nav>

<?php else: ?>
    <nav class="py-2 bg-light border-bottom">
        <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="index.php" class="nav-link link-dark px-2 active" aria-current="page">Главная</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">FAQs</a></li>
            <li class="nav-item"><a href="mypasses.php" class="nav-link link-dark px-2">Мои пропуска</a></li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="auth.php" class="nav-link link-dark px-2"><?=$_COOKIE['user']?></a></li>
            <li class="nav-item"><a href="exit.php" class="nav-link link-dark px-2">Выйти</a></li>
        </ul>
        </div>
</nav>
<?php endif; ?>

