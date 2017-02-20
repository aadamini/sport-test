<?php
require_once "index.php";

use Models\Sport\Podio as Podio;

$id = ( isset($_GET['id']) ) ? $_GET['id'] : 0;
$message = "";

$item = $id ? new Podio($id) : new Podio();

if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'del') {
    $item->delete();
}

if (!empty($_POST["item"])) {

    foreach ($_POST["item"] as $k => $v) {
        $item->$k = $v;
    }

    if ($item->validate()) {
        $item->save();
    } else {
        $message = $item->getErrors();
    }
}

$list = Podio::getAll();
echo json_encode(["items" => $list, "message" => $message]);
