--TEST--
hook ZEND_CONCAT VAR CV
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
$a0 = $_GET['a'].$a;
var_dump(taint_dump($a0));
?>
--EXPECT--
array(2) {
  [0]=>
  array(3) {
    ["source"]=>
    string(10) "$_GET['a']"
    ["startIndex"]=>
    int(0)
    ["endIndex"]=>
    int(7)
  }
  [1]=>
  array(3) {
    ["source"]=>
    string(10) "$_GET['a']"
    ["startIndex"]=>
    int(8)
    ["endIndex"]=>
    int(15)
  }
}