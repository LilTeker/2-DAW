import React, { Component } from 'react';
import { BrowserRouter, Route, Link } from "react-router-dom";
import './App.css';



/* function App() {
  return (
    <div>
      <h1>Prueba</h1>
    </div>
  );
} */

class App extends Component {

  render() {
    return (
      <div className="row pt-3">
        <BrowserRouter>
        <nav className="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
          <a className="navbar-brand" href="#">
            <img src="img/icon.svg" alt="icon" width="40" height="40" />
          </a>
          <a className="navbar-brand" href="#">Inicio</a>
          <Link></Link>
          <button className="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span className="navbar-toggler-icon"></span>
          </button>

          <div className="collapse navbar-collapse text-sm-center text-md-start" id="navbarSupportedContent">
            

              
              <Link to="/login">Log In</Link>
              <Link to="/register">Registrarse</Link>

              <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                <li className="nav-item dropdown">
                  <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Noticias
							</a>
                  <ul className="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a className="dropdown-item" href="#">Opción</a></li>
                    <li><a className="dropdown-item" href="#">Opción</a></li>
                    <li><a className="dropdown-item" href="#">Opción</a></li>
                  </ul>
                </li>
                <li className="nav-item dropdown">
                  <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Nosotros
							</a>
                  <ul className="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a className="dropdown-item" href="#">Opción</a></li>
                    <li><a className="dropdown-item" href="#">Opción</a></li>
                    <li><a className="dropdown-item" href="#">Opción</a></li>
                  </ul>
                </li>
                <li className="nav-item dropdown">
                  <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Contacto
							</a>
                  <ul className="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a className="dropdown-item" href="#">Opción</a></li>
                    <li><a className="dropdown-item" href="#">Opción</a></li>
                    <li><a className="dropdown-item" href="#">Opción</a></li>
                  </ul>
                </li>
              </ul>
              <button type="button" data-bs-toggle="modal" data-bs-target="#modalLogIn"
                className="btn btn-primary mx-2 my-md-0 my-sm-2">Log In</button>
              <button type="button" data-bs-toggle="modal" data-bs-target="#modalRegister"
                className="btn btn-primary mx-2">Registro</button>
          </div>
        </nav>
        </BrowserRouter>
      </div>
    )
  }
}

export default App;
