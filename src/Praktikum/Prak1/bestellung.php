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
  $h2eins = "Speisekarte";
  $h2zwei = "Warenkorb";

  $pizzabild = "testpizza.jpg";

  $erstepizzaname = "Margherita";
  $erstepizzapreis = "4,00€";

  $zweitepizzaname = "Salami";
  $zweitepizzapreis = "4,50€";

  $drittepizzaname = "Hawaii";
  $drittepizzapreis = "5,50€";

  $formecho = "https://echo.fbi.h-da.de/";

  echo <<<EOT



  <h1>$h1</h1>

  <section id="pizza_auswahl">

    <h2>$h2eins</h2>

    <img src=$pizzabild alt="">
    <p>$erstepizzaname</p>
    <p>$erstepizzapreis</p>

    <img src=$pizzabild alt="">
    <p>$zweitepizzaname</p>
    <p>$zweitepizzapreis</p>

    <img src=$pizzabild alt="">
    <p>$drittepizzaname</p>
    <p>$drittepizzapreis</p>

  </section>

  <section id="warenkorb">

    <h2>$h2zwei</h2>

    <form action=$formecho method="post" accept-charset="UTF-8" id="formular">

    <select name="top3[]" size="3" tabindex="0" id="pizzen_im_warenkorb" multiple>
        <option>$erstepizzaname</option>
        <option>$zweitepizzaname</option>
        <option>$drittepizzaname</option>
    </select>

    <label for="pizzen_im_warenkorb">Pizzen im Warenkorb</label>

    <p>Gesamtpreis: 14,50€</p>

    <p><input type="text" id="adresse" name="adresse" value="" placeholder="Ihre Adresse"></p>
    <input type="button" name="delete_all" value="Alle Löschen">
    <input type="button" name="delete_select" value="Auswahl Löschen">
    <input type="submit" value="Bestellen" >

    </form>

  </section>

  EOT;
?>

</body>
</html>
