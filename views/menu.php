<?php if ($auth): ?>
    Добро пожаловать <?= $username ?> <a href="/auth/logout">[Выход]</a>
<?php else: ?>
    <form action="/auth/login" method="post">
        <input type="text" name="login" placeholder="Login" required>
        <input type="text" name="pass" placeholder="Password" required>
        <input type="submit" name="submit" value="Enter">
    </form>
<?php endif; ?><br>
<a href="/">Главная</a>
<a href="/product/catalog">Каталог</a>
<a href="/basket">Корзина (<span id="count"><?=$count?></span>)</a><br>