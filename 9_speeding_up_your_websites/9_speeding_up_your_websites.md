# 9_speeding_up_your_websites

**In order to make proper cut-and-pasted for each command inserted in the book. Here are the commands used in this book chapter and inserted in this readme file.**

## How to increase the site speed of an existing website? (part 1) 


``` apacheconf

<IfModule mod_deﬂate.c>
# Compress HTML, CSS, JavaScript, Text, XML and fonts AddOutputFilterByType DEFLATE application/javascript AddOutputFilterByType 
DEFLATE application/rss+xml AddOutputFilterByType 
DEFLATE application/vnd.ms-fontobject AddOutputFilterByType 
DEFLATE application/x-font AddOutputFilterByType 
DEFLATE application/x-font-opentype AddOutputFilterByType 
DEFLATE application/x-font-otf AddOutputFilterByType
DEFLATE application/x-font-truetype AddOutputFilterByType
DEFLATE application/x-font-ttf AddOutputFilterByType
DEFLATE application/x-javascript AddOutputFilterByType
DEFLATE application/xhtml+xml AddOutputFilterByType
DEFLATE application/xml AddOutputFilterByType
DEFLATE font/opentype AddOutputFilterByType
DEFLATE font/otf AddOutputFilterByType
DEFLATE font/ttf AddOutputFilterByType
DEFLATE image/svg+xml AddOutputFilterByType
DEFLATE image/x-icon AddOutputFilterByType
DEFLATE text/css AddOutputFilterByType
DEFLATE text/html AddOutputFilterByType
DEFLATE text/javascript AddOutputFilterByType
DEFLATE text/plain AddOutputFilterByType
DEFLATE text/xml

# Remove browser bugs (only needed for really old browsers) 
BrowserMatch ^Mozilla/4 gzip-only-text/html
BrowserMatch ^Mozilla/4\.0[678] no-gzip 
BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
Header append Vary User-Agent
</IfModule>

```

```apacheconf
gzip on; 
gzip_disable "MSIE [1-6]\.(?!.*SV1)";
gzip_vary on; 
gzip_types text/plain text/css text/javascript application/javascript application/xjavascript;
```


```php
// If you want to add the Async method 

function add_async_attribute($tag){ # Add async to all remaining scripts
return str_replace( ' src', ' async="async" src', $tag );
}
add_ﬁlter( 'script_loader_tag', 'add_async_attribute', 10, 2);

// If you want to add the Defer method 

function add_defer_attribute($tag){ # Add defer to all remaining scripts
return str_replace( ' src', ' defer="defer" src', $tag );
}

add_ﬁlter( 'script_loader_tag', 'add_defer_attribute', 10, 2);
```


``` apacheconf
<filesMatch ".(ico|pdf|flv|jpg|jpeg|png|gif|svg|js|css|swf)$">
Header set Cache-Control "max-age=84600, public"
</filesMatch>
```



``` apacheconf
## EXPIRES HEADER CACHING ## 
<IfModule mod_expires.c>
ExpiresActive On 
ExpiresByType image/jpg "access 1 year" 
ExpiresByType image/jpeg "access 1 year" 
ExpiresByType image/gif "access 1 year" 
ExpiresByType image/png "access 1 year" 
ExpiresByType image/svg "access 1 year" 
ExpiresByType text/css "access 1 month" 
ExpiresByType application/pdf "access 1 month" 
ExpiresByType application/javascript "access 1 month" 
ExpiresByType application/x-javascript "access 1 month" 
ExpiresByType application/x-shockwave-ﬂash "access 1 month" 
ExpiresByType image/x-icon "access 1 year" 
ExpiresDefault "access 2 days" 
</IfModule> 
## EXPIRES HEADER CACHING ##
```


``` apacheconf

location ~* \.(js|css|png|jpg|jpeg|gif|svg|ico)$ {
 expires 30d;
 add_header Cache-Control "public, no-transform";
}

```



``` apacheconf
location ~*  \.(jpg|jpeg|gif|png|svg)$ {
        expires 365d;
    }

    location ~*  \.(pdf|css|html|js|swf)$ {
        expires 2d;
    }
```


``` php
function remove_query_strings() {
   if(!is_admin()) {
       add_filter('script_loader_src', 'remove_query_strings_split', 15);
       add_filter('style_loader_src', 'remove_query_strings_split', 15);
   }
}

function remove_query_strings_split($src){
   $output = preg_split("/(&ver|\?ver)/", $src);
   return $output[0];
}
add_action('init', 'remove_query_strings');
```


