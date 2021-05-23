import React, {Component} from 'react';
import PropTypes from "prop-types";

import Task from "./Task";

class Tasks extends Component {
    render() {
        return this.props.tasks.map(task => <Task deleteTask={this.props.deleteTask} checkDone={this.props.checkDone} key={task.id} task={task}/>)
    }
}

Tasks.propTypes = {
    tasks: PropTypes.array.isRequired
}

export default Tasks