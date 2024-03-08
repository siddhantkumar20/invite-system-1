<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend Display</title>
</head>
<body>

<?php

function fetchDataFromApi() {
    $apiUrl = 'http://127.0.0.1:8000/api/getdata';
    $response = file_get_contents($apiUrl);
    return json_decode($response, true);
}

$data = fetchDataFromApi();

// Display count
echo '<p>Count: ' . $data['count'] . '</p>';

// Display network data
echo '<ul>';
foreach ($data['network'] as $network) {
    echo '<li>' . $network['name'] . ' - ' . $network['description'] . '</li>';
}
echo '</ul>';
?>

</body>
</html>