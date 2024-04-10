<!DOCTYPE html>
<!--
    This program source is responsible for receiving and outputting information from php-zoo.html.
    The HTML file passes POST to the method and executes each variable and output appropriately.
    This program reads CSS files and modifies them differently to suit each animal.
-->

<html>
    <head>
        <title> php-zoo using POST method</title>
        
    <!-- declare the PHP variables and set them-->
    <?php
        $userName = $_POST['UserName'];                 // set userName from UserName of php-zoo.html
        $animalSelect = $_POST['AnimalSelect'];         // set animalSelect from selected animal of php-zoo.html
        $animalPicture = "./theZoo/";                   // Set the basic path of picture
        $animalText = "./theZoo/";                      // Set the basic path of text file
        $animalCss = "./theZoo/";                       // Set the basic path of css file

        // Set each path of animal's information (picture, description, and css file)
        if ($animalSelect != "") {
            $animalPicture .= $animalSelect . ".jpg";
            $animalText .= $animalSelect . ".txt";
            $animalCss .= $animalSelect . ".css";
        }

        // If text file is not opened, print this message
        $fileContentRead = file_get_contents($animalText);
        if($fileContentRead === false){
            echo "Cannot open file";
        }
        $cssFilePath = $animalCss;
    ?>

    <link rel="stylesheet" type="text/css" href="<?php echo $cssFilePath; ?>">
    </head>

    <body>
        <h1>Pet Facts!</h1>
        <hr>
        <h3>Hello, <?php print($userName)?>!</h3>
        <h3>Your favorite pet is a <?php print($animalSelect)?>.</h3>
        <hr>

        <table>
            <tr>
                <td>
                    <img src = "<?php print($animalPicture); ?>">
                </td>
                <td>
                    <?php print($fileContentRead); ?>
                </td>
            </tr>
        </table>
    </body>
</html>
