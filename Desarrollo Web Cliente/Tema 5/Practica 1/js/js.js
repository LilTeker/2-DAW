let obj = {a:1, b:2, c:1};

function orderObject(ognObject) {

    let cloneObj = {...obj};

    let ret = {};

    /*for(let key in cloneObj){                                 ESTE NO LO CREA COMO ARRAY, SI NO COMO STRINGS
        if (ret.hasOwnProperty(cloneObj[key])) {
            ret[cloneObj[key]] += key;
        } else {
            ret[cloneObj[key]] = key;
        }        
    }*/

    for(let key in cloneObj){
        if (ret.hasOwnProperty(cloneObj[key])) {
            ret[cloneObj[key]].push(key);
        } else {
            ret[cloneObj[key]] = [key];
        }        
    }

    return ret;

}

console.log(orderObject(obj));