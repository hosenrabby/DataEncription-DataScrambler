<?php
    include_once "functions.php";
    $task = "encode";
    if (isset($_GET['task']) && $_GET['task'] != "") {
        $task = $_GET['task'];
    }

    $key = "abcdefghijklmnopqrstuvwxyz1234567890";
    if ('key' == $task) {
        $keyOrigianl = str_split($key);
        shuffle($keyOrigianl);
        $key = join($keyOrigianl);
    }elseif (isset($_REQUEST['key']) &&  !empty($_REQUEST['key']))  {
        $key = $_REQUEST['key'];
    }

    $encoded = '';
    if ('encode' == $task) {
        if (isset($_POST['encData'])) {
            $data = $_POST['encData'];
            $encoded = encodeData($data,$key);
        }
    } 
    
    if ('decode' == $task) {
        if (isset($_POST['encData'])) {
            $data = $_POST['encData'];
            $encoded = decodedeData($data,$key);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Encription</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h2>Data Scrambler</h2>
                <h3>Encript Your Data with Data-Scrambler</h3>
                <p>
                    <a href="index.php?task=encode">Encode</a> ||
                    <a href="index.php?task=decode&key=<?=$key?>">Decode</a> ||
                    <a href="index.php?task=key"> Generate key</a> 
                </p>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="column column-60 column-offset-20">
                <form  method="post" action="index.php<?php if ('decode' == $task) { echo "?task=decode";}?>">
                    <label for="key">Key</label>
                    <input type="text" name="key" id="ky" value="<?=$key?>" >
                    <label for="encData">Type Your Data</label>
                    <textarea name="encData" id="ec" cols="30" rows="10"><?php if (isset($_POST['encData'])) {echo $data = $_POST['encData'];}?></textarea>
                    <label for="decode">Rasult</label>
                    <textarea name="result" id="dc" cols="30" rows="15"><?=$encoded?></textarea>
                    
                    <button class="button" type="submit" name="submit">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>