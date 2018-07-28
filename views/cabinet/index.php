<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h2>Кабинет пользователя</h2>
            <h3>Привет, <?= $user['name']; ?>! </h3>
            <ul>
                <li><a href="/cabinet/edit">Редактировать</a></li>
                <li><a href="/user/history">Список покупок</a></li>
                <?php if (User::isAdmin()): ?>
                    <br />
                    <li><a href="/admin">Админ панель</a></li>
                <?php else: ?>

                <?php endif; ?>
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>