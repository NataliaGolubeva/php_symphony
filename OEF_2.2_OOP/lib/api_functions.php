<?php
require_once "autoload.php";

function getBtwCodes(){
global $request_part;
global $container;
    if ($request_part == "btwcodes" )
    {
        $btwcodes = $container->getDBManager()->GetData( "select * from eu_btw_codes") ;
        // ... execute $sql
        print json_encode($btwcodes) ;
    }
}

function getBtwCode($id){
    global $request_part;
    global $container;

    if ( $request_part == "btwcode" )
    {
        $btwcode = $container->getDBManager()->GetData("select * from eu_btw_codes where eub_id=$id");
        if (!$btwcode){
            http_response_code(404);
            $res = [
                "status" => false,
                "message"=> "BTW not found"
            ];
            echo json_encode($res);
        }
        else {
            print json_encode($btwcode) ;

        }

    }
}

function addBtw($data){
    global $request_part;
    global $container;
    $land = $data['eub_land'];
    $code = $data['eub_code'];

    if ($request_part == "btwcodes" )
    {
        $container->getDBManager()->ExecuteSQL("INSERT INTO eu_btw_codes SET eub_land='$land', eub_code='$code'");
        http_response_code(201);

        $res = [
            "status" => true,
            "message" => "BTW successfully added"
        ];
        echo json_encode($res);
    }
}

function updateBtwCode($data, $id) {
    global $request_part;
    global $container;
    $land = $data['eub_land'];
    $code = $data['eub_code'];

    if ($request_part == "btwcode" )
    {
        $container->getDBManager()->ExecuteSQL("UPDATE eu_btw_codes SET eub_land='$land', eub_code='$code' where eub_id=$id ");
        http_response_code(200);

        $res = [
            "status" => true,
            "message" => "BTW successfully updated"
        ];
        echo json_encode($res);
    }
}

function deleteBtwCode($id){
    global $request_part;
    global $container;

    if ($request_part == "btwcode" )
    {
        $container->getDBManager()->ExecuteSQL("DELETE from eu_btw_codes where eub_id=$id ");
        http_response_code(200);

        $res = [
            "status" => true,
            "message" => "BTW is deleted"
        ];
        echo json_encode($res);
    }
}