<div class="well">
<h2>perfil de usuario</h2><br>
	<d1>
	<dt>Nombre</dt>
	<dd><?=$user->first_name?>&nsbp;</dd>
	<br> 
	<dt>Apellido</dt>
	<dd><?=$user->apellido?>&nsbp;</dd>
	<br> 
	<dt>correo</dt>
	<dd><?=$user->email?>&nsbp;</dd>
	<br> 
	<dt>Habilitado</dt>
	<dd><?=$user->act?'SI':'no'?>&nsbp;</dd>
	<br> 
	
	
	</d1>
	
</div>