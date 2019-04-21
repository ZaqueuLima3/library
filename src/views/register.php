<div class="container">
	<div class="row d-flex justify-content-center align-items-center pt-5">
		<div class="col-8">
			<h1>Cadastre-se</h1>

			<?php if ($created): ?>
				<?php if ($isCreated): ?>
					<div class="alert alert-success">
						<strong>Parabéns!</strong> Cadastrado com sucesso. <a href="<?php echo BASE_URL; ?>sessions">faça login agora</a>
					</div>
				<?php else: ?>
					<div class="alert alert-warning">
						Este usuário já existe! <a href="<?php echo BASE_URL; ?>sessions" class="alert-link">Faça o login agora</a>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<form method="POST">
				<div class="form-group">
					<label for="username">Nome:</label>
					<input type="text" name="username" id="username" class="form-control" />
				</div>
				<div class="form-group">
					<label for="email">E-mail:</label>
					<input type="email" name="email" id="email" class="form-control" />
				</div>
				<div class="form-group">
					<label for="password">Senha:</label>
					<input type="password" name="password" id="password" class="form-control" />
				</div>
				<input type="submit" value="Cadastrar" class="btn btn-default" />
			</form>
		</div>
	</div>

</div>