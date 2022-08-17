<?php

use Morilog\Jalali\Jalalian;

function date_to_persian($date, $format = "%d %B، %Y")
{
    return Jalalian::forge($date)->format($format);
}

function paymentsType($type)
{
    switch ($type) {
        case 0:
            return "آنلاین";
            break;
        case 1:
            return "آفلاین";
            break;
        case 2:
            return "پرداخت در محل";
            break;
    }
}

function paymentsStatus($status)
{
    switch ($status) {
        case 0:
            return "پرداخت نشده";
            break;
        case 1:
            return "پرداخت شده";
            break;
        case 2:
            return "باطل شده";
            break;
        case 3:
            return "برگشت داده شده";
            break;
    }
}

function paymentsStatusStyle($status)
{
    switch ($status) {
        case 0:
            return "text-warning";
            break;
        case 1:
            return "text-success";
            break;
        case 2:
            return "text-danger";
            break;
        case 3:
            return "text-secondary";
            break;
    }
}

function copanType($type)
{
    switch ($type) {
        case 0:
            return "عمومی";
            break;
        case 1:
            return "شخصی";
            break;
    }
}

function copanAmountType($type)
{
    switch ($type) {
        case 0:
            return "درصدی";
            break;
        case 1:
            return "مبلغی";
            break;
    }
}

function orderStatus($status)
{
    switch ($status) {
        case 0:
            return "بررسی نشده";
            break;
        case 1:
            return "در انتظار تأیید";
            break;
        case 2:
            return "تأیید نشده";
            break;
        case 3:
            return "تأیید شده";
            break;
        case 4:
            return "باطل شده";
            break;
        case 5:
            return "برگشت داده شده";
            break;
    }
}

function deliveryStatus($status)
{
    switch ($status) {
        case 0:
            return "ارسال نشده";
            break;
        case 1:
            return "درحال ارسال";
            break;
        case 2:
            return "ارسال شده";
            break;
        case 3:
            return "تحویل داده شده";
            break;
    }
}

function deliveryStatusStyle($status)
{
    switch ($status) {
        case 0:
            return "text-warning";
            break;
        case 1:
            return "text-success";
            break;
        case 2:
            return "text-danger";
            break;
        case 3:
            return "text-secondary";
            break;
    }
}

function persianToEnglish($num)
{
    $num = str_replace('۰', '0', $num);
    $num = str_replace('۱', '1', $num);
    $num = str_replace('۲', '2', $num);
    $num = str_replace('۳', '3', $num);
    $num = str_replace('۴', '4', $num);
    $num = str_replace('۵', '5', $num);
    $num = str_replace('۶', '6', $num);
    $num = str_replace('۷', '7', $num);
    $num = str_replace('۸', '8', $num);
    $num = str_replace('۹', '9', $num);
    return $num;
}

function englishToPersian($num)
{
    $num = str_replace('0', '۰', $num);
    $num = str_replace('1', '۱', $num);
    $num = str_replace('2', '۲', $num);
    $num = str_replace('3', '۳', $num);
    $num = str_replace('4', '۴', $num);
    $num = str_replace('5', '۵', $num);
    $num = str_replace('6', '۶', $num);
    $num = str_replace('7', '۷', $num);
    $num = str_replace('8', '۸', $num);
    $num = str_replace('9', '۹', $num);
    return $num;
}

function arabicToEnglish($number)
{
    $number = str_replace('۰', '0', $number);
    $number = str_replace('۱', '1', $number);
    $number = str_replace('۲', '2', $number);
    $number = str_replace('۳', '3', $number);
    $number = str_replace('۴', '4', $number);
    $number = str_replace('۵', '5', $number);
    $number = str_replace('۶', '6', $number);
    $number = str_replace('۷', '7', $number);
    $number = str_replace('۸', '8', $number);
    $number = str_replace('۹', '9', $number);

    return $number;
}

function priceFormat($price){
    $price= number_format($price, 0, '/', '،');
    $price= englishToPersian($price);
    return $price;
}

function validateNationalCode($nationalCode)
{
    $nationalCode = trim($nationalCode, ' .');
    $nationalCode = arabicToEnglish($nationalCode);
    $nationalCode = persianToEnglish($nationalCode);
    $bannedArray = ['0000000000', '1111111111', '2222222222', '3333333333', '4444444444', '5555555555', '6666666666', '7777777777', '8888888888', '9999999999',];

    if(empty($nationalCode))
    {
        return false;
    }
    else if(count(str_split($nationalCode)) != 10)
    {
        return false;
    }
    else if(in_array($nationalCode, $bannedArray))
    {
        return false;
    }
    else{

        $sum = 0;

        for($i = 0; $i < 9; $i++)
        {
            // 1234567890
            $sum += (int) $nationalCode[$i] * (10 - $i);
        }

        $divideRemaining = $sum % 11;

        if($divideRemaining < 2)
        {
            $lastDigit = $divideRemaining;
        }
        else{
            $lastDigit = 11 - ($divideRemaining);
        }

        if((int) $nationalCode[9] == $lastDigit)
        {
            return true;
        }
        else{
            return false;
        }

    }
}


