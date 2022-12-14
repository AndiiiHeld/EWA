<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€
/**
 * Class PageTemplate for the exercises of the EWA lecture
 * Demonstrates use of PHP including class and OO.
 * Implements Zend coding standards.
 * Generate documentation with Doxygen or phpdoc
 *
 * PHP Version 7.4
 *
 * @file     order.php
 * @package  Page Templates
 * @author   Bernhard Kreling, <bernhard.kreling@h-da.de>
 * @author   Ralf Hahn, <ralf.hahn@h-da.de>
 * @version  3.1
 */

// to do: change name 'PageTemplate' throughout this file
require_once './Page.php';

/**
 * This is a template for top level classes, which represent
 * a complete web page and which are called directly by the user.
 * Usually there will only be a single instance of such a class.
 * The name of the template is supposed
 * to be replaced by the name of the specific HTML page e.g. baker.
 * The order of methods might correspond to the order of thinking
 * during implementation.
 * @author   Bernhard Kreling, <bernhard.kreling@h-da.de>
 * @author   Ralf Hahn, <ralf.hahn@h-da.de>
 */
class Order extends Page
{
    // to do: declare reference variables for members
    // representing substructures/blocks



    /**
     * Instantiates members (to be defined above).
     * Calls the constructor of the parent i.e. page class.
     * So, the database connection is established.
     * @throws Exception
     */
    protected function __construct()
    {
        parent::__construct();
        // to do: instantiate members representing substructures/blocks
    }

    /**
     * Cleans up whatever is needed.
     * Calls the destructor of the parent i.e. page class.
     * So, the database connection is closed.
     */
    public function __destruct()
    {
        parent::__destruct();
    }

    /**
     * Fetch all data that is necessary for later output.
     * Data is returned in an array e.g. as associative array.
	 * @return array An array containing the requested data.
	 * This may be a normal array, an empty array or an associative array.
     */
    protected function getViewData():array
    {
        $SQLabfrage ="Select article_id, name, picture, price from article";
        $Recordset = $this->_database->query ($SQLabfrage);
        $array = [];
        $status = [];
        if (!$Recordset)
            throw new Exception("Query failed: ".$_database->error);

        $i = 0;
        while ($record = $Recordset->fetch_assoc()){
            $array[$i] = array($record['article_id'], $record['name'], $record['picture'], $record['price']);
            $i++;
        }

        $Recordset->free();

        return $array;
        
    }

    /**
     * First the required data is fetched and then the HTML is
     * assembled for output. i.e. the header is generated, the content
     * of the page ("view") is inserted and -if available- the content of
     * all views contained is generated.
     * Finally, the footer is added.
	 * @return void
     */
    protected function generateView():void
    {
        $title ="Bestellung";
        $data = $this->getViewData();
        $this->generatePageHeader($title,"",false); //to do: set optional parameters

        // to do: output view of this page

        $h1 = "Bestellung";
        $h2one = "Speisekarte";
        $h2two = "Warenkorb";

        $pizza_img = "testpizza.jpg";

        $first_pizza_name = "Margherita";
        $first_pizza_price = "4,00€";

        $second_pizza_name = "Salami";
        $second_pizza_price = "4,50€";

        $third_pizza_name = "Hawaii";
        $third_pizza_price = "5,50€";

        $formecho = "https://echo.fbi.h-da.de/";

        $price_sum ="14,50€";

        echo <<<EOT
            <h1>$h1</h1>

            <section id="pizza_choice">

            <h2>$h2one</h2>
        EOT;

        $i = 0;
        while($i < sizeof($data)){

            $pizzaname= $data[$i][1];
            $pizzapicture = $data[$i][2];
            $pizzaprice = $data[$i][3];

            echo <<<EOT
                <img src=$pizzapicture alt="">
                <p>$pizzaname</p>
                <p>$pizzaprice €</p>
            EOT;
            $i++;

        }

        echo <<<EOT

          <section id="shopping_cart">



            <form action=$formecho method="post" accept-charset="UTF-8" id="formular">

            <fieldset>
            <legend>$h2two</legend>
            <p>Ausgewählte Pizzen werden bestellt. </p>
            <select name="shopping_cart[]" size="3" tabindex="0" id="pizza_shopping_cart" multiple>
                <option>$first_pizza_name</option>
                <option>$second_pizza_name</option>
                <option>$third_pizza_name</option>
            </select>

            <p>Ausgewählte Pizzen werden bestellt. </p>
            <label for="pizza_shopping_cart">Pizzen im Warenkorb</label>


            <p>Gesamtpreis: $price_sum</p>

            <p><input type="text" id="address" name="address" value="" placeholder="Ihre Adresse" required></p>
            <input type="button" name="delete_all" value="Alle Löschen">
            <input type="button" name="delete_select" value="Auswahl Löschen">
            <input type="submit" value="Bestellen" >
            </fieldset>
            </form>

          </section>

          EOT;
        $this->generatePageFooter();
    }

    /**
     * Processes the data that comes via GET or POST.
     * If this page is supposed to do something with submitted
     * data do it here.
	 * @return void
     */
    protected function processReceivedData():void
    {
        parent::processReceivedData();
        // to do: call processReceivedData() for all members
    }

    /**
     * This main-function has the only purpose to create an instance
     * of the class and to get all the things going.
     * I.e. the operations of the class are called to produce
     * the output of the HTML-file.
     * The name "main" is no keyword for php. It is just used to
     * indicate that function as the central starting point.
     * To make it simpler this is a static function. That is you can simply
     * call it without first creating an instance of the class.
	 * @return void
     */
    public static function main():void
    {
        try {
            $page = new Order();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            //header("Content-type: text/plain; charset=UTF-8");
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

// This call is starting the creation of the page.
// That is input is processed and output is created.
Order::main();

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends).
// Not specifying the closing ? >  helps to prevent accidents
// like additional whitespace which will cause session
// initialization to fail ("headers already sent").
//? >
