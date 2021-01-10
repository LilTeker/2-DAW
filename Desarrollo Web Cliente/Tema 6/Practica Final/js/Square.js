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

    getColor() {
        return this.color;
    }

    getNumber() {
        return this.html;
    }
}