let apiKey= 've1eixdPMDUjWCZZLp1jeP7VBch9rGxa';
let url = `https://api.giphy.com/v1/gifs/random?&&api_key=${apiKey}`;
let arrGifs = [];

function loadGifs(){
    for (let i = 0; i < 4; i++) {
        fetch(url)
            .then(response => {
                return response.json();
            })
            .then(json => {
                arrGifs.push(json.data.images.original.url);
            })
            .catch(err => console.log(err));
    }
}

function viewGifs() {
    document.getElementById("img1").innerHTML = `<img src="${arrGifs[0]}">`;
    document.getElementById("img2").innerHTML = `<img src="${arrGifs[1]}">`;
    document.getElementById("img3").innerHTML = `<img src="${arrGifs[2]}">`;
    document.getElementById("img4").innerHTML = `<img src="${arrGifs[3]}">`;
}



    loadGifs();
    viewGifs();