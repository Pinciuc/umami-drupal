<?php

/**
 * Custom Local Environment Settings
 * ============================== */

if (isset($_ENV['LANDO']) && strtolower($_ENV['LANDO']) === 'on') {
  $lando_info = json_decode(getenv('LANDO_INFO'), TRUE);
  $settings['hash_salt'] = md5(getenv('LANDO_HOST_IP'));
  $databases['default']['default'] = [
    'database' => $lando_info['database']['creds']['database'],
    'username' => $lando_info['database']['creds']['user'],
    'password' => $lando_info['database']['creds']['password'],
    'host' => $lando_info['database']['internal_connection']['host'],
    'port' => $lando_info['database']['internal_connection']['port'],
    'driver' => 'mysql',
  ];
  $settings['trusted_host_patterns'] = [
    '^.+\.lndo\.site$',
  ];
}
