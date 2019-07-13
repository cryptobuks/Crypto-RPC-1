<?php
// https://docs.nano.org/running-a-node/docker-management/#starting
// https://1nano.co/support-the-network/

/* INSTALL NANO DAEMON 
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

*/

// Simple test script, return block_count 

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

?>
