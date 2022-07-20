<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/front_end/login_reg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/57c5dcc0a7.js" crossorigin="anonymous"></script>
    <meta charset="UTF--8">
    <title>
        User Login
    </title>
</head>

<body>
    <form method="post" action="test.php">

        <div class="container">
            <div class="login-page">
                <h1>PAGE</h1>
                <input type="text" class="email" id="email" placeholder="Search for songs" name="song"><br>

                <input type="submit" value="Search" class="login" name="search">

            </div>
        </div>
    </form>
</body>

</html>

<?php

if (isset($_POST['search'])) {
    $term = $_POST['song'];
}
$curl = curl_init();

$search = urldecode($term);

curl_setopt_array($curl, [
    CURLOPT_URL => "https://shazam.p.rapidapi.com/search?term=" . $search . "&locale=en-US&offset=0&limit=1",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: shazam.p.rapidapi.com",
        "X-RapidAPI-Key: b15c0784e0msh02700e180ecefc5p19cc28jsn8a35d86e826f"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
echo '<p>' . $response . '</p>'.'<br>';

curl_close($curl);

$result=json_decode($response,true);
echo  $result;

?>