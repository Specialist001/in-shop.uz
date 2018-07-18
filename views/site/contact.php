<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
        	<div class="col-sm-4 col-sm-offset-4 padding-right">

				<?php if ($result): ?>
					<p>Сообщение отправлено!</p>
				<?php else: ?>
					<?php if(isset($errors) && is_array($errors)): ?>
						<ul>
							<?php foreach ($errors as $error): ?>
							<li> - <?= $error; ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

					<div class="signup-form">
						<h2>Обратная связь</h2>
						<h5>Есть вопрос? Напишите нам</h5>
                        <br/>
						<form action="#" method="POST">
                            <p>Ваша почта</p>
							<input type="email" name="userEmail" placeholder="E-mail" value="<?= $userEmail; ?>" />
                            <p>Сообщение</p>
							<input type="text" name="userSubject" placeholder="Тема" value="<?= $userSubject; ?>" />
							<input type="text" name="userText" placeholder="Сообщение" value="<?= $userText; ?>" />
							<input type="submit" name="submit" class="btn btn-info" value="Send"/>
						</form>
					</div>
				<?php endif; ?>
				<br/>
				<br/>
        	</div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>