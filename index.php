<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <div>
        <h1> Testing </h1>
        <h3> Open Browser Console To Check Response...</h3>
    </div>





    <?php
    //// Creating Console Log Function ///////////

    $view_variable = 'Prueba satisfactoria';

    console_log($view_variable);
    function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .   //
            ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }



    ///////////// Creating API  Resquest ////////////////

    //https://jsonplaceholder.typicode.com/users

    /*                ck_fdbbd44a5dd09dda2c93196e1968c8fe50096d27

                cs_66e8a349b0763729a4e65797ac2f8ce9a3232998                    */



    //////////////////////////////////////////////////////////////////////////////////////////////////
    $ch = curl_init();

    $username = "ck_fdbbd44a5dd09dda2c93196e1968c8fe50096d27";
    $password = "cs_66e8a349b0763729a4e65797ac2f8ce9a3232998";
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_URL, 'https://kancanjeanscolombia.com/S/wp-json/wc/v2/products?per_page=100&page=1');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $dataA = curl_exec($ch);
    $dataA1 = array($dataA);
    curl_close($ch);
    $dataA2 = json_decode($dataA);

    //echo  ($data) ;
    //echo json_encode(json_decode($data), JSON_PRETTY_PRINT); 

    //print_r($data2);
    //echo "<pre>" . ($data) ."</pre>";
    //console_log($dataA2);


    ///////////////////////////////////

    $ch2 = curl_init();

    $username = "ck_fdbbd44a5dd09dda2c93196e1968c8fe50096d27";
    $password = "cs_66e8a349b0763729a4e65797ac2f8ce9a3232998";
    curl_setopt($ch2, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch2, CURLOPT_URL, 'https://kancanjeanscolombia.com/S/wp-json/wc/v2/products?per_page=100&page=2');
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch2, CURLOPT_HEADER, 0);
    $dataB = curl_exec($ch2);
    $dataB1 = array($dataB);
    curl_close($ch2);
    $dataB2 = json_decode($dataB);

    //echo  ($data) ;
    //echo json_encode(json_decode($data), JSON_PRETTY_PRINT); 

    //print_r($data2);
    //echo "<pre>" . ($data) ."</pre>";
    //console_log($dataB2);

    $total =  json_encode(array_merge((array)$dataA2, (array)$dataB2));
    console_log($total);




    /////////////////////////


    $json_decoded = json_decode($total);
    echo '<table border="1">';
    foreach ($json_decoded as $result) {
        echo '<tr>';
        echo '<td>' . $result->id . '</td>';
        echo '<td>' . $result->name . '</td>';
        foreach ($result->variations as $result2) {
            echo '<td>' . $result2 . '</td>';
        }

        echo '</tr>';
    }
    echo '</table>';

    /////////////////////////////




    ?>


</body>

</html>