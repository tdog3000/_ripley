
if [ ! -d "./wp-admin" ]; then
	echo 'Installing WordPress (release version) in tom-napier/....'
	if [ ! -d "./." ]; then
		mkdir ./.
	fi
	cd ./.
	wp core download --locale=en_US --allow-root 
	wp core config --dbname="tom-napier" --dbuser=wp --dbpass=wp --dbhost="localhost" --dbprefix=wp_ --locale=en_US --allow-root --extra-php <<PHP
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG', true);
define('SCRIPT_DEBUG', true);
define('JETPACK_DEV_DEBUG', true);
PHP
	wp core install --url=tom-napier.dev --title="tom-napier" --admin_user=admin --admin_password=password --admin_email=admin@localhost.dev --allow-root
	
	
  wp theme delete twentythirteen --allow-root; wp theme delete twentyfourteen --allow-root; wp theme delete twentyfifteen --allow-root; wp theme delete twentysixteen --allow-root; wp plugin delete hello --allow-root; wp plugin delete akismet --allow-root; git checkout HEAD .
  
	
	
	cd -

fi


