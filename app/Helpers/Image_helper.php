<?php

function src($fileName, $type = "full")
{
    $path = '.upload/image/';

    if ($type != 'full')
        $type .= $type . '/';

    return $path . $fileName;
}
