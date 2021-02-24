<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
//require_once "models/City.php";

PrintHead();
PrintJumbo($title = "Stad OO style" );
?>

<div class="container">
    <div class="row">

        <?php

        if ( ! isset( $_GET['img_id']) ) die("Geen img_id opgegeven");
        if ( ! is_numeric( $_GET['img_id']) ) die("Ongeldig argument " . $_GET['img_id'] . " opgegeven");

        $rows = $this->GetData( "select * from images where img_id=" . $_GET['img_id'] );

        if ( $rows )
        {
        $row = $rows[0];

        //data to object
        $city = new city();
        $city->setImgId( $row['img_id'] );
        $city->setImgFilename( $row['img_filename'] );
        $city->setImgTitle( $row['img_title'] );
        $city->setImgWidth( $row['img_width'] );
        $city->setImgHeight( $row['img_height'] );
        $city->setImgPublished( $row['img_published'] );
        $city->setImgLanId( $row['img_lan_id'] );
        $city->setImgDate( $row['img_date'] );

        //get template
        $template = file_get_contents("templates/column_full.html");

        //merge
        $output = $template;

        //object to array
        $properties = $city->toArray2();
        $properties['img_title'] = $city->getImgTitle();

        foreach( $properties as $key => $value )
        {
            $output = str_replace( "@$key@", $value, $output );
        }

        //output
        print $output;
    }

        ?>

    </div>
</div>

</body>
</html>