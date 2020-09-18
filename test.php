<?php

require "./vendor/autoload.php";

$redis = new \Redis();

$redis->connect("47.104.130.3", "6379");

$adapter = new \PalePurple\RateLimit\Adapter\Redis($redis);

$rateLimit = new \PalePurple\RateLimit\RateLimit("myratelimit", 1, 60, $adapter);

$id = "127.0.0.1";

if ($rateLimit->check($id)) {
    echo "passed";
} else {
    echo "rate limit exceeded";
}