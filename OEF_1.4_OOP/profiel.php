<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = false;
require_once "lib/autoload.php";
require_once "models/User.php";

PrintHead();
PrintJumbo( $title = "Profiel", $subtitle = "" );
PrintNavbar();
?>

<div class="container">
    <div class="row">

        <?php
        global $dbm;
            //get data
           // $data = GetData( "select * from user where usr_id=" . $_SESSION['user']['usr_id'] );
       // var_dump($_SESSION['user']); die();
        $data = $dbm->GetData( "select * from user where usr_id=" . $_SESSION['user']->getUsrId() );

          /*  $user = $_SESSION['user'];
            $data = [];
            $data[0] = [
                    "usr_id" => $user->getUsrId(),
                    "usr_voornaam" => $user->getUsrVoornaam(),
                    "usr_naam" => $user->getUsrNaam(),
                    "usr_email" => $user->getUsrEmail(),
                    "usr_telefoon" => $user->getUsrTelefoon(),
                ]; */




        //get template
            $output = file_get_contents("templates/profiel.html");

            //add extra elements
            $extra_elements['csrf_token'] = GenerateCSRF( "profiel.php"  );

            //merge
            $output = MergeViewWithData( $output, $data );
            $output = MergeViewWithExtraElements( $output, $extra_elements );
            $output = MergeViewWithErrors( $output,  $ms->GetInputErrors() );
            $output = RemoveEmptyErrorTags( $output, $data );

            print $output;
        ?>

    </div>
</div>

</body>
</html>