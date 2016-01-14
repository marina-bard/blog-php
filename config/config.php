<?php

class Config
{
    static $handler = 'json';

    static $jsonStoragePath = '../storage/posts.json';
    static $fileStoragePath = '../storage/posts.txt';

    static $dbSettings = [
        'host' => "localhost",
        'userName' => 'root',
        'password' => '1111',
        'database' => 'blog'
    ];
}