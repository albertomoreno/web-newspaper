<?php 


require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/debug.php';

use Core\Connection;
use Models\User;


Connection::connect();

$queries = array(
  'DROP TABLE IF EXISTS users',
  'DROP TABLE IF EXISTS news',
  'DROP TABLE IF EXISTS comments',

  'CREATE TABLE IF NOT EXISTS `users` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
    `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
    `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
    `address` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
    `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
    `admin` tinyint(1) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_user` (`user`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci',

  'CREATE TABLE IF NOT EXISTS `news`(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
    `body` text COLLATE utf8_unicode_ci NOT NULL,
    `image` tinyint(1) NOT NULL,
    `section` varchar(20) NOT NULL,
    `created` timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci',

  'CREATE TABLE IF NOT EXISTS `comments`(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,    
    `newsId` int(10) unsigned NOT NULL,
    `userId` int(10) unsigned NOT NULL,
    `comment` text COLLATE utf8_unicode_ci NOT NULL,
    `created` timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci',
);

foreach ($queries as $value) {
  $statement = Connection::prepare($value);
  $statement->execute();
}

User::insert(array(
  'user' => 'admin',
  'password' => md5('admin'),
  'name' => 'admin',
  'email' => 'admin@admin.com',
  'address' => 'admin',
  'gender' => 'man',
  'admin' => 1,
));

Connection::disconnect();

