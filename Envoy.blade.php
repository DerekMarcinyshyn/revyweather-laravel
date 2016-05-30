@servers(['web' => 'rwh-cloud'])

@macro('deploy', ['on' => 'web'])
    list
    fetch_repo
    update_permissions
@endmacro

@task('list')
    cd /var/www/vhosts/revelstokewebhosting.net/revyweather.ca;
    ls -la
@endtask

@task('fetch_repo')
    cd /var/www/vhosts/revelstokewebhosting.net/revyweather.ca;
    git fetch origin master;
    git reset --hard FETCH_HEAD;
@endtask

@task('update_permissions')
    cd /var/www/vhosts/revelstokewebhosting.net/;
    chown -R revyhosting:psaserv revyweather.ca;
    cd /var/www/vhosts/revelstokewebhosting.net/revyweather.ca;
    chmod 777 -Rf storage
    ls -la;
@endtask