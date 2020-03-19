# 4_testing_the_wp_api

**In order to make proper cut-and-pasted for each command inserted in the book. Here are the commands used in this book chapter and inserted in this readme file.**

*Proof of concept to create a small Rest API with Slim, the minimalist PHP framework*<br>*<a href="http://flaven.fr/2017/05/proof-of-concept-to-create-a-small-rest-api-with-slim-the-minimalist-php-framework/" target="_blank">http://flaven.fr/2017/05/proof-of-concept-to-create-a-small-rest-api-with-slim-the-minimalist-php-framework/</a>*


**I have made 2 « uncompleted » but sufficient plugins for the POC.
You can find on github. Look for bf_poc_api_wp in 
<a href="https://github.com/bflaven/PluginWordpressForFun" target="_blank">https://github.com/bflaven/PluginWordpressForFun</a>**

- Urban Art Hunting App
- WP REST API Urban Art Hunting App


``` html
<!-- main Endpoint -->
http://[path-to-your-worpress]/wp-json/wp/v2/
<!-- Posts Endpoint -->
http://[path-to-your-worpress]/wp-json/wp/v2/posts
<!-- etc... -->
```



*wp/v2/locations*

``` json
"methods": [
        "GET",
        "POST"
      ],
```



*wp/v2/locations/(?P<id>[\\d]+)*
``` json
"methods": [
        "GET",
        "POST",
        "PUT",
        "PATCH",
        "DELETE"
      ],
```


  








