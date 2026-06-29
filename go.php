<?php
$dataFile = "links.json";

if (!file_exists($dataFile)) {
    die("No links found");
}

$links = json_decode(file_get_contents($dataFile), true);

if (!isset($_GET["c"])) {
    die("Invalid link");
}

$code = $_GET["c"];

if (isset($links[$code])) {
    header("Location: " . $links[$code]);
    exit;
} else {
    echo "Link not found";
}
