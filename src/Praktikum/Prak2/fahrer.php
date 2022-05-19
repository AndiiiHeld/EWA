<?php
  header ("Content-type: text/html");
  $title = "Lieferadresse";
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
  $h1 = "Fahrer";
  $h2eins = "Pizza 1";

  $adresse1 = "Max Mustermann, Musterstrasse 1, 12345 Musterstadt";

  $b = "Bestellt";
  $o = "Im Ofen";
  $f = "Fertig";
  $u = "Unterwegs";
  $g = "Geliefert";

  echo <<<EOT

  <h1>$h1</h1>

  <section id="pizza1">

   <h2>$h2eins</h2>

   <p>$adresse1</p>
   <p>
           <input type="radio" id="ordered" name="pizza1" value="">
           <label for="ordered">$b</label>
       </p>
       <p>
           <input type="radio" id="in_oven" name="pizza1" value="">
           <label for="in_oven">$o</label>
       </p>
       <p>
           <input type="radio" id="done" name="pizza1" value="">
           <label for="done">$f</label>
       </p>
       <p>
           <input type="radio" id="on_the_way" name="pizza1" value="">
           <label for="on_the_way">$u</label>
       </p>
       <p>
           <input type="radio" id="delivered" name="pizza1" value="">
           <label for="delivered">$g</label>
       </p>

  </section>

  EOT;
  ?>

</body>
</html>
