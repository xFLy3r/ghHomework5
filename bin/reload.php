<?php

require_once __DIR__.'/base_script.php';
require_once __DIR__.'/../vendor/autoload.php';

$options = getopt("", ['hostname:', 'env:']);

$stringOptions = ''.array_key_exists('env', $options) ? ' --env=' . $options['env'] : ' --env=dev';

$parameters = \Symfony\Component\Yaml\Yaml::parse(__DIR__.'/../app/config/parameters.yml');
$parameters = $parameters['parameters'];

show_run("composer install", "composer install --no-interaction");

build_bootstrap();

show_run("Delete database", "app/console doctrine:database:drop --force -q --hostname=local " . $stringOptions, true);
show_run("Create database", "app/console doctrine:database:create --hostname=local " . $stringOptions);

show_run("Create schema", "app/console doctrine:schema:create --hostname=local " . $stringOptions);

foreach ([$parameters['api_domain'], $parameters['admin_domain']] as $domain) {
    show_run("Cache clear", "php app/console cache:clear --hostname=".$domain.' '.$stringOptions);
}

show_run("Load Fixtures", "app/console doctrine:fixtures:load --no-interaction  --hostname=local " . $stringOptions);

foreach ([$parameters['api_domain'], $parameters['admin_domain']] as $domain) {
    show_run("Assets install", "app/console assets:install --symlink --hostname=".$domain.' '.$stringOptions);
    show_run("Assetic dump", "app/console assetic:dump --hostname=".$domain.' '.$stringOptions);

    show_run("Warming up cache", "php app/console cache:warmup --hostname=".$domain.' '.$stringOptions);
}

exit(0);