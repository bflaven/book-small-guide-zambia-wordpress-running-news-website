# 7_set_up_a_local_environment
**In order to make proper cut-and-pasted for each command inserted in the book. Here are the commands used in this book chapter and inserted in this readme file.**


``` makefile
# make start
# Description: Start the containers for WP
start:
  docker-compose up -d --build

# make stop
# Description: Only stop the containers for WP
stop:
  docker-compose stop

# make down
# Description: Stop the containers and remove them
down:
  docker-compose down

# make ps
# Description: give a list of the containers for the WP
ps:
  docker-compose ps

# make cli
# Description: launch a console for WP-CLI
cli:
  docker-compose run --rm cli bash

# make clean
# Description: clean up the directory by removing the WP files
clean: stop
  @echo "💥 Removing Wordpress..."
  @rm -rf site
  @echo "💥 Removing Docker containers..."
  docker-compose rm -f
```

```yaml
version: '3.1'
services:

 #DATABASE
 #Description: Do not change db top anything if you want to easily connect with phpMyAdmin
 db:
   image: mysql:5.7
   restart: always
   environment:
    #This is the password for the MySQL user root
    MYSQL_ROOT_PASSWORD: zambia_root_password
    MYSQL_DATABASE: zambia_wordpress
    MYSQL_USER: zambia_wordpress
    MYSQL_PASSWORD: zambia_wordpress_password
   #Description: Feel free to uncomment the lines below to keep your database data on your computer.
   #volumes: 
   #  - ./db:/var/lib/mysql

 #CMS
 #Description: Launch the famous WP 5 min install via the browser at the URL: http://localhost:8080/
 wordpress:
   image: wordpress
   restart: always
   ports:
     - 8080:80
   depends_on:
         - db
   environment:
      WORDPRESS_VERSION: 5.1
      WORDPRESS_LOCALE: en_US
      WORDPRESS_DB_HOST: db
      WORDPRESS_DB_NAME: zambia_wordpress
      WORDPRESS_DB_USER: zambia_wordpress
      WORDPRESS_DB_PASSWORD: zambia_wordpress_password
   # Keep your data and access via the console
   volumes: 
     - ./site:/var/www/html/

    # CAUTION 
    #to ensure that you can edit the files of the WP install on your computer with your favorite editor
    #- [path-to-the-wp-files-on-your-local-computer]/site/:/var/www/html/

 #CLI
 #Description: With make cli, define in the makefile, you access to a WP-CLI for your WP install and pass the tradcionnal commands such as: wp theme list, wp post list, wp post generate --count=100 and so on
 #To access to the console in bash for WP-CLI, run the command below in a second tab of the console
 # $ docker-compose run --rm cli bash
 cli:
      image: wordpress:cli
      user: xfs
      volumes:
        - ./site:/var/www/html
      working_dir: /var/www/html

 
 #PHPMYADMIN
 #Description: After the famous WP 5 min install, you can connect to the WP database via phpMyAdmin at http://localhost:22222/ with the root user or the one use of the WP install
 phpmyadmin:
      image: phpmyadmin/phpmyadmin
      ports:
          - "22222:80"
      depends_on:
          - db
```

```bash
# manage themes
$ wp theme list
$ wp theme activate twentynineteen #already active
$ wp theme activate twentyseventeen #active twentyseventeen
$ wp theme search bootstrap #search for new theme with the chain bootstrap
$ wp theme install ultrabootstrap --activate #install and activate the theme ultrabootstrap

#manage plugin
$ wp plugin list #list the plugins
$ wp plugin search "clone" #search for plugin
# USE the slug to install the plugin
$ wp plugin install duplicate-post --activate #install and activate Duplicate Post

$ wp plugin search "JWT Authentication" #search for plugin
# USE the slug to install the plugin
$ wp plugin install jwt-authentication-for-wp-rest-api --activate #install and activate JWT Authentication

$ wp plugin search "Disable Gutenberg" #search for plugin
# USE the slug to install the plugin
$ wp plugin install disable-gutenberg --activate #install and activate Disable Gutenberg


#manage update
$ wp core update #update the WP
$ wp core update-db #update the DB
$ wp theme update --all #update the themes
$ wp plugin update --all #update the plugins

#manage content show the list of posts
$ wp post list

#generate 100 fake posts
$ wp post generate --count=100

#generate a fake post from a text file
$ wp post create ./_fake_content_files/lorem_fake_post.txt --post_title='2 Fake post example from a txt file' --post_status=publish
```