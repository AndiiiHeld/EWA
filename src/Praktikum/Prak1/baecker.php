<?php
  header ("Content-type: text/html");
  $title = "Backstatus";
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
  $h1 = "Bäcker";
  $h2eins = "Pizza 1";
  $h2zwei = "Pizza 2";

  $b = "Bestellt";
  $o = "Im Ofen";
  $f = "Fertig";

  echo <<<EOT

  <h1>$h1</h1>

  <section id="pizza1">

    <h2>$h2eins</h2>
   <p>
       <input type="radio" id="bestellt" name="pizza1" value="">
       <label for="bestellt">$b</label>
   </p>
    <p>
       <input type="radio" id="imofen" name="pizza1" value="">
       <label for="imofen">$o</label>
    </p>
    <p>
        <input type="radio" id="fertig" name="pizza1" value="">
        <label for="fertig">$f</label>
    </p>

  </section>

  <section id="pizza2">

    <h2>$h2zwei</h2>
    <p>
        <input type="radio" id="bestellt2" name="pizza2" value="">
        <label for="bestellt">$b</label>
    </p>
    <p>
        <input type="radio" id="imofen2" name="pizza2" value="">
        <label for="imofen">$o</label>
    </p>
    <p>
        <input type="radio" id="fertig2" name="pizza2" value="">
        <label for="fertig">$f</label>
    </p>

  </section>

EOT;
?>

</body>
</html>
