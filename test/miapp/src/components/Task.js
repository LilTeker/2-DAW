import React, {Component} from 'react';
import PropTypes from "prop-types";

import "./Task.css"

class Task extends Component {

    

    StyleCompleted() {
        return {
            fontSize: "20px",
            color: this.props.task.done ? "gray" : "white",
            textDecoration: this.props.task.done ? "line-through" : "none"
        }
    }

    render() {

        const {task} = this.props;

        return(
            <p style={this.StyleCompleted()} className="red">
                {task.title} - 
                {task.description} - 
                {task.done} - 
                {task.id}
                <input onChange={this.props.checkDone.bind(this, task.id)} type="checkbox"/>
                <button onClick={this.props.deleteTask.bind(this, task.id)} style={btnStyle}>X</button>
            </p>
        )
    }
}

Task.propTypes = {

    task : PropTypes.object.isRequired

}

const btnStyle = {
    fontSize: "18px",
    background: "#ea2027",
    color: "#fff",
    border: "none",
    padding: "10px 15px",
    borderRadius: "50%",
    cursor: "pointer"
}

export default Task;