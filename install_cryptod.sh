#!/usr/bin/env bash
# bash <(curl -s https://raw.githubusercontent.com/wcrama/crypto-rpc/master/install_cryptod.sh)
clear
cat <<'EOF'
                                                                              
 ___  ________   ________  _________  ________  ___       ___          
|\  \|\   ___  \|\   ____\|\___   ___\\   __  \|\  \     |\  \         
\ \  \ \  \\ \  \ \  \___|\|___ \  \_\ \  \|\  \ \  \    \ \  \        
 \ \  \ \  \\ \  \ \_____  \   \ \  \ \ \   __  \ \  \    \ \  \       
  \ \  \ \  \\ \  \|____|\  \   \ \  \ \ \  \ \  \ \  \____\ \  \____  
   \ \__\ \__\\ \__\____\_\  \   \ \__\ \ \__\ \__\ \_______\ \_______\
    \|__|\|__| \|__|\_________\   \|__|  \|__|\|__|\|_______|\|_______|
                   \|_________|                                        
                                                                       
                                                                       
 ________  ________      ___    ___ ________  _________  ________     
|\   ____\|\   __  \    |\  \  /  /|\   __  \|\___   ___\\   __  \    
\ \  \___|\ \  \|\  \   \ \  \/  / | \  \|\  \|___ \  \_\ \  \|\  \   
 \ \  \    \ \   _  _\   \ \    / / \ \   ____\   \ \  \ \ \  \\\  \  
  \ \  \____\ \  \\  \|   \/  /  /   \ \  \___|    \ \  \ \ \  \\\  \ 
   \ \_______\ \__\\ _\ __/  / /      \ \__\        \ \__\ \ \_______\
    \|_______|\|__|\|__|\___/ /        \|__|         \|__|  \|_______|
                       \|___|/                                        
                                                                                                                   
                        
                            Creator: WCRAMA                                                                                                                    
                        -Find simple solutions-										
                    
EOF
cat <<EOF
Welcome to the AUTOMATED CRYPOCURRENCY INSTALLER
1. By pressing 'y' you agree to run the crypto daemon installation script to your system.
EOF

read -p "Are you sure you want to continue? <y/N> " prompt
if [[ $prompt == "y" || $prompt == "Y" || $prompt == "yes" || $prompt == "YES"|| $prompt == "Yes" ]]
then
  echo "Running Update..."
  sudo apt-get update -y
  echo "Done..."
  echo "Running Upgrade..."
  sudo apt-get upgrade -y
  echo "Upgrade Done..."
else
  echo "Cancelled"
fi


read -p "Install DOCKER ? <y/N> " prompt
if [[ $prompt == "y" || $prompt == "Y" || $prompt == "yes" || $prompt == "YES"|| $prompt == "Yes" ]]
then
sudo apt install docker.io -y
else
  echo "Cancelled"
fi

read -p "Install Bitcoin ? <y/N> " prompt
if [[ $prompt == "y" || $prompt == "Y" || $prompt == "yes" || $prompt == "YES"|| $prompt == "Yes" ]]
then
  sudo apt-add-repository ppa:bitcoin/bitcoin
  echo "Added bitcoin to repository"
  sudo apt-get update -y
  echo "Preparing bitcoind for installation..."
  sudo apt-get install bitcoind
else
  echo "Cancelled"
fi

read -p "Install DOCKER + NANO ? <y/N> " prompt
if [[ $prompt == "y" || $prompt == "Y" || $prompt == "yes" || $prompt == "YES"|| $prompt == "Yes" ]]
then

  sudo apt install docker.io -y
  docker pull nanocurrency/nano
  sudo docker run -d --restart unless-stopped -p 7075:7075/udp -p 7075:7075 -p [::1]:7076:7076 -v ~:/root nanocurrency/nano
  sudo docker ps
  cd /Nano
  echo "sudo docker restart xxxxxxxxxxxx"
  echo "sudo docker exec xxxxxxxxxxxx rai_node --wallet_create"
  echo "sudo docker exec 69848144a7c8 rai_node --account_create --wallet=xxxxxxxxxxxxxxxxxxxxxx"
  echo "Finished... Check if node is running..."
  
  
else
  echo "Cancelled"
fi

exit 0
