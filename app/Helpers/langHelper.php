<?php

function getLang($a , $text) {
    if(app()->getLocale() === 'ar') {
        $textAr = $text.'_ar';
        return $a->$textAr;
    }
    else {
        return $a->$text;
    }
}