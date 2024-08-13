<?php
namespace app\middleware;

use tank\Func\Func;

class tokenmiddleware
{
        /**
         * Token验证
         */
        public static function Handle()
        {
                if (str_contains(Func::getUrl(), "public"))
                        \tank\MG\Operate::VerToken([
                                'AccountLogin',
                                'ConfidentialityLogin',
                                'RegistrationAccount',
                        ]);
        }
}