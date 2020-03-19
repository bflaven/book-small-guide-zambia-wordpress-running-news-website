<?php

namespace ZNBC\Insert\Models;

class DisplayFooter {

	    public static function frontendFooter() {
    
        $output = "\n\n";
        $output .= '<!-- from namespace ZNBC\Insert\Models; |  ZNBC footer -->';

        //Throw an error with date(Y), change for date(Y)
        $output .= '<div class="site-date-copyright">&copy;&nbsp;'.date('Y').'&nbsp;'.get_bloginfo('name').'</div><!-- .site-date-copyright -->';
        $output .= "\n\n";
        echo $output;
    }
}




