<?php

use Morilog\Jalali\Jalalian;

function date_to_persian($date, $format= "%B %d، %Y"){
    return Jalalian::forge($date)->format($format);
}

function paymentsType($type){
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

function paymentsStatus($status){
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

function paymentsStatusStyle($status){
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

function copanType($type){
    switch ($type) {
        case 0:
            return "عمومی";
            break;
        case 1:
            return "شخصی";
            break;
    }
}

function copanAmountType($type){
    switch ($type) {
        case 0:
            return "درصدی";
            break;
        case 1:
            return "مبلغی";
            break;
    }
}

function orderStatus($status){
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
function deliveryStatus($status){
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
function deliveryStatusStyle($status){
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