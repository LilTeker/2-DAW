<?php
require ("page.php");

class MapPage extends Page {

    public function displayMap() {
        echo '<div id="map"></div>';
    }

    public function displayScripts() {
        echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6nhU29GIF3bIBtc5T2D_mCOXDDmjDQfc&callback=initMap&libraries=&v=weekly" defer></script>
              <script src="mapJs.js"></script>';
    }

    public function Display()
    {
        echo "<html>\n<head>\n";
        $this->DisplayTitle();
        $this->DisplayKeywords();
        $this->DisplayStyles();
        $this->displayScripts();
        echo "</head>\n<body>\n";
        $this->DisplayHeader();
        $this->DisplayMenu($this->buttons);
        echo $this->content;
        $this->displayMap();
        $this->DisplayFooter();
        echo "</body>\n</html>\n";
    }

}


$contact = new MapPage();

$contact -> content ="<h2>Do you want to know were you can find us?</h2>
<p>Here you can see where are we installed and were you can find us.</p>";

$contact->Display();

?>