<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

// SDR: (V3 -3) naamgeving bestand !!!
// Zie opgave: ... gaat hij naar een nieuw te maken formulier, btw_form.php, waarbij ook een template hoort btw_form.html ... !!!

$public_access =  true;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Detail EU BTW Code", $subtitle = "" );
PrintNavbar();

?>
<div class="container">
    <div class="row">
        <?php

        if ( ! is_numeric( $_GET['eub_id']) ) die("Ongeldig argument " . $_GET['eub_id'] . " opgegeven");

        //get data
        $data = GetData( "select * from eu_btw_codes where eub_id=" . $_GET['eub_id'] );
        $row = $data[0]; //there's only
        $output = file_get_contents("templates/edit_btw.html");

        //merge
        $output = MergeViewWithData( $output, $data );
        print $output;
        ?>

    </div>
</div>

</body>
</html>


