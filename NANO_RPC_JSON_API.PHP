<?php
// https://docs.nano.org/running-a-node/docker-management/#starting
// https://1nano.co/support-the-network/

/* INSTALL NANO DAEMON 

root@localhost:~# sudo apt install docker.io

root@localhost:~# sudo docker pull nanocurrency/nano

Using default tag: latest
latest: Pulling from nanocurrency/nano
xxxxxxxxxxxx: Pull complete
xxxxxxxxxxxx: Pull complete
xxxxxxxxxxxx: Pull complete
xxxxxxxxxxxx: Pull complete
xxxxxxxxxxxx: Pull complete
xxxxxxxxxxxx: Pull complete
xxxxxxxxxxxx: Pull complete
xxxxxxxxxxxx: Pull complete
xxxxxxxxxxxx: Pull complete
xxxxxxxxxxxx: Pull complete
Digest: sha256:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
Status: Downloaded newer image for nanocurrency/nano:latest
root@localhost:~# sudo docker run -d --restart unless-stopped -p 7075:7075/udp -p 7075:7075 -p [::1]:7076:7076 -v ~:/root nanocurrency/nano
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
root@localhost:~# sudo docker ps
CONTAINER ID        IMAGE               COMMAND                 CREATED             STATUS              PORTS                                                                NAMES
xxxxxxxxxxxx        nanocurrency/nano   "/bin/bash /entry.sh"   28 seconds ago      Up 27 seconds       0.0.0.0:7075->7075/tcp, 0.0.0.0:7075->7075/udp, ::1:7076->7076/tcp   tender_tu
root@localhost:~# ls
Nano
root@localhost:~# cd Nano/
root@localhost:~/Nano# ls
config.json  data.ldb  data.ldb-lock  log  nano-docker-output.log  wallets.ldb  wallets.ldb-lock
root@localhost:~/Nano# nano config.json
root@localhost:~/Nano# nano config.json
root@localhost:~/Nano# ^C
root@localhost:~/Nano# sudo docker restart xxxxxxxxxxxx
xxxxxxxxxxxx
root@localhost:~/Nano# sudo docker exec xxxxxxxxxxxx rai_node --wallet_create
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
root@localhost:~/Nano# sudo docker exec 69848144a7c8 rai_node --account_create --wallet=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
Account: xrb_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
root@localhost:~/Nano# curl -g -d '{ "action": "block_count" }' '[::1]:7076'
{
    "count": "5454",
    "unchecked": "418"
}
root@localhost:~/Nano#

********* EXTRA TEST CONTENT *********

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, '[::1]:7076');	//Localhost Port 7076
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \"action\": \"block_count\"}");	// This is the RPC command
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);


Simple test script, returns version. 
Save this script as api.php and create index.php with <btn id="version"></btn>

	$("#version").click(function (e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "/api.php",
			data: JSON.stringify({ 
			"action": "version" 
			}),
			success: function(result) {
			alert(result);
			console.log(result);
			},
			error: function(result) {
			alert(result);
			console.log(result);
			}
		});
	});

*/


$node = 'http://104.167.109.70:7076';
// don't forget to adjust RaiBlocks\config.json accordingly (enable RPC, adjust peer whitelist, enable_control) and also your firewall settings if necessary.

// The following array is a list of all RPC actions of node V15.2 - the most intrusive ones are commented out already.
// Further consideration is advised, e.g. disabling CPU/IO intense commands or disabling wallet and private key operations.
// For more lists of RPC commands, go to https://nanoo.tools/rpc-commands-list
$actions_allowed = array(
    "account_balance",
    "account_block_count",
    "account_count",
    "account_create",
    "account_get",
    "account_history",
    "account_info",
    "account_key",
    "account_list",
    "account_move",
    "account_remove",
    "account_representative",
    "account_representative_set",
    "account_weight",
    "accounts_balances",
    "accounts_create",
    "accounts_frontiers",
    "accounts_pending",
    "available_supply",
    "block",
    "block_confirm",
    "blocks",
    "blocks_info",
    "block_account",
    "block_count",
    "block_count_type",
    "block_create",
    "block_hash",
    "successors",
    // "bootstrap",
    "bootstrap_any",
    "chain",
    "confirmation_history",
    "delegators",
    "delegators_count",
    "deterministic_key",
    "frontiers",
    "frontier_count",
    "history",
    "keepalive",
    "key_create",
    "key_expand",
    "krai_from_raw",
    "krai_to_raw",
    "ledger",
    "mrai_from_raw",
    "mrai_to_raw",
    "password_change",
    "password_enter",
    "password_valid",
    "payment_begin",
    "payment_init",
    "payment_end",
    "payment_wait",
    "peers",
    "pending",
    "pending_exists",
    "process",
    "rai_from_raw",
    "rai_to_raw",
    "receive",
    "receive_minimum",
    "receive_minimum_set",
    "representatives",
    "representatives_online",
    "republish",
    "search_pending",
    "search_pending_all",
    "send",
    "stats",
    // "stop",
    "unchecked",
    // "unchecked_clear",
    "unchecked_get",
    "unchecked_keys",
    "validate_account_number",
    "version",
    "wallet_add",
    "wallet_add_watch",
    "wallet_balance_total",
    "wallet_balances",
    "wallet_change_seed",
    "wallet_contains",
    "wallet_create",
    "wallet_destroy",
    "wallet_export",
    "wallet_frontiers",
    "wallet_info",
    "wallet_key_valid",
    "wallet_ledger",
    "wallet_lock",
    "wallet_locked",
    "wallet_pending",
    "wallet_representative",
    "wallet_representative_set",
    "wallet_republish",
    "wallet_work_get",
    "work_generate",
    "work_cancel",
    "work_get",
    "work_set",
    "work_validate",
    "work_peer_add",
    "work_peers",
    // "work_peers_clear",
);
// trailing comma is valid when setting PHP arrays


// loading POST JSON data into an array
$request = file_get_contents('php://input');
$request_array = json_decode($request, true);

// exception if POST did not contain JSON
if (is_null($request_array)) {
    http_response_code(400);
    die('Malformed Request. You can only POST JSON');
}

// exception if JSON did not contain a RPC action
if (!array_key_exists('action', $request_array)) {
    http_response_code(400);
    die('Malformed request. Your JSON needs to use correct NANO RPC command syntax.');
}

$action_requested = $request_array['action'];

// check if action is allowed
if (!in_array($action_requested, $actions_allowed)) {
    http_response_code(403);
    die('Requested RPC action is forbidden on this node.');
} else {

    // redirect the POST JSON
    $ch = curl_init($node);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($request)
    ));

    $curl_result = curl_exec($ch);

    // connection errors go here:
    if (curl_errno($ch)) {
        echo 'Curl error while trying to reach node: ' . curl_error($ch) . '';
    } else {
        // results and node errors go here
        echo $curl_result;
    }
}

?>
