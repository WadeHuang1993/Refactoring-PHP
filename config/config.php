<?php

require_once (dirname(__FILE__) . '/../libs/Composer/vendor/autoload.php');

define('WEB_NAME', '微相簿');
define('WEB_DESCRIPTION', '輕量級, 快速, 酷炫');
define('COPY_RIGHT', 'Copyright © 2018 WadeHuang1993. All Rights Reserved.');

define('WEB_URL', 'http://learn.refactor.io/');
define('WEB_ROOT', WEB_URL);

define('IMAGE_ROOT', WEB_URL . 'assets/image/photos/');

require_once (dirname(__FILE__) . '/../common/db.php');