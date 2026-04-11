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
?>
--FILE--
<?php
$unpacked = msgpack_unpack(file_get_contents(__DIR__."/enum002.ser.txt"));
var_dump($unpacked);
?>
DONE
--EXPECTF--
Warning: [msgpack] (msgpack_unserialize_map_item) Enum definition test\TestEnum could not be loaded in %senum002.php on line 2
array(1) {
  ["enum"]=>
  object(__PHP_Incomplete_Class)#1 (1) {
    ["__PHP_Incomplete_Class_Name"]=>
    string(13) "test\TestEnum"
  }
}
DONE
