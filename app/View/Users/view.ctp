
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="page-header">

			<h2><?php echo __('Detalles Usuario'); ?></h2>
			</div>
			<ul class="list-group">
				<li class="list-group-item"><strong>ID: </strong><?php echo h($user['User']['id']); ?></li>
				<li class="list-group-item"><strong>Nombre: </strong><?php echo h($user['User']['fullname']); ?></li>
				<li class="list-group-item"><strong>Usuario: </strong><?php echo h($user['User']['username']); ?></li>
				<li class="list-group-item"><strong>Rol: </strong><?php echo h($user['User']['role']); ?></li>
				<li class="list-group-item"><strong>Creado: </strong><?php echo h($user['User']['created']); ?></li>
				<li class="list-group-item"><strong>Modificado: </strong><?php echo h($user['User']['modified']); ?></li>
			</ul>
		</div>
	</div>
</div>
