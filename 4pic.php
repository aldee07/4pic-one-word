<?php

if (!isset($argv[2])) {
    throw new \Exception("Insufficient arguments.");
}

$timeout = isset($argv[3]) ? $argv[3] : 25;

function guess($strIn, $len) {
  global $argv, $timeout;

  $pspell = pspell_new("en");
  $printed = [];

  echo "\n>> Listing possible values... [Press Ctrl+C to stop]\n\n";

  $start = time();
  $loop = true;

  while ($loop) {
      $str = substr(str_shuffle($strIn), 0, $len);
      // break after timeout
      if (time() - $start >= $timeout) {
          echo "\n\n>> Timeout reached. [0] Exit, [1] Retry, [2] New\n";
          $input = readline(">> Choice: ");
          echo "\n";

          switch ($input) {
            case 0: exit;
            case 1: 
              $start = time();
              $printed = [];
              continue 2;
            case 2:
              $loop = false;
              continue 2;
          }

          exit ("\n\n>> Completed. I'm tired!");
      } 

      if (pspell_check($pspell, $str) && !in_array($str, $printed)) {
          echo (count($printed) ? ", " : "\t") . $str;
          $printed[] = $str;
      }
  }

  echo ">> Enter new arguments (format is: `<characters> <length>`)\n";
  $in = readline(">> Input: ");
  $args = explode(' ', $in);

  if (count($args) < 2) {
    throw new \Exception("Insufficient arguments.");
  }

  guess($args[0], $args[1]);
  
}

guess($argv[1], $argv[2]);