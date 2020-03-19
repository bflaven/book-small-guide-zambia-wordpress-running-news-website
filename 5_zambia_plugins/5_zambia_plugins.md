# 5_zambia_plugins

**In order to make proper cut-and-pasted for each command inserted in the book. Here are the commands used in this book chapter and inserted in this readme file.**


``` php
/**
 * Class example
 * 
 */

// We create a class named "MetaCountry"
class MetaCountry
{


  private $_name;
  private $_currency;
  private $_flag;
  private $_capital;
  private $_subregion;
  private $_nativeLanguage;
  private $_area;

  public $welcome_msg = "Welcome";
        
  // We declare a method for the sole purpose to display a text.
  public function DefineCountry() {
    echo ('I am a country!');
    echo ('<br>');
  }

  public function WelcomeEnglish(){
        return $this->welcome_msg;
    }
 
  public function WelcomeFrench(){
        $welcome_msg = 'Bienvenue';
        return $welcome_msg;
    }

}//EOC

//Instantiate the Class in an object named $country
$country = new MetaCountry;

// Look for the object $country and invokes the method Define() on this object
$country->DefineCountry();



// echo $country->welcome_msg;
// You can apply method to this object like we did previously
// echo $country->WelcomeEnglish();
// echo $country->WelcomeFrench();

```




``` php
      global $wp_query;
      if ( $wp_query->have_posts() ) {
            while ( $wp_query->have_posts() ) {
            $wp_query->the_post();
            echo apply_filters( ‘the_content’,
            $wp_query->post->post_content );
        }
      }
```




``` php
      $args = [
      'post_type' => 'znbc-tada',
      'posts_per_page' => 10
      ];
      $query = new WP_Query( $args );
```


``` bash
$ composer install
```


``` bash
#Some of the 20 fields defining an order record for your future shop in WP
Total, Taxes, Discounts, Billing Address Line 1, Billing Address Line 2, Billing City... to be continued
```


``` bash
$ cd /path-to-your-wp-install/
```




``` bash

#Be sure to be in the correct directory
$ cd /path-to-your-wp-install/wp-content/plugins/
$ mkdir 5_ZNBC_plugin_oop
$ cd 5_ZNBC_plugin_oop


#Check where you are if you are in the correct directory 5_ZNBC_plugin_oop
$ pwd

#Create the plugin file
$ touch 5_ZNBC_plugin_oop.php

#Create the directories
$ mkdir src
$ mkdir src/ZnbcTadalist
$ mkdir src/ZnbcTadalist/Models
$ mkdir src/ZnbcTadalist/WordPress
$ mkdir src/ZnbcTadalist/WordPress/Helpers
$ mkdir src/ZnbcTadalist/WordPress/PostType
$ mkdir src/ZnbcTadalist/WordPress/Taxonomy


#Create the files for Class and Models
$ touch src/ZnbcTadalist/ZnbcTadalist.php
$ touch src/ZnbcTadalist/Models/HooksAdminInterface.php
$ touch src/ZnbcTadalist/Models/HooksFrontInterface.php
$ touch src/ZnbcTadalist/Models/HooksInterface.php


#Create the files for Helpers and PostType
$ touch src/ZnbcTadalist/WordPress/Helpers/PostType.php
$ touch src/ZnbcTadalist/WordPress/PostType/Tada.php
$ touch src/ZnbcTadalist/WordPress/Taxonomy/State.php


```



``` bash
#Be sure to be at the root of your plugin directory
$ cd /path-to-your-wp-install/wp-content/plugins/5_ZNBC_plugin_oop
#To initiate the creation of the composer.json
$ composer init
```

``` json
{
    "name": "brunoflaven/6_znbc_plugin_oop.php",
    "description": "Manage a ZnbcTadalist in WordPress via an OOP Plugin",
    "license": "GPL",
    "authors": [
        {
            "name": "BF",
            "email": "info@flaven.fr"
        }
    ],
    "autoload": {
        "psr-4": {
            "ZnbcTadalist\\": "src/ZnbcTadalist/"
        }
    }
}
```



``` bash
#Launch the installation of the autoloader
$ composer install
```



``` php
/* Instantiate the Class */
$tadalist = new ZnbcTadalist($actions);
$tadalist->execute();
```


``` bash
#Copy the 2 files of the default theme eg twentynineteen
# add the post_type `znbc-tada` at the end of the file names 
# archive-{post_type}.php
# single-{post_type}.php
$ cd /path-to-your-wp-install/wp-content/themes/twentynineteen/
$ cp archive.php archive-znbc-tada.php
$ cp single.php single-znbc-tada.php
```

``` bash
#Copy 1 files of the default theme eg twentynineteen to show the taxonomy State
$ cd /path-to-your-wp-install/wp-content/themes/twentynineteen/template-parts/content/
$ cp content-excerpt.php content-excerpt-znbc.php
```

**Change in the file `/path-to-your-wp-install/wp-content/themes/twentynineteen/template-parts/content/content-excerpt-znbc.php`**
``` php
<!-- Add the taxonomy -->
<div class="entry-content">
    <?php the_terms( $post->ID, 'znbc-state', 'State: '); ?><br>
    <?php the_excerpt(); ?>
  </div><!-- .entry-content -->
```



