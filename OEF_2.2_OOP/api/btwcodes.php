<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = true;
require_once "../lib/autoload.php";
/*
PrintHead();
PrintJumbo( $title = "Request EU BTW Code", $subtitle = "" );
PrintNavbar(); */
?>

<div class="container">
    <div class="row">

        <?php
            //get data
        $btwData = $container->getDBManager()->GetData( "select * from eu_btw_codes"  );

  echo json_encode($btwData);



            //get template
          //  $output = file_get_contents("../templates/btw_request.html");

            //add extra elements
           // $extra_elements['csrf_token'] = GenerateCSRF( "profiel.php"  );

            //merge

          //  $output = MergeViewWithExtraElements( $output, $extra_elements );


          //  print $output;
        ?>

    </div>
</div>

</body>
</html>
