@servers(['web' => 'plesk'])

@macro('deploy', ['on' => 'web'])
    update
@endmacro

@task('update')
    echo "----------"
    echo "list files"
    echo "----------"
    cd /var/www/vhosts/revyweather.ca/httpdocs/revyweather-laravel
    ls -la

    echo "-----------"
    echo "update repo"
    echo "-----------"
    cd /var/www/vhosts/revyweather.ca/httpdocs/revyweather-laravel
    git fetch origin master
    git reset --hard FETCH_HEAD

    echo "----------------"
    echo "composer install"
    echo "----------------"
    composer install

    echo "------------------"
    echo "update permissions"
    echo "------------------"
    cd /var/www/vhosts/revyweather.ca/httpdocs
    chown -R revyweather:psacln revyweather-laravel
    cd /var/www/vhosts/revyweather.ca/httpdocs/revyweather-laravel
    chmod 777 -Rf storage
    ls -la

    echo "------------------"
    echo "optimize app"
    echo "------------------"
    php artisan config:cache
@endtask