<?php

class Aleatorio {

    public function genera_numero($min, $max) {
        return rand($min, $max);
    }

    public function tirar_dado() {
        return $this->genera_numero(1, 6);
    }

}

?>
