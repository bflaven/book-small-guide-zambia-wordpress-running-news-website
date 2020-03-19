<?php


namespace ZNBC\Insert\Models;


class DisplayHeader {

	public static function frontendHeader() {
    
        $output = "\n\n";
        // 
        $output .= '<!-- namespace ZNBC\Insert\Models; | ZNBC header -->';
        $output .= '<style type="text/css">';
        $output .= '.site-info .imprint { display: none; }';
        // border: 1px #ff0000 dotted; background-color: #CCDDEE;
        $output .= '.site-date-copyright {width: 100%; display: block; padding: 0.7em 0 0; float:right; text-align:center;font-size: 13px;}';
        $output .= '</style>';
        $output .= "\n\n";
        echo $output;
    }

}