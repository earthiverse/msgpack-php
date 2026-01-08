--TEST--
Issue #181 (zend_mm_heap corrupted when serializing/unserializing Enum)
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
Test
<?php

require  __DIR__ . '/issue181.enum.txt';

$original = (object)[
    'either' => TestEnum::EITHER,
    'other' => TestEnum::OTHER,
];

for ($i = 0; $i < 10; $i++) {
    $packed = msgpack_pack($original);
    $unpacked = msgpack_unpack($packed);
    if ($unpacked->either !== TestEnum::EITHER) {
        echo 'either mismatch';
    }
    if ($original->other !== TestEnum::OTHER) {
        echo 'other mismatch';
    }
    unset($packed);
    unset($unpacked);
}
?>
OK
--EXPECT--
Test
OK
