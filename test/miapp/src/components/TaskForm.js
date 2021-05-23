import React, {Component} from 'react';

//Export default es igual que la última linea "export default TaskForm"
export default class TaskForm extends Component {

    state = {
        title: "",
        description: ""
    }

    onSubmitMethod = (e) => {
        e.preventDefault();
        console.log(this.state);
        this.props.addTask(this.state.title, this.state.description);
    }
    onChangeMethod = (e) => {
        console.log(e.target.name, e.target.value);
        this.setState({
            [e.target.name] : e.target.value
        })
    } 

    render() {
        return (
            <form onSubmit={this.onSubmitMethod}>
                <input type="text" name="title" placeholder="Escribe una tarea" onChange={this.onChangeMethod}/>
                <br/><br/>
                <textarea name="description" placeholder="Escribe una descripción" onChange={this.onChangeMethod}></textarea>
                <br/><br/>
                <input type="submit" value="Enviar"/>
            </form>
        )
    }

}

//export default TaskForm;