``` php
// To use the optimization tool, you first need to add this line to your website wp-config.php file.
define( 'WP_ALLOW_REPAIR', true );

// To reduce the number of revisions that are saved, simply add the following code to your wp-config.php file.
define( 'WP_POST_REVISIONS', 2 );

// Post revisions can be completely disabled by adding the following code to your wp-config.php file
define( 'WP_POST_REVISIONS', false );
```


``` sql
-- to optimize the WP main table wp_posts
OPTIMIZE TABLE 'wp_posts'
```

``` sql

--- analyze_tbl
ANALYZE TABLE `wp_commentmeta`, `wp_comments`, `wp_links`, `wp_options`, `wp_postmeta`, `wp_posts`, `wp_termmeta`, `wp_terms`, `wp_term_relationships`, `wp_term_taxonomy`, `wp_usermeta`, `wp_users`

--- check_tbl
CHECK TABLE `wp_commentmeta`, `wp_comments`, `wp_links`, `wp_options`, `wp_postmeta`, `wp_posts`, `wp_termmeta`, `wp_terms`, `wp_term_relationships`, `wp_term_taxonomy`, `wp_usermeta`, `wp_users`

--- checksum_tbl
CHECKSUM TABLE `wp_commentmeta`, `wp_comments`, `wp_links`, `wp_options`, `wp_postmeta`, `wp_posts`, `wp_termmeta`, `wp_terms`, `wp_term_relationships`, `wp_term_taxonomy`, `wp_usermeta`, `wp_users`

--- optimize_tbl
OPTIMIZE TABLE `wp_commentmeta`, `wp_comments`, `wp_links`, `wp_options`, `wp_postmeta`, `wp_posts`, `wp_termmeta`, `wp_terms`, `wp_term_relationships`, `wp_term_taxonomy`, `wp_usermeta`, `wp_users`

--- repair_tbl
REPAIR TABLE `wp_commentmeta`, `wp_comments`, `wp_links`, `wp_options`, `wp_postmeta`, `wp_posts`, `wp_termmeta`, `wp_terms`, `wp_term_relationships`, `wp_term_taxonomy`, `wp_usermeta`, `wp_users`
```


``` php
// Autosave is great feature. Did you ever loose one week of work? :( I did so for the sake of your mind, keep the autosave alive, it will not use up much room in your database.
// But you can manage the interval of this autosave operation
define( 'AUTOSAVE_INTERVAL', 160 ); // Seconds
```



``` sql
--- Spam comments can also be deleted using the following SQL command.
DELETE FROM wp_comments WHERE comment_approved = 'spam'


--- All comments awaiting approval can be deleted by using the following SQL command.
DELETE FROM wp_comments WHERE comment_approved = '0'
```


``` php
// The number of days before trash is emptied can be changed by adding the following code to your wp-config.php file.
define( 'EMPTY_TRASH_DAYS', 5 ); // 5 days

// The trash system can be completey disabled by adding the following line of code to your wp-config.php file.
define( 'EMPTY_TRASH_DAYS', 0 ); // Zero days
```

# How to start a WP theme creation, integrating the best practices for optimization and speed, based on Gulp?


