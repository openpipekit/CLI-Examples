#!/usr/bin/php

<?php

/*
 * This file is an example of a function as a CLI.
 * Type a command like `./cli.php --firstWord foo --secondWord bar`
 */

print "PHP automatically fills an \$argv from info on the command line.";
print "\n\n";
print_r($argv);
print "\n\n";

print "Here are the parameters parsed from \$argv.";
print "\n\n";
$params = parseArgv($argv);
print_r($params);
print "\n\n";

print "Now we feed those parsed parameters to our function and voila!";
print "\n\n";
buildSentence($params);
print "\n\n";

/*
 * Functions
 */

function parseArgv($argv) {
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
