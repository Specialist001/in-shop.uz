<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h2>Кабинет пользователя</h2>
            <h3>Привет, <?= $user['name']; ?>! </h3>
            <ul>
                <?php if (User::isAdmin()): ?>
                    <li><a href="/admin">Админ панель</a></li>
                    <li><a href="/cabinet/edit">Редактировать</a></li>
                    <li><a href="/user/history">Список покупок</a></li>
                <?php else: ?>
                    <li><a href="/cabinet/edit">Редактировать</a></li>
                    <li><a href="/user/history">Список покупок</a></li>
                <?php endif; ?>
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>