let array = [1,2,3,4,5,6];

let array2 = [];



function maxElements(array, num = 1) {

    if (num > array.length) {
        return array;
    } else {
        array.sort();
        let i = array.length - 1;
    
        for (let index = 0; index < num; index++) {
            
            array2.push(array[i]);
            i--;       
        }
        return array2.sort();
    }

    
}

alert(maxElements(array,5));