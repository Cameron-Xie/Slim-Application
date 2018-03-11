<?php declare(strict_types = 1);

/*
 * Load .env
 */
(new Dotenv\Dotenv(__DIR__ . '/../', '.app.env'))->load();

return new \Noodlehaus\Config(__DIR__ . '/../config');