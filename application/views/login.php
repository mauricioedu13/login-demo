<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<form action = "<?= site_url('datos/validar') ?>" method="post" class="form-signin">
	  <img class="mb-4" src="./Signin Template · Bootstrap_files/bootstrap-solid.svg" alt="" width="72" height="72">
	  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
	  <label for="inputEmail" class="sr-only">Email address</label>

	  <input type="email" id="inputEmail" name="id-usuario" class="form-control" placeholder="Email address" required="" autofocus="">
	  <label for="inputPassword" class="sr-only">Password</label>
	  <input type="password" id="inputPassword" name="contra" class="form-control" placeholder="Password" required="">
	  <div class="checkbox mb-3">
	  <div>
		<label>
			<input type="checkbox" value="remember-me"> Remember me
		</label>
  	  </div>
	  <div><label><a href="registrar">Registra</a></label></div>
		
	  </div>
	  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	  <p class="mt-5 mb-3 text-muted">© 2019-2020</p>
	</form>
</div>
