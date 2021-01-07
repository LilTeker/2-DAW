class square {
    constructor(name, html) {
        this.name = name;
        this.html = html;
        this.color = "white";
    }

    display(parent) {

        let newDiv = document.createElement("div");
        newDiv.setAttribute("name", this.name);
        newDiv.setAttribute("class", "square");
        newDiv.innerText = this.html;
        newDiv.style.backgroundColor = this.color;

        parent.appendChild(newDiv);

    }

    setColor(color) {
        this.color = color;
    }
}

/*
    let input = prompt("Escriba el nombre del input al que va referido");

    let newLabel = document.createElement("label");
    newLabel.setAttribute("for", input);
    newLabel.innerText = input;

    //Busco el input y añado el label encima de el
    let targetInput = document.querySelector(`input[name=${input}]`);

    targetInput.parentNode.insertBefore(newLabel, targetInput);
    */