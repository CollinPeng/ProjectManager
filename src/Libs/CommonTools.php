<?php
declare(strict_types=1);

namespace App\Libs;

class CommonTools
{
    /**
     * JavaScript alert and redirect.
     *
     * @param string $message alert message.
     * @param string $redirect redirect path (if any)
     * @return string
     */
    public static function alert(string $message, string $redirect=''): string
    {
        $js = '<script type="text/javascript">';
        $js .= 'alert("' . $message . '");';
        if (!empty($redirect)) {
            $js .= 'window.location="' . $redirect . '";';
        }
        $js .= '</script>';

        return $js;
    }

    /**
     * Generate random string.
     *
     * @param int $length
     * @return string
     * @throws \Exception
     */
    public static function randomStr(int $length): string
    {
        $temp = 'a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,0,1,2,3,4,5,6,7,8,9';
        $tmp_arr = explode(',', $temp);

        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $tmp_arr[random_int(0, count($tmp_arr) - 1)];
        }

        return $str;
    }
}