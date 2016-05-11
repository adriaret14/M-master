	<div class="container">
		<div id="menu">
			<ul>
				<?php
				if(!isset($_SESSION['id_usr']))
				{
					echo "Inicia sesion para postear";
				}
				else
				{
					echo '<a id="ancla_m1" href="#"><li>Post new product</li></a>';
				}
				?>
				<a href="#"><img src="<?=APP_W.'pub/img/msg.png'; ?>"><li>Messages</li></a>
				<a href="#"><img src="<?=APP_W.'pub/img/notif.png'; ?>"><li>Alerts</li></a>
				<a href="#"><img src="<?=APP_W.'pub/img/help.png'; ?>"><li>Help</li></a>
			</ul>
		</div>

		<div class="container3">
			
		</div>

		<div id="article2">	
			<div id="creando">
				<h3>Create a new Product Announcement</h3>
				<form class="ajax2" name="formnew" method="post" action="<?=APP_W.'home2/crear'; ?>">
				<input class="ca" type="text" name="t_anun" placeholder="Title"><br>				
				<textarea name="d_anun" rows="10" cols="85">Escribe aquí tus comentarios</textarea><br>
				<input type="text" name="f_anun" placeholder="URL picture"><br>
				<input class="ca" type="text" name="p_anun" placeholder="Price" size="5"><br>
				<input type="button" class="but" id="cancelar" value="Cancel">
				<input type="Submit" class="but" id="crearlo" value="Create">
				</form>
			</div>
		</div>
	</div>