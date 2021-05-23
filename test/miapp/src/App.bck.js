import React from 'react';
import './App.css';

/* function HolaMundo(props) {
  return (
    <div id="hello">{props.mytext}</div>
  )
} */

class HolaMundo extends React.Component {

  state = {
    show : true
  }

  toggleShow = () => {
    this.setState({show : !this.state.show});
  }

  render() {
    if (this.state.show === true) {
      return (
        <div id="hello">
          {this.props.mytext}
          <br/><br/>
          <button onClick={this.toggleShow}>Cambiar estado</button>
        </div>
      ) 
    } else {
      return (
        <div>
          <h1>No hay nada para mostrar</h1>
          <button onClick={this.toggleShow}>Cambiar estado</button>
        </div>
      )
    }
  }

}

function App() {
  return (
    <div>This is my component: <HolaMundo mytext="Hola Antonio" /> </div>
  );
}

//const App = () => <div>This is my component: <HolaMundo/> </div>

/*
class App extends React.Component {
  render() {
    return <div>This is my component: <HolaMundo/> </div>
  }
}
*/

export default App;
