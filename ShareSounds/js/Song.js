class Song {
    //Song data_frame defaults to null cause soundcloud and other sources don't need it
    constructor(song_id, name, link, type, pl_id, active = false) {
        this.song_id = song_id;
        this.name = name;
        this.link = link;
        this.type = type;
        this.pl_id = pl_id;
        this.data_frame = this.constructor.getDataFrame(link, type);
        this.active = active;
        this.icon = this.getIcon(type);
    }

    getHtml(index = 0) {
        let html = `<li class="song-element" title="${this.getName()}" data-listid="${index}">
                        <p>${this.getIcon()} ${this.getName()}<i class="fas fa-trash-alt delete-song" data-listid="${index}"></i></p>
                    </li>`;

        return html;

    }

    static validateUrl(url, type) {

        let bool = false;
        let regExp

        switch (type) {
            case "youtube":
                    regExp = /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
                    if (url.match(regExp)) {
                        bool = true;
                    } else {
                        bool = false;
                    }                
                break;
            case "soundcloud":
                regExp = /^(?:(https?):\/\/)?(?:(?:www|m)\.)?(soundcloud\.com|snd\.sc)\/(.*)$/;
                if (url.match(regExp)) {
                    bool = true;
                } else {
                    bool = false;
                }  
                break;
            default:
                break;
        }

        return bool;
    }

    static getDataFrame(url, type) {

        if (type == "youtube") {

            let regExp = /^https?\:\/\/(?:www\.youtube(?:\-nocookie)?\.com\/|m\.youtube\.com\/|youtube\.com\/)?(?:ytscreeningroom\?vi?=|youtu\.be\/|vi?\/|user\/.+\/u\/\w{1,2}\/|embed\/|watch\?(?:.*\&)?vi?=|\&vi?=|\?(?:.*\&)?vi?=)([^#\&\?\n\/<>"']*)/i;
            let match = url.match(regExp);
            return ((match && match[1].length == 11) ? match[1] : false);

        } else if (type == "soundcloud") {
            return null;
        } else {
            return null;
        }
        return null;
    }

    getStoredDataFrame() {
        return this.data_frame;
    }

    getIcon(type = "default") {

        if (type == "default") {
            return this.icon;
        } else if (type == "youtube") {
            return `<i class="fab fa-youtube"></i>`;
        } else if (type == "soundcloud") {
            return `<i class="fab fa-soundcloud"></i>`;
        }

        return this.icon;
    }

    getSong_id() {
        return this.song_id;
    }

    getName() {
        return this.name;
    }

    getLink() {
        return this.link;
    }

    getType() {
        return this.type;
    }

    getPl_id() {
        return this.pl_id;
    }

    isActive() {
        return this.active;
    }

    setActive(active) {
        this.active = active;
    }



    toString() {
        return "Song_id: " + this.song_id + ", Name: " + this.name + ", Link: " + this.link + ", Type:  " + this.type + ", Pl_id: " + this.pl_id + ", Active: " + this.active;
    }

}