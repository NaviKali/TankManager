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
                if (str_contains("public", Func::getUrl()))
                        \tank\MG\Operate::VerToken([]);
        }
}