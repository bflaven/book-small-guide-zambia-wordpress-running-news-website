# Best practices in WP plugin development!
Part of the series about best practices in WP plug-in development.

**File to add in the Twenty_Nineteen for WP if you want to use and see the plug-in `5_ZNBC_plugin_oop`**


``` bash
# Add the 2 files archive-znbc-tada.php and single-znbc-tada.php in twentynineteen
/path-to-your-wp-install/wp-content/themes/twentynineteen/archive-znbc-tada.php
/path-to-your-wp-install/wp-content/themes/twentynineteen/single-znbc-tada.php
```

``` bash
# Add the file content-excerpt-znbc.php in twentynineteen so you can see the taxonomy
/path-to-your-wp-install/wp-content/themes/twentynineteen/template-parts/content/content-excerpt-znbc.php
```

**Change in the file `/path-to-your-wp-install/wp-content/themes/twentynineteen/template-parts/content/content-excerpt-znbc.php`**
``` php
<!-- Add the taxonomy -->
<div class="entry-content">
    <?php the_terms( $post->ID, 'znbc-state', 'State: '); ?><br>
    <?php the_excerpt(); ?>
  </div><!-- .entry-content -->
```

