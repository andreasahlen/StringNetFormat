<?php

function StringNetFormat(string $source, array $parameters) : string
{
    if (!isset($source) || !isset($parameters))
    {
        return "<null>";
    }

    $index = 0;
    $result = $source;
    $required = 0;

    $count = count($parameters);

    for($occur = 0; $occur < ($count + 1); $occur++)
    {
        $pattern = "{" . $occur . "}";
        if (strpos($result, $pattern) !== false)
        {
            $required++;
        }
    }

    foreach($parameters as $item)
    {
        $pattern = "{" . $index . "}";
        if (strpos($result, $pattern) !== false || $index > $required)
        {
            //print $index . ", " . $item . PHP_EOL . PHP_EOL;
            $result = str_replace($pattern, $item, $result);
            $index++;
        }

    }
    if ($index == $required)
    {
        return $result;
    }
    else
    {
        $exMessage = "source: '$source'" . PHP_EOL . PHP_EOL;
        $exMessage .= "index out of bounds (value for {'$count'} not found.";
        print_r($parameters) . PHP_EOL . PHP_EOL;
        throw new Exception($exMessage);
    }
}

print StringNetFormat("hallo {0}, und {1}, welcher Tag ist heute {2}, {0}{1} - {3}", array ("Wert1", "Wert2", "Wert3"));
?>