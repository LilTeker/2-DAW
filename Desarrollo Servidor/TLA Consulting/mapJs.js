
    function initMap() {
        // The location of Uluru
        const jaen = { lat: 37.763980, lng: -3.791973 };
        // The map, centered at Jaen
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: jaen,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: jaen,
            map: map,
        });
    }
