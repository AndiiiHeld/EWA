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
 * @file     PageTemplate.php
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
class Baker extends Page
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
        $array = [];
        $status = [];
        $orderid = [];
        $artid = [];

        $pizza = [];



        $SQLabfrage ="Select * from article";
        $Recordset = $this->_database->query ($SQLabfrage);

        if (!$Recordset)
            throw new Exception("Query failed: ".$_database->error);

        while($record = $Recordset->fetch_assoc()){
            $pizza += array($record['article_id'] => $record['name']);
        }


         $Recordset->free();

        $SQLabfrage ="Select * from ordered_article";
        $Recordset = $this->_database->query ($SQLabfrage);

        if (!$Recordset)
            throw new Exception("Query failed: ".$_database->error);

        $i = 0;
        while ($record = $Recordset->fetch_assoc()){
            $status[$i] = $record['status'];
            $orderid[$i] = $record['ordered_article_id'];
            $artid[$i] = $record['article_id'];

            $array[$i] = array($orderid[$i], $pizza[$artid[$i]] , $status[$i]);

            $i++;
        }

        $i = 0;
        while ($i < sizeof($array)){
        //echo "<p>" .$array[$i][0] ." und " . $array[$i][1] . " und " . $array[$i][2]. "</p>";
        $i++;
        }

        $Recordset->free();

        $SQLabfrage ="Select * from ordered_article";
        $Recordset = $this->_database->query ($SQLabfrage);



        return $array;

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
        $title ="Backstatus";
        $data = $this->getViewData();
        $this->generatePageHeader($title,"",false); //to do: set optional parameters

        // to do: output view of this page

        $h1 = "Bäckerseite";

        $btxt = "Bestellt";
        $otxt = "Im Ofen";
        $ftxt = "Fertig";

        $b = "ordered";
        $o = "in_oven";
        $f = "done";


        echo "<h1>$h1</h1>";

        $i = 0;
        while ($i < sizeof($data)){
            $orderid = $data[$i][0];
            $pizzaname = $data[$i][1];

            $bid = $b . $orderid;
            $oid = $o . $orderid;
            $fid = $f . $orderid;

            if($data[$i][2] == '1'){
                $r1 = "checked";
            }else{
                $r1 = "";
            }

            if($data[$i][2] == '2'){
                $r2 = "checked";
            }else{
                $r2 = "";
            }

            if($data[$i][2] == '3'){
                $r3 = "checked";
            }else{
                $r3 = "";
            }



            $pizzaid = "pizza".$orderid;

             echo <<<EOT

                 <section id=$pizzaid >

                 <h2>Bestellung $orderid Pizza $pizzaname</h2>
                 <p>
                     <input type="radio" id=$bid name=$pizzaid value="1" $r1>
                           <label for=$bid>$btxt</label>
                     </p>
                     <p>
                        <input type="radio" id=$oid name=$pizzaid value="2" $r2>
                        <label for=$oid>$otxt</label>
                     </p>
                     <p>
                        <input type="radio" id=$fid name=$pizzaid value="3" $r3>
                        <label for=$fid>$ftxt</label>
                     </p>

                 </section>

            EOT;

            $i++;
        }
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
            $page = new Baker();
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
Baker::main();

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends).
// Not specifying the closing ? >  helps to prevent accidents
// like additional whitespace which will cause session
// initialization to fail ("headers already sent").
//? >