**Install Homebrew**<br />
[Check the website brew.sh](https://brew.sh/) or launch in the console the following command.

```bash
/usr/bin/ruby -e "$(curl -k -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
```

**Install Node and NPM**<br />

```bash
brew update
brew doctor
export PATH="/usr/local/bin:$PATH"
brew install node
# to check the version of node and npm
node --version
npm --version
```


``` bash
cd /[path-to-your-wp-theme-try]/zambia-wp-test-1

#make the directory for your WP theme
mkdir zambia-wp-test-1
cd zambia-wp-test-1/

#first level of directory
mkdir source
mkdir languages
mkdir destination
mkdir bundled

#second level of directory for source, it is often named src
mkdir source/css
mkdir source/images
mkdir source/js


#second level of directory for destination, it is often named  for distribution
mkdir destination/css
mkdir destination/images
mkdir destination/js

```


``` bash
#go the directory of your WP theme
cd /[path-to-your-wp-theme-try]/zambia-wp-test-1/

#Install gulp globally so we can use Gulp in the command line
npm install --global gulp-cli
```


``` bash
#Install Gulp for good
npm init
npm install gulp --save-dev
gulp --version
```



``` bash
# writing Gulp tasks
touch gulpfile.js
```
``` javascript
/* usage */

// cd /path-to-theme/zambia-wp-test-1

// if need to known all the tasks
// gulp --tasks 


// gulp start  
var gulp = require('gulp');
gulp.task('start', function(cb) {
  console.log('Task 1 for zambia-wp-test-1');
  console.log('Task 2 for zambia-wp-test-1');
  console.log('Task 3 for zambia-wp-test-1');
  cb();
});

// to launch the task named end
// gulp end
gulp.task('end', function(cb) {
  console.log('Task 4 for zambia-wp-test-1');
  console.log('Task 5 for zambia-wp-test-1');
  console.log('Task 6 for zambia-wp-test-1');
  cb();
});

// to launch the default task
//gulp
gulp.task('default', function(cb) {
  console.log('Default Task for zambia-wp-test-1');
  cb();
});

// change order for fun
// gulp start end default 
// gulp end default start
```


``` bash
#Using ES6 in the Gulpfile

#install babel
npm install --save-dev @babel/register @babel/preset-env @babel/core
#rename the gulpfile.js
mv gulpfile.js gulpfile.babel.js

#create a .babelrc inside the theme folder
touch .babelrc
```



``` bash
{
  "presets": ["@babel/preset-env"]
}
```


``` javascript
/* usage */

// cd /Users/brunoflaven/Documents/02_copy/_technical_training_zambia_znbc/000_release_version/10_speeding_up_your_websites/speeding-up-your-websites-try-1/zambia-wp-test-1

import gulp from 'gulp';

// to launch the task named start
// gulp start  
export const start = (cb) => {
  console.log('start Task 1 for zambia-wp-test-1');
  console.log('start Task 2 for zambia-wp-test-1');
  console.log('start Task 3 for zambia-wp-test-1');
  cb();
}

// to launch the task named end
// gulp end
export const end = (cb) => {
  console.log('end Task 4 for zambia-wp-test-1');
  console.log('end Task 5 for zambia-wp-test-1');
  console.log('end Task 6 for zambia-wp-test-1');
  cb();
}


// export default end /* or gulp end */
// export default start /* or gulp start */

/* play it again Sam */
const my_tasks = gulp.series(end, start);
export default my_tasks /* or gulp */

```



``` bash
#Development vs. Production
npm install --save-dev yargs
```



``` javascript
/* usage */

// cd /Users/brunoflaven/Documents/02_copy/_technical_training_zambia_znbc/000_release_version/10_speeding_up_your_websites/speeding-up-your-websites-try-1/zambia-wp-test-1


// gulp zambia_demo /* we will get undefined for the const PRODUCTION that's logic */
// gulp zambia_demo --the_prod=true /* we will get the correct value for const PRODUCTION that's logic */

// gulp --the_prod=true
// // gulp --the_development=true
// gulp --tasks
// gulp --the_development=Да
// gulp --the_prod=нет
 

// IMPORT
import gulp from 'gulp';
import yargs from 'yargs';

const PRODUCTION = yargs.argv.the_prod;
const DEVELOPMENT = yargs.argv.the_development;

export const zambia_demo = (cb) => {
  console.log('zambia_demo Task 1 for zambia-wp-test-1');
  // console.log(PRODUCTION); /* gulp --the_prod=true */
  console.log(DEVELOPMENT); /* gulp --the_development=true */
  cb();
}

export default zambia_demo
```


``` bash
#first stylesheet
touch source/scss/style.scss
#second stylesheet
touch source/scss/admin.scss
```

```bash
#be sure you are in your theme folder
cd /[path-to-your-wp-theme-try]/zambia-wp-test-1

#load the required package for the style task
npm install --save-dev gulp-sass gulp-clean-css gulp-if gulp-sourcemaps gulp-postcss autoprefixer
```


```bash
gulp styles #just to do the task
gulp styles --prod #do the task and minify
```



``` javascript
// IMPORT
// import { src, dest } from 'gulp';
// including the watch task
import { src, dest, watch } from 'gulp';

/*

The rest of gulp

*/


export const watchaForChanges = () => {
  watch('source/scss/**/*.scss', styles);
}

/* launch this task and the task will be instantly running. */
// gulp watchaForChanges 

```


```bash
#Creating the images task
npm install --save-dev gulp-imagemin
```



```bash
#Creating the copy task, if you are bored to copy all the files in destination folder
npm install --save-dev del
```



```javascript
import { src, dest, watch, series, parallel } from 'gulp';

export const dev = series(clean, parallel(styles, images, copy), watchForChanges)
export const build = series(clean, parallel(styles, images, copy))
export default dev;
```


```javascript
"scripts": {
  "start": "gulp",
  "build": "gulp build --prod"
},
```


```bash
#Creating the scripts task
npm install --save-dev webpack-stream
npm install --save-dev babel-loader
npm install --save-dev vinyl-named

#Refreshing the browser with Browsersync
npm install browser-sync gulp --save-dev

#install the rest
npm install --save-dev gulp-zip
npm install --save-dev gulp-replace
npm install --save-dev gulp-wp-pot


```


``` javascript
/* usage */
// IMPORT
// import { src, dest } from 'gulp';
// including the watch task
import { src, dest, watch, series, parallel } from 'gulp';

import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';

// for CSS
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'autoprefixer';

// for IMAGES
import imagemin from 'gulp-imagemin';

// The rest
import del from 'del';
import webpack from 'webpack-stream';
import named from 'vinyl-named';
import browserSync from "browser-sync";
import zip from "gulp-zip";
import info from "./package.json";
import replace from "gulp-replace";
import wpPot from "gulp-wp-pot";

// CONSTANTS
const PRODUCTION = yargs.argv.prod;
const server = browserSync.create();

//for SERVE
  export const serve = done => {
    server.init({
      // proxy: "http://localhost:8888/starter"
      proxy: "http://localhost:8080/"
    });
    done();
  };
  export const reload = done => {
    server.reload();
    done();
  };
 
//for DELETE
export const clean = () => del(['dist']);

//for CSS
export const styles = () => {
  // return src('src/scss/bundle.scss')
  return src(['src/assets/css/bootstrap.css', 'src/assets/css/editor-style.css'])
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([ autoprefixer ])))
    .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('dist/assets/css'));
}

//for IMAGES
export const images = () => {
  return src('src/assets/images/**/*.{jpg,jpeg,png,svg,gif}')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest('dist/assets/images'));
}
//for COPY
export const copy = () => {
    return src(['src/assets/**/*','!src/assets/{images,js,scss}','!src/assets/{images,js,scss}/**/*'])
    .pipe(dest('dist/assets'));
  }

//for SCRIPTS
export const scripts = () => {
      return src(['src/assets/js/bootstrap.js','src/assets/js/main.js','src/assets/js/skip-link-focus-fix.js'])
      .pipe(named())
      .pipe(webpack({
        module: {
        rules: [
          {
            test: /\.js$/,
            use: {
              loader: 'babel-loader',
              options: {
                presets: []
                }
              }
            }
          ]
        },
        mode: PRODUCTION ? 'production' : 'development',
        devtool: !PRODUCTION ? 'inline-source-map' : false,
        output: {
          filename: '[name].js'
        },
        externals: {
          jquery: 'jQuery'
        },
      }))
      .pipe(dest('src/assets/js'));
  };
// For compress
export const compress = () => {
      return src([
        "**/*",
        "!node_modules{,/**}",
        "!bundled{,/**}",
        "!src{,/**}",
        "!.babelrc",
        "!.gitignore",
        "!gulpfile.babel.js",
        "!package.json",
        "!package-lock.json",
      ])
      .pipe(
        gulpif(
          file => file.relative.split(".").pop() !== "zip",
          replace("_themename", info.name)
        )
      )
      .pipe(zip(`${info.name}.zip`))
      .pipe(dest('bundled'));
    };
    export const pot = () => {
      return src("**/*.php")
        .pipe(
          wpPot({
            domain: "_themename",
            package: info.name
          })
        )
      .pipe(dest(`languages/${info.name}.pot`));
    };


// For POT
// export const pot = () => {
//       return src("**/*.php")
//         .pipe(
//           wpPot({
//             domain: "_themename",
//             package: info.name
//           })
//         )
//       .pipe(dest(`languages/${info.name}.pot`));
//     };

// For WATCH
export const watchForChanges = () => {
  watch('src/scss/**/*.scss', styles);
  watch('src/images/**/*.{jpg,jpeg,png,svg,gif}', series(images, reload));
  watch(['src/**/*','!src/{images,js,scss}','!src/{images,js,scss}/**/*'], series(copy, reload));
  watch('src/js/**/*.js', series(scripts, reload));
  watch("**/*.php", reload);
}

/* End */ 
export const dev = series(clean, parallel(styles, images, copy, scripts), serve, watchForChanges);
// export const build = series(clean, parallel(styles, images, copy, scripts), pot, compress);
export const build = series(clean, parallel(styles, images, copy, scripts), compress);

export default dev;


// gulp styles
// gulp styles --prod


// gulp images
// gulp images --prod

// gulp copy

// gulp scripts
/*

# Run gulp
npm run start

# Run gulp build --prod
npm run build

*/
```
