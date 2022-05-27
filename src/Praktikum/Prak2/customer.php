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
 * @file     customer.php
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
class Customer extends Page
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
        $SQLabfrage ="Select * from ordered_article";
        $Recordset = $this->_database->query ($SQLabfrage);
        $emptyarray = [];
        $status = [];
        if (!$Recordset)
            throw new Exception("Query failed: ".$_database->error);

        while ($record = $Recordset->fetch_assoc())
            $status = $record['status'];

        $Recordset->free();

        return $emptyarray;

        // to do: fetch data for this view from the database
		// to do: return array containing data
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
        $title ="Fahrer";
        $data = $this->getViewData();
        $this->generatePageHeader($title,"",false); //to do: set optional parameters

        // to do: output view of this page

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

            <section id="pizza2">

             <h2>$h2two</h2>
             <p>
                 <input type="radio" id="ordered2" name="pizza2" value="">
                 <label for="ordered2">$b</label>
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
            $page = new Customer();
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
Customer::main();

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends).
// Not specifying the closing ? >  helps to prevent accidents
// like additional whitespace which will cause session
// initialization to fail ("headers already sent").
//? >