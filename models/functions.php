<?php
function val($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function skipSpecialChar($value){
    return str_replace("'","''",$value);
}