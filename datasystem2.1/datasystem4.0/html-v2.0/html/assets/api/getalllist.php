<?php

include_once "../models/connmyspl.php";
include_once "../../controllers/dataall.php";

$arr = getdatalist($mysqli);

echo json_encode($arr);
