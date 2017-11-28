<?php
/**
 * How Include works
 */

//set_include_path(__DIR__ . '/vendor');

include 'file-to-include.php';
echo ini_get('include_path');


/**
 * @reminder:
 * - mention relative ../ paths, __DIR__, PATH_SEPARATOR
 * - same with require
 * - get_include_path();
 *
 */

//this could be required at beggining of the filefor same examples?
//clearstatcache(true);