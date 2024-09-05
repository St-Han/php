<?php

include_once "../models/connmyspl.php";
include_once "../../controllers/cluster1.php";

$arr = getdatalist($mysqli);

echo json_encode($arr);
