<?php

  // Load jsonRPCClient and Connect to daemon via localhost.
  
  require_once 'jsonRPCClient.php';
  echo "<script>console.log('Trying to connect')</script>";
  
  // Insert username & password (same as .conf file) and change PORT  (BTC = 8332)
  
  $crypto = new jsonRPCClient('http://username:password@127.0.0.1:PORT/');
  
  // Show Wallet Info.

  echo "<script>console.log('Trying to getwalletinfo')</script>";
  echo "<h1>Getinfo</h1><pre>\n";
  print_r($crypto->getwalletinfo()); 
  echo "\n";
  echo "</pre>";
  
  // Show Balance
  echo "<script>console.log('Trying to getbalance')</script>";
  echo "<h1>Balance</h1><pre>\n";
  print_r($crypto->getbalance()); 
  echo "\n";
  echo "</pre>";

?>
