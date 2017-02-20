<?php
require_once "index.php";

use Models\Sport\Classifiche as Classifiche;

$id = ( isset($_GET['id']) ) ? $_GET['id'] : 0;
$message = "";

$item = $id ? new Classifiche($id) : new Classifiche();

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

$list = Classifiche::getAll();
echo json_encode(["items" => $list, "message" => $message]);
