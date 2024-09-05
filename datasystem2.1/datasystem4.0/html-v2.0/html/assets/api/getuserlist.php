<?php

include_once "../models/connmyspl.php";
include_once "../../controllers/getuserlist.php";

$arr = getuserlist($mysqli);

echo json_encode($arr);
