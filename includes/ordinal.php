<?php
function ordinal($int = 1)
{
    $last_digit = substr($int, -1, 1);
    switch ($last_digit) {
        case 1:
            $str = $int . "º ";
            break;
        case 2:
            $str = $int . "º ";
            break;
        case 3:
            $str = $int . "º ";
            break;
        default:
            $str = $int . "º ";
            break;
    }
    return $str;
}
?>