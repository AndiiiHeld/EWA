<?php
  header ("Content-type: text/html");
  $title = "Bestellliste";
?>

<!DOCTYPE html>
<html lang="de">

<?php
  echo <<< EOT

  <head>
    <meta charset="UTF-8"/>
    <title>$title</title>
  </head>

  EOT;
?>
<body>
<?php
  $h1 = "Bestellung";
  $h2one = "Speisekarte";
  $h2two = "Warenkorb";

  $pizza_image = "testpizza.jpg";

  $firstpizzaname = "Margherita";
  $firstpizzaprice = "4,00€";

  $secondpizzaname = "Salami";
  $secondpizzaprice = "4,50€";

  $thirdpizzaname = "Hawaii";
  $thirdpizzaprice = "5,50€";

  $formecho = "https://echo.fbi.h-da.de/";

  echo <<<EOT



  <h1>$h1</h1>

  <section id="pizza_choice">

    <h2>$h2eins</h2>

    <img src=$pizza_image alt="">
    <p>$firstpizzaname</p>
    <p>$firstpizzaprice</p>

    <img src=$pizza_image alt="">
    <p>$secondpizzaname</p>
    <p>$secondpizzaprice</p>

    <img src=$pizza_image alt="">
    <p>$thirdpizzaname</p>
    <p>$thirdpizzaprice</p>

  </section>

  <section id="shopping_cart">

    <h2>$h2two</h2>

    <form action=$formecho method="post" accept-charset="UTF-8" id="formular">

    <p>Ausgewählte Pizzen werden bestellt. </p>
    <select name="caret[]" size="3" tabindex="0" id="pizzen_in_shopping_cart" multiple>
        <option selected>$firstpizzaname</option>
        <option>$secondpizzaname</option>
        <option>$firstpizzaname</option>
    </select>

    <p>Ausgewählte Pizzen werden bestellt.</p>
    <label for="pizzen_in_shopping_cart">Pizzen im Warenkorb</label>

  EOT;
  $totalprice ="14,50€";
  echo <<<EOT


    <p>Gesamtpreis: $totalprice</p>

    <p><input type="text" id="address" name="address" value="" placeholder="Ihre Adresse"></p>
    <input type="button" name="delete_all" value="Alle Löschen">
    <input type="button" name="delete_select" value="Auswahl Löschen">
    <input type="submit" value="Bestellen" >

    </form>

  </section>

  EOT;
?>

</body>
</html>
