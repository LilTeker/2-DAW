import React, { Component } from 'react';
import { BrowserRouter, Route, Link } from "react-router-dom";
import './App.css';

import tasks from "./sample/tasks.json";
import Tasks from "./components/Tasks";
import TaskForm from "./components/TaskForm";
import Posts from "./components/Posts";

class App extends Component {

  /*Hago esto para guardar tasks como una "variable" en el estado*/
  state = {

    tasks: tasks

  }

  addTask = (title, description) => {
    const newTask = {
      title: title,
      description: description,
      id: this.state.tasks.length,
    }
    this.setState({
      tasks: [...this.state.tasks, newTask]
    });
  }

  deleteTask = (id) => {

    const tasksLeft = this.state.tasks.filter(task => task.id !== id);
    console.log(tasksLeft);
    this.setState({ tasks: tasksLeft });

  }

  checkDone = (id) => {

    const newTasks = this.state.tasks.map(task => {

      if (task.id === id) {
        task.done = !task.done;
      }

      return task;
    });

    this.setState({ tasks: newTasks });

  }

  render() {
    return (
      <div>
        <BrowserRouter>
        <Link to="/">Home</Link>
        <br/>
        <br/>
        <Link to="/posts">Posts</Link>
          <Route exact path="/" render={() => {
            return (
              <div>
                <TaskForm addTask={this.addTask} />
                <Tasks deleteTask={this.deleteTask} checkDone={this.checkDone} tasks={this.state.tasks} />
              </div>
            )
          }}>
          </Route>
          <Route exact path="/posts" component={Posts}/>
        </BrowserRouter>
      </div>
    )
  }

}

export default App;
