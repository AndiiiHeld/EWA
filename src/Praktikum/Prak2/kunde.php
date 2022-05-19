<?php
  header ("Content-type: text/html");
  $title = "Bestellstatus";
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
  $h1 = "Kunde";
  $h2one = "Pizza 1";
  $h2two = "Pizza 2";

  $b = "Bestellt";
  $o = "Im Ofen";
  $f = "Fertig";
  $u = "Unterwegs";
  $g = "Geliefert";

  echo <<<EOT

  <h1>$h1</h1>

  <section id="pizza1">

    <h2>$h2one</h2>
   <p>
           <input type="radio" id="ordered" name="pizza1" value="">
           <label for="ordered">$o</label>
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

  <section id="pizza2">

    <h2>$h2two</h2>
    <p>
               <input type="radio" id="ordered2" name="pizza2" value="">
               <label for="ordered2">$o</label>
           </p>
           <p>
               <input type="radio" id="in_oven2" name="pizza2" value="">
               <label for="in_oven2">$o</label>
           </p>
           <p>
               <input type="radio" id="done2" name="pizza2" value="">
               <label for="done2">$f</label>
           </p>
           <p>
               <input type="radio" id="on_the_way2" name="pizza2" value="">
               <label for="on_the_way2">$u</label>
           </p>
           <p>
               <input type="radio" id="delivered2" name="pizza2" value="">
               <label for="delivered2">$g</label>
           </p>

  </section>

EOT;
?>

</body>
</html>
