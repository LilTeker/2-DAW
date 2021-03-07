<?php
class Site
{

  public function printHeader() {

    if (!isset($_SESSION["nombre"])) {
      
      ?>
      <div class="row pt-5">
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
          <a class="navbar-brand" href="http://localhost/Biblioteca/">
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
                    <input type="password" class="form-control" id="contrasenaLogin" name="contrasena">
                  </div>
                  <div id="infoLoginDiv">Los datos son incorrectos</div>
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
                    <label for="contrasenaRegister" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasenaRegister" name="contrasenaRegister">
                  </div>
                  <input type="hidden" name="tipoSolicitud" id="inputRegister" value="inputRegister">
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


    } elseif (isset($_SESSION["nombre"])) {
      if (!$_SESSION["privileges"] == 0) {

        ?>
          <div class="row pt-5">
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
                  <li class="nav-item dropdown align-middle mt-2 px-2 text-white">
                    Buenas <?=$_SESSION["nombre"]?>
                  </li>
                </ul>
                <a href="#" class="btn btn-primary mx-2 my-md-0 my-sm-2"><i class="fa fa-tasks" aria-hidden="true"></i></a>
                <a href="#" class="btn btn-primary mx-2 my-md-0 my-sm-2"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                <a href="scripts/php/logout.php" class="btn btn-primary mx-2">Cerrar Sesión</a>
              </div>
            </nav>
          </div>
        <?php

      } else {

        ?>
          <div class="row pt-5">
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
                  <li class="nav-item dropdown align-middle mt-2 px-2 text-white">
                    Buenas <?=$_SESSION["nombre"]?>
                  </li>
                </ul>
                <a href="#" class="btn btn-primary mx-2 my-md-0 my-sm-2"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                <a href="scripts/php/logout.php" class="btn btn-primary mx-2">Cerrar Sesión</a>
              </div>
            </nav>
          </div>
        <?php

      }
    }
  }

  public function printBody() {
    ?>

    <div class="row">
      <div class="col-md-12 pt-5 pb-4 text-center" id="cabecera">
        <h1>Bienvenido a la Libreria RG</h1>
        <h2>¡Echa un vistazo!, ¡puedes alquilar lo que encuentres!</h2>
      </div>
      <hr>
      <div class="col-sm-12">
        <h4 class="text-center">LIBROS RECOMENDADOS</h4>
        <hr><br>
        <div class="row" id="recomendedBooks">
        </div>
      </div>
      <div class="col-sm-12 text-center py-3" id="searchFormHeader">
        <h4 class="pt-2">BÚSQUEDA DE LIBROS</h4>
      </div>
      <div class="col-sm-12 text-center">
        <form id="searchForm" class="pt-4">
          <div class="row"">
            <div class="col-sm-12 col-md-3">
              <label for="titulo" class="form-label">Titulo:</label>
              <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="titulo" placeholder="El Camino de los Reyes">
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="autor" class="form-label">Autor:</label>
              <input type="text" class="form-control" id="autor" name="autor" aria-describedby="autor"  placeholder="Brandon Sanderson">
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="genero" class="form-label">Genero:</label>
              <select name="genero" class="form-control" id="genero" aria-describedby="genero">
                <option value="genero">Cualquiera</option>
                <option value="COMIC&MANGA">Comics y Mangas</option>
                <option value="FANTASIA">Fantasía</option>
                <option value="HISTORIA">Historia</option>
                <option value="NOVELA_NEGRA">Novela Negra</option>
              </select>
            </div>
            <div class="col-sm-6 col-md-1">
              <label for="puntuacion" class="form-label">Puntuación:</label>
              <input type="number" value="5" class="form-control" min="0" max="5" id="puntuacion" name="puntuacion" aria-describedby="puntuacion">
            </div>
            <div class="col-sm-6 col-md-2">
              <label for="ano" class="form-label">Año:</label>
              <input type="date" class="form-control" id="ano" name="ano" aria-describedby="ano">
            </div>

            <div class="col-sm-12 mt-5">
              <button type="button" class="btn btn-secondary">Buscar</button>
            </div>
          </div>
        </form>
      </div>
      <div id="allBooksContainer">
      
      </div>
    </div>
    
    

    <?php
  }

}
?>