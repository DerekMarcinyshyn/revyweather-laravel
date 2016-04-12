@servers(['web' => 'rwh-cloud'])

@macro('deploy', ['on' => 'web'])
    list
    update_permissions
@endmacro

@task('list')
    cd /var/www/vhosts/revelstokewebhosting.net/revyweather.ca;
    ls -la
@endtask

@task('update_permissions')
    cd /var/www/vhosts/revelstokewebhosting.net/;
    chown -R revyhosting:psaserv revyweather.ca;
    ls -la;
@endtask