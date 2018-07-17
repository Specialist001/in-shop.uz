<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
        	<div class="col-sm-4 col-sm-offset-4 padding-right">

				<?php if ($result): ?>
					<p>Вы зарегистрированы!</p>
				<?php else: ?>
					<?php if(isset($errors) && is_array($errors)): ?>
						<ul>
							<?php foreach ($errors as $error): ?>
							<li> - <?= $error; ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<div class="signup-form">
						<h2>Registration</h2>
						<form action="#" method="POST">
							<input type="text" name="name" placeholder="Name" value="<?= $name; ?>" />
							<input type="email" name="email" placeholder="E-mail" value="<?= $email; ?>" />
							<input type="password" name="password"placeholder="Password"value="<?= $password; ?>" />
							<input type="submit" name="submit" class="btn btn-info" value="Sign Up"/>
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