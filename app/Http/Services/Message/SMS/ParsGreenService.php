<?php

namespace App\Http\Services\Message\SMS;

use Illuminate\Support\Facades\Config;

class ParsGreenService
{
    public static function sendOtp($number)
    {
        $webServiceURL       = Config::get('sms.url');
        $webServiceSignature = Config::get('sms.signature');
        $webServicemobile = $number;
        $webServiceLang = "fa";
        $webServiceotpType = Config::get('sms.otp_type');
        $webServicepatternId = Config::get('sms.pattern_id');

        $parameters['signature'] = $webServiceSignature;
        $parameters['mobile'] = $webServicemobile;
        $parameters['Lang'] = $webServiceLang;
        $parameters['otpType'] = $webServiceotpType;
        $parameters['patternId'] = $webServicepatternId;
        $parameters['otpCode'] = 0x0;

        try {
            $con = new \SoapClient($webServiceURL);  
    		$responseSTD = (array) $con ->SendOtp($parameters);
			return $responseSTD['otpCode'];
        } catch (\SoapFault $ex) {
            echo $ex->faultstring;
        }
    }

    public function sendGroupSimple(array $numbers, $textMessage)
    {
        $webServiceURL  = Config::get('sms.url');
        $webServiceSignature = Config::get('sms.signature');
        $webServiceNumber   = "02100021000"; //Message Sende Number
        $Mobiles      = $numbers;
        mb_internal_encoding("utf-8");
        $textMessage = mb_convert_encoding($textMessage, "UTF-8");
        $parameters['signature'] = $webServiceSignature;
        $parameters['from'] = $webServiceNumber;
        $parameters['to']  = $Mobiles;
        $parameters['text'] = $textMessage;
        $parameters['isFlash'] = false;
        $parameters['udh'] = "";
        try {
            $con = new \SoapClient($webServiceURL);
            $responseSTD = (array) $con->SendGroupSmsSimple($parameters);
            echo 'OutPut Method Value.............................=>';
            echo '</br>';
            echo  $responseSTD['SendGroupSmsSimpleResult'];
        } catch (\SoapFault $ex) {
            echo $ex->faultstring;
        }
    }

    public function send($number, $textMessage)
    {
        $webServiceURL  = Config::get('sms.url');
        $webServiceSignature = Config::get('sms.signature');
        $webServicetoMobile   = $number;
        mb_internal_encoding("utf-8");
        $textMessage = mb_convert_encoding($textMessage, "UTF-8");
        $parameters['signature'] = $webServiceSignature;
        $parameters['toMobile'] = $webServicetoMobile;
        $parameters['msgbody'] = $textMessage;
        $parameters['retStr'] = "";
        try {
            $con = new \SoapClient($webServiceURL);
            $responseSTD = (array) $con->Send($parameters);
            echo 'OutPut Method Value.............................=>';
            echo '</br>';
            echo  $responseSTD['SendResult'];
            echo '</br>';
            echo 'RetStr Method Value.............................=>';
            echo '</br>';
            echo    $responseSTD['retStr'];
            echo '</br>';
        } catch (\SoapFault $ex) {
            echo $ex->faultstring;
        }
    }
}
