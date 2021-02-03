import React, { Fragment} from 'react';
import PropTypes from 'prop-types';

const CounterApp  = ({val}) => { 
    
    //handleAdd
    return( 
        <Fragment>
            <h1>Hola MUndo</h1>
            <p> {val} </p>
        </Fragment>
    );
}

CounterApp.propTypes = {
    val: PropTypes.number
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