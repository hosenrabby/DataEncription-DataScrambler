<?php
    function encodeData($originalData,$shaffleKey)
    {   $data = '';
        $originalKey = "abcdefghijklmnopqrstuvwxyz1234567890";
        $length = strlen($originalData);
        for ($i=0; $i < $length; $i++) { 
            $currentCar = $originalData[$i];
            $pos = strpos($originalKey,$currentCar);
            if ($pos !== false) {
                $data .= $shaffleKey[$pos];
            } else $data .= $currentCar;
        } return $data;
    }


    function decodedeData($originalData,$shaffleKey)
    {   $data = '';
        $originalKey = "abcdefghijklmnopqrstuvwxyz1234567890";
        $length = strlen($originalData);
        for ($i=0; $i < $length; $i++) { 
            $currentCar = $originalData[$i];
            $pos = strpos($shaffleKey,$currentCar);
            if ($pos !== false) {
                $data .= $originalKey[$pos];
            } else $data .= $currentCar;
        } return $data;
    }
    // $data = "i am hosen rabby";
    // $key = "wurh4vc71b5djoqy02k9ges8tnmpx6iafl3z";
    // encodeData($data,$key);
?>