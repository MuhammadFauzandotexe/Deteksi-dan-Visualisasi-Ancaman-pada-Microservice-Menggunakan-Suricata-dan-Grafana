sudo suricata-update
sudo systemctl restart suricata


cp /var/lib/suricata/rules/suricata.rules /etc/suricata/rules/suricata.rules



sudo apt update && sudo apt upgrade -y
sudo apt install -y software-properties-common curl apt-transport-https gnupg
sudo add-apt-repository ppa:oisf/suricata-stable -y
sudo apt update
sudo apt install -y suricata
suricata --build-info


vi /etc/suricata/suricata.yaml


sudo suricata -c /etc/suricata/suricata.yaml -i eth0


sudo systemctl enable suricata
sudo systemctl start suricata

sudo suricata-update

sudo systemctl restart suricata


sudo tail -f /var/log/suricata/fast.log
sudo tail -f /var/log/suricata/suricata.log


sudo suricata -c /etc/suricata/suricata.yaml -i eth0 --pcap


sudo suricata -c /etc/suricata/suricata.yaml -i eth0


default-rule-path: /var/lib/suricata/rules

rule-files:
  - test.rules

