<?php
function replaceNWithTilde($inputString)
{
    // Define search and replace arrays
    $search = array('ñ', 'Ñ');
    $replace = array('n', 'N');

    // Replace using arrays
    $outputString = str_replace($search, $replace, $inputString);

    return $outputString;
}

$input = "This is an example with ñ and Ñ characters.";
$output = replaceNWithTilde($input);

echo $output;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Messenger Link</title>
</head>

<body>

    <a href="https://web.facebook.com/messages/t/jeck.anatalio.3" target="_blank">Send Message on Facebook Messenger</a>

</body>

</html>