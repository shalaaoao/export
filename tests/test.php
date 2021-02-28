<?php
require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');

//echo \Laoyuegou\Export\Convert::instance()
//                              ->setTitle(['第一列', '第二列'])
//                              ->setContent([[111, 222]])
//                              ->doExport(\Laoyuegou\Export\Convert::TYPE_CONSOLE)->getCsvString();

echo \Laoyuegou\Export\Convert::instance()
                              ->setTitle(['第一列', '第二列'])
                              ->setContent([[111, 222]])
                              ->doExport(\Laoyuegou\Export\Convert::TYPE_CSV_EXPORT)->getServerUrl().PHP_EOL;
