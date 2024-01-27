<?php
// для отладки и проверки работы cron

$date = date('Y-m-d H:i:s');
echo PHP_EOL;
echo "=====";
echo PHP_EOL;
echo exec('whoami');
echo PHP_EOL;
echo "Current date and time is : $date";
