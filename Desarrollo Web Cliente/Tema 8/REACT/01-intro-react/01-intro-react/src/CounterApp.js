import React, { useState } from 'react';
import PropTypes from 'prop-types';

const CounterApp  = ({value}) => { 
    
    //handleAdd
    const handleAdd = (e) => {
        value += 1;
    }



    return( 
        <>
            <h1>CounterApp</h1>
            <h2>{value}</h2>
            <button onClick={  handleAdd }>+1</button>
        </>
    );
}

CounterApp.propTypes = {
    value: PropTypes.number
}

export default CounterApp;


//import React, { Fragment} from 'react';
//import PropTypes from 'prop-types';
//
//const CounterApp = ({val}) => {
//
//    return (
//        <Fragment>
//            <h1>Hola MUndo</h1>
//            <p> {val} </p>
//        </Fragment>
//    );
//
//}
//
//CounterApp.propTypes = {
//    val: propTypes.number
//};
//
//export default CounterApp;