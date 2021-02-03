<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
require_once "models/City.php";

PrintHead();
PrintJumbo($title = "Stad OO style" );
?>

<div class="container">
    <div class="row">

        <?php
        $city = new City();
        $city->setImgId($_GET['img_id']);



        if ( ! is_numeric( $city->getImgId()) ) die("Ongeldig argument " . $city->getImgId() . " opgegeven");

        $rows = GetData( "select * from images where img_id=" . $city->getImgId() );

        //get template
        $template = file_get_contents("templates/column_full.html");

        //merge
        foreach ( $rows as $row )
        {
            $output = $template;

            foreach( array_keys($row) as $field )
            {
                $output = str_replace( "@$field@", $row["$field"], $output );
            }
            print $output;
        }

        ?>

    </div>
</div>

</body>
</html>