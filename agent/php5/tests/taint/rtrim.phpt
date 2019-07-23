--TEST--
hook rtrim
--SKIPIF--
<?php
include(__DIR__.'/../skipif.inc');
?>
--INI--
openrasp.root_dir=/tmp/openrasp
--GET--
a=openrasp&b=test
--FILE--
<?php
$a = $_GET['a'];
$a0 = "\t\n\r\0\x0B$a\t\n\r\0\x0B";
$a0 = rtrim($a0);
var_dump(taint_dump($a0));
?>
--EXPECT--
array(1) {
  [0]=>
  array(3) {
    ["source"]=>
    string(10) "$_GET['a']"
    ["startIndex"]=>
    int(5)
    ["endIndex"]=>
    int(12)
  }
}