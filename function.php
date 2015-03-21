#!/usr/bin/php

<?php

// PHP automatically fills an $argv 
print_r($argv);

$params = getCliParams($argv);

print_r($params);

buildSentence($params);

function getCliParams($argv) {
  $params = array();
  foreach($argv as $i => $arg) {
    if (substr($arg, 0, 2) == '--') {
      $paramName = substr($arg, 2, strlen($arg));
      $nextArg = $argv[$i+1];
      if (is_string($nextArg) && substr($nextArg, 0, 2) == '--') {
        $params[$paramName] = True;
      }
      else {
        $params[$paramName] = $nextArg;
      }
    }
  }
  return $params;
}

function buildSentence($params) {
  print 'The ' . $params['firstWord'] . ' is ' . $params['secondWord'] . '.';
}

?>
