<?php
class Site
{


  
  public function printHeader() {


    ?>
    <div class="row pt-3">
			<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
				<a class="navbar-brand" href="#">
					<img src="./img/icons/bookMainIcon.svg" alt="icon" width="40" height="40">
				</a>
				<a class="navbar-brand" href="#">Librería RG</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse text-sm-center text-md-start" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								Noticias
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#">Opción</a></li>
								<li><a class="dropdown-item" href="#">Opción</a></li>
								<li><a class="dropdown-item" href="#">Opción</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								Nosotros
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#">Opción</a></li>
								<li><a class="dropdown-item" href="#">Opción</a></li>
								<li><a class="dropdown-item" href="#">Opción</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								Contacto
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#">Opción</a></li>
								<li><a class="dropdown-item" href="#">Opción</a></li>
								<li><a class="dropdown-item" href="#">Opción</a></li>
							</ul>
						</li>
					</ul>
					<button type="button" data-bs-toggle="modal" data-bs-target="#modalLogIn"
						class="btn btn-primary mx-2 my-md-0 my-sm-2">Log In</button>
					<button type="button" data-bs-toggle="modal" data-bs-target="#modalRegister"
						class="btn btn-primary mx-2">Registro</button>
				</div>
			</nav>
    </div>
    






    <!--Ventas de log in y register, necesarias cuando no se esta registrado-->
    <div class="modal fade" id="modalLogIn" tabindex="-1" aria-labelledby="modalLogInLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLogInLabel">Entra en sesión</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <form id="loginForm">
                <div class="mb-3">
                  <label for="email" class="form-label">Email:</label>
                  <input type="text" class="form-control" id="email" name="email" aria-describedby="email"
                    placeholder="ejemplo@ejemplo.com">
                </div>
                <div class="mb-3">
                  <label for="contrasena" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="contrasena" name="contrasena">
                </div>
                
                <input type="hidden" name="tipoSolicitud" id="inputlogin" value="inputlogin">
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" id="login" class="btn btn-primary">Log In</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="modalRegisterLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalRegisterLabel">Register</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <form id="registerForm">
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nick:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombre"
                    placeholder="hola1234">
                </div>
                <div class="mb-3">
                  <label for="mail" class="form-label">Email:</label>
                  <input type="email" class="form-control" id="mail" name="mail" placeholder="ejemplo@ejemplo.com">
                </div>
                <div class="mb-3">
                  <label for="contrasena" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="contrasena" name="contrasena">
                </div>
                <input type="hidden" name="tipoSolicitud" id="inputregister" value="inputregister">
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" id="register" class="btn btn-primary">Registrarse</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <?php
  }

  









}

?>