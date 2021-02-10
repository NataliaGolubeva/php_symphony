<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access =  true;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "BTW Codes in Europa", $subtitle = "" );
PrintNavbar();
?>

<div class="container">
    <div class="row">
        <form method="post">
            <!-- SDR: (V1 -2) link moest volgens de opgave naar "lib/export_btw.php" gaan -->
        <a href="lib/csv_export_functions.php"><button type='button' class='btn btn-dark' name="export">Export CSV</button></a>
        </form>
    </div>
</div>
<?php

// SDR: (V1 -2) hoort in lib/export_btw.php te staan
if(array_key_exists('export', $_POST)) {
    PrintCSVHeader("btw_export");
}
?>


<div class="container">
    <div class="row">
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Land</th>
        <th scope="col">BTW code</th>
        <th scope="col">Edit</th>
    </tr>
    </thead>
    <tbody>

    <?php

    $resultList = [];
    $sql = "SELECT * FROM eu_btw_codes ";
    $data = getData($sql);

    // SDR: (V1 -1) trim gebruiken
    // SDR: (V1 -1) overblijvende spaties omzetten naar underscore

    foreach ($data as $row) {
        echo "
         <tr>
        
        <td><a href='https://nl.wikipedia.org/wiki/" .$row['eub_land'] . " ' target='_blank' >". $row['eub_land'] ." </a></td>
        <td>". $row['eub_code'] ." </td>
        <td><a href=edit_btw.php?eub_id=" . $row['eub_id']  . " ><button type='button' class='btn btn-dark btn-sm'>Edit</button></a></td>       
    </tr>
        ";}

    ?>
    </tbody>
</table>
    </div>
</div>
</body>
</html>