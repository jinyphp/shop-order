<?php

function generateUniqueCartId()
{
    // 고유의 ID를 생성
    $id = uniqid(mt_rand(), true);
    $code = substr(hash('sha256',$id),0,15); // 10자리 추출
    return date("Ymd-his")."-".$code;
}
