<?php
require '.././libs/Slim/Slim.php';
require_once 'dbHelper.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app = \Slim\Slim::getInstance();
$db = new dbHelper();
$latlong = [];

/**
 * Database Helper Function templates
 */
/*
select(table name, where clause as associative array)
insert(table name, data as associative array, mandatory column names as array)
update(table name, column names as associative array, where clause as associative array, required columns as array)
delete(table name, where clause as array)
*/


// user
$app->get('/user/:id', function($id) {
    global $db;
    $rows = $db->select("tbl_users","userID,userName,phone,dob,city,country,pin,gender,userEmail,address",array('userID' => $id));
    echoResponse(200, $rows);
});

$app->put('/users/:id', function($id) use ($app) {
    $data = json_decode($app->request->getBody());
    $condition = array('userID'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("tbl_users", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "user information updated successfully.";
    echoResponse(200, $rows);
});

// properties
$app->get('/properties/:id', function($id) {
    global $db;
    $rows = $db->select("properties","id,name,gender,price,locality,state,userid,image,address,long_description,link,status_u,type,contact_person",array('userid'=>$id));
    echoResponse(200, $rows);
});

$app->post('/properties', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('name');
    global $db;
    $rows = $db->insert("properties", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Property added successfully.";
    echoResponse(200, $rows);
});

$app->put('/properties/:id', function($id) use ($app) {
    $data = json_decode($app->request->getBody());
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("properties", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Property information updated successfully.";
    echoResponse(200, $rows);
});

$app->get('/incclick/:id', function($id){
    // $data = json_decode($app->request->getBody());
    // $condition = array('id'=>$id);
    // $mandatory = array();
    // global $db;
    // $rows1 = $db->select("properties","click_counter",array('id'=>$id));
    // $rows["data"][0]["click_counter"] + 1;
    // $rows = $db->update("properties", $data, $condition, $mandatory);
    // if($rows["status"]=="success")
    //     $rows["message"] = "Property information updated successfully.";
    // echoResponse(200, $rows);
});

$app->put('/incclick/:id', function($id){
    // $data = json_decode($app->request->getBody());
    // $data = 'click_counter';
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows1 = $db->select("properties","click_counter",array('id'=>$id));
    $data = array("click_counter"=> $rows1["data"][0]["click_counter"] + 1);
    // $rows1 = $db->select("properties","click_counter",array('id'=>$id));
    // $rows["data"][0]["click_counter"] + 1;
    $rows = $db->update("properties", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Property information updated successfully.";
    echoResponse(200, $rows);
});

$app->get('/incred/:id', function($id){
    // $data = json_decode($app->request->getBody());
    // $condition = array('id'=>$id);
    // $mandatory = array();
    // global $db;
    // $rows1 = $db->select("properties","click_counter",array('id'=>$id));
    // $rows["data"][0]["click_counter"] + 1;
    // $rows = $db->update("properties", $data, $condition, $mandatory);
    // if($rows["status"]=="success")
    //     $rows["message"] = "Property information updated successfully.";
    // echoResponse(200, $rows);
});

$app->put('/incred/:id', function($id){
    // $data = json_decode($app->request->getBody());
    // $data = 'click_counter';
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows1 = $db->select("properties","red_counter",array('id'=>$id));
    $data = array("red_counter"=> $rows1["data"][0]["red_counter"] + 1);
    // $rows1 = $db->select("properties","red_counter",array('id'=>$id));
    // $rows["data"][0]["red_counter"] + 1;
    $rows = $db->update("properties", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Property information updated successfully.";
    echoResponse(200, $rows);
});

// $app->get('/incclick/:id', function($id) use($app){
//     global $db;



//     // $rows["data"][0]["click_counter"] +=1;
//     // echoResponse(200, $rows["data"][0]["click_counter"]);
// });


$app->delete('/properties/:id', function($id) {
    global $db;
    $rows = $db->delete("properties", array('id'=>$id));
    if($rows["status"]=="success")
        $rows["message"] = "Property removed successfully.";
    echoResponse(200, $rows);
});

$app->get('/listing', function() { 
    global $db;
    $rows = $db->select("properties","id,name,userid,price,gender,state,locality,image,address,long_description,link,status_u,type,contact_person",array());
    echoResponse(200, $rows);
});
$app->get('/latlong/:latlong', function($latlong) { 
    global $db;
    $ltlg = explode(',', $latlong);
    $rows = $db->select("properties","id,name,lat,lang,price,long_description,link",array());
    // var_dump($rows["data"][0]);
    // die();
    $i=0; $a=array();
    $a = array();
    foreach ($rows["data"] as $row) {
        //var_dump($row["lat"]);
        if ((abs($ltlg[0]-$row["lat"])<=0.01)&&(abs($ltlg[1]-$row["lang"])<=0.01)) {
            // var_dump($row);
            $a[$i]["name"] = $row["name"];
            $a[$i]["long_description"] = $row["long_description"];
            $a[$i]["link"] = $row["link"];
        }    
    }
    //var_dump($a);
    echoResponse(200, $a);
});

$app->get('/listing/:type', function($type) {
    global $db;
    $rows = $db->select("properties","id,name,price,userid,gender,state,image,address,locality,long_description,link,status_u,type,contact_person,type",array('type'=>$type));
    echoResponse(200, $rows);
});

// $app->get('/latlong', function(){ 
//     // $ltlg = explode(',', $latlong);
    
//     global $db;
//     $rows = $db->select("properties","id,name,lat,long",array());
//     // var_dump($rows);
//     // die();
//     // foreach ($rows as $row) {
//     //     if ((abs($ltlg[0]-$ltg[0])<=0.01)&&(abs($ltlg[1]-$ltg[1])<=0.01)) {
//     //         var_dump($row);    
//     //     }

//     // }

//     // if ((abs($ltlg[0]-$ltg[0])<=0.01)&&(abs($ltlg[1]-$ltg[1])<=0.01)) {
//     //     echo "Near";    
//     // }

//     echoResponse(200, $rows);
// });


function echoResponse($status_code, $response) {
    global $app;
    $app->status($status_code);
    $app->contentType('application/json');
    echo json_encode($response,JSON_NUMERIC_CHECK);
}

$app->run();
?>
