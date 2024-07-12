<?php

namespace Src;

class MyGreeter
{

    /**
     * return different value according to hour
     * @return string
     * 6-12 Good morning
     * 12-18 Good afternoon
     * else Good evening
     */
    public function greeting():string{
        $currentHour = date('H');
        // return different string depending on hour
        if ($currentHour >= 6 && $currentHour < 12) {
            return "Good morning";
        } elseif ($currentHour >= 12 && $currentHour < 18) {
            return "Good afternoon";
        } else {
            return "Good evening";
        }
    }

}