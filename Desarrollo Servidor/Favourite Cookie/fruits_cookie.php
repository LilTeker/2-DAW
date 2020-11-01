<?php
include "functions.php";

cabecera("Galleta de Fruta preferida", "css/style.css", "estilo por defecto", "Galleta de Fruta Preferida");

if (!isset($_COOKIE["fruit"])) {
    setcookie("fruit", "none");
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label><input type="radio" name="fruta" value="naranja"> Naranja</label><br>
    <label><input type="radio" name="fruta" value="manzana"> Manzana</label><br>
    <label><input type="radio" name="fruta" value="melocoton"> Melocotón</label><br>
    <label><input type="radio" name="fruta" value="piña"> Piña</label><br>
    <label><input type="radio" name="fruta" value="fresa"> Fresa</label><br>
    <label><input type="radio" name="fruta" value="kiwi"> Kiwi</label><br>
    <br><input type="submit" value="Seleccionar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["fruta"])){
        setcookie("fruit", $_POST["fruta"]);
        ?>
        <h2><a href="fruits_cookie2.php">Ver resultados</a></h2>
        <?php
    } else {
        echo "<p>Por favor selecciona una fruta</p>";
    }
}


pie(2020-11-1);
?>