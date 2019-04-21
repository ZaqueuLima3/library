<div class="container">
	<div class="row  d-flex justify-content-center align-items-center pt-5">
		<div class="col-8">
			<?php if ($logged): ?>
				<?php if ($islogged): ?>
					<script type="text/javascript">window.location.href="./";</script>
				<?php else: ?>
					<div class="alert alert-danger">
						Usuário e/ou Senha errados!
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<form method="POST">
				<div class="form-group">
					<label for="email">E-mail:</label>
					<input type="email" name="email" id="email" class="form-control" />
				</div>
				<div class="form-group">
					<label for="password">Senha:</label>
					<input type="password" name="password" id="password" class="form-control" />
				</div>
				<input type="submit" value="Fazer Login" class="btn btn-default" />
			</form>
		</div>
	</div>
</div>