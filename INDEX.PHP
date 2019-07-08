<?php

/*                                       
The MIT License (MIT)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
====================
*/

  // Load jsonRPCClient and Connect to daemon via localhost.
  
  require_once 'jsonRPCClient.php';
  echo "<script>console.log('Trying to connect')</script>";
  
  // Insert username & password (same as .conf file) and change PORT  (BTC = 8332 / TESTNET = 18333)
  
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
