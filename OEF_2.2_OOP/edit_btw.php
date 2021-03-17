<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = false;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Edit EU BTW Code", $subtitle = "" );
PrintNavbar();
?>

<div class="container">
    <div class="row">

        <?php
        //get data
        $data = $container->getDBManager()->GetData( "select * from eu_btw_codes where eub_id=" . $_GET['eub_id'] );

        //get template
        $output = file_get_contents("templates/edit_btw.html");

        //add extra elements
        $extra_elements['csrf_token'] = GenerateCSRF( "edit_btw.php"  );

        //merge
        $output = MergeViewWithData( $output, $data );
        $output = MergeViewWithExtraElements( $output, $extra_elements );
        $output = MergeViewWithErrors( $output, $container->getMessageService()->GetInputErrors() );
        $output = RemoveEmptyErrorTags( $output, $data );

        print $output;
        ?>

    </div>
</div>

</body>
</html>