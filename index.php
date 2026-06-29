<?php
$dataFile = "links.json";

if (!file_exists($dataFile)) {
    file_put_contents($dataFile, json_encode([]));
}

$links = json_decode(file_get_contents($dataFile), true);

// Create short link
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $url = trim($_POST["url"]);

    $code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 6);

    $links[$code] = $url;

    file_put_contents($dataFile, json_encode($links));

    $short = "https://" . $_SERVER["HTTP_HOST"] . "/go.php?c=" . $code;

    echo "<h3>Short Link Created:</h3>";
    echo "<a href='$short'>$short</a>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Short Link Generator</title>
</head>
<body>
    <h2>Enter Long URL</h2>

    <form method="POST">
        <input type="url" name="url" placeholder="https://example.com" required style="width:300px;">
        <button type="submit">Generate</button>
    </form>
</body>
</html>
