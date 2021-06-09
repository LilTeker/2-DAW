class Song {
    constructor(song_id, name, link, type, pl_id, data_frame, active = false) {
        this.song_id = song_id;
        this.name = name;
        this.link = link;
        this.type = type;
        this.pl_id = pl_id;
        this.data_frame = data_frame;
        this.active = active;
    }

    //Song without data frame because soundcloud and other sources don't need it
    constructor(song_id, name, link, type, pl_id, active = false) {
        this.song_id = song_id;
        this.name = name;
        this.link = link;
        this.type = type;
        this.pl_id = pl_id;
        this.active = active;
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
        return "Song_id: " + this.song_id + ", Name: " + this.name +  ", Link: " + this.link +  ", Type:  " + this.type + ", Pl_id: " + this.pl_id + ", Active: " + this.active; 
    }

}