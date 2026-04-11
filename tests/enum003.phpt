--TEST--
Enums
--SKIPIF--
<?php
if (!extension_loaded("msgpack")) {
    exit('skip because msgpack extension is missing');
}
if (version_compare(PHP_VERSION, '8.1.0', '<')) {
    exit('skip Enum tests in PHP older than 8.1.0');
}
if (defined("PHP_DEBUG") && PHP_DEBUG) {
    die('skip debug build');
}
?>
--FILE--
<?php
namespace test;

class TestEnum {

}

$unpacked = msgpack_unpack(file_get_contents(__DIR__."/enum002.ser.txt"));
var_dump($unpacked);
?>
DONE
--EXPECTF--
Warning: [msgpack] (msgpack_unserialize_map_item) Class test\TestEnum is expected to be an Enum in %senum003.php on line 8
array(1) {
  ["enum"]=>
  NULL
}
DONE
