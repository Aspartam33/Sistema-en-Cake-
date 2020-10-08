<div class="well">
<h2>perfil de usuario</h2><br>
	<d1>
	<dt>Nombre</dt>
	<dd><?=$usuario->first_name;?>&nsbp;</dd>
	<br> 
	<dt>Apellido</dt>
	<dd><?=$usuario->apellido;?>&nsbp;</dd>
	<br> 
	<dt>correo</dt>
	<dd><?=$usuario->email;?>&nsbp;</dd>
	<br> 
	<dt>Habilitado</dt>
	<dd><?=$usuario->act?'SI':'no'?>&nsbp;</dd>
	<br> 
	<dt>Fecha de creacion</dt>
	<dd><?=$usuario->created->nice()?>&nsbp;</dd>
	<br> 
	<dt>Modificado</dt>
	<dd><?=$usuario->modified->nice()?>&nsbp;</dd>
	<br>
	
	</d1>
	
</div>