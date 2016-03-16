<div class="container2">
	<div id="cd1">
		<h3>Create new user</h3>
		<form  class="anu" name="formanu" method="post" action="<?=APP_W.'dashboard/nu'; ?>">
		Nickname<input type="text" id="nick" name="nick">
		Email<input type="text" id="mail" name="mail">
		Password<input type="text" id="pass" name="pass">
		Nombre<input type="text" id="nombre" name="nombre">
		Apellidos<input type="text" id="apellidos" name="apellidos">
		Telefono<input type="text" id="telf" name="telf">
		Ciudad<input type="text" id="ciudad" name="ciudad"><br>
		Tipo<br><input type="text" id="tipo" name="tipo">
		<input type="Submit" id="ins" value="New user">
		</form>
	</div>
	<div id="cd2">
		<h3>Delete user</h3>
		<form  class="adu" name="formadu" method="post" action="<?=APP_W.'dashboard/du'; ?>">
		Nickname of the user to delete<input type="text" id="uusearch" name="dusearch">
		<input type="Submit" id="del" value="Delete user">
		</form>
	</div>
	<div id="cd3">
		<h3>Update user</h3>
		<form  class="auu" name="formauu" method="post" action="<?=APP_W.'dashboard/uu'; ?>">
		Nickname of the user to update<input type="text" id="uusearch" name="uusearch">
		<hr>
		Nickname<input type="text" id="nick" name="nick">
		Email<input type="text" id="mail" name="mail">
		Password<input type="text" id="pass" name="pass">
		Nombre<input type="text" id="nombre" name="nombre">
		Apellidos<input type="text" id="apellidos" name="apellidos">
		Telefono<input type="text" id="telf" name="telf">
		Ciudad<input type="text" id="ciudad" name="ciudad"><br>
		Tipo<br><input type="text" id="tipo" name="tipo">
		<input type="Submit" id="upd" value="Update user">
		</form>
	</div>
</div>