sudo apt update
sudo apt install musl

wget https://dl.grafana.com/enterprise/release/grafana-enterprise_10.3.1_amd64.deb
sudo dpkg -i grafana-enterprise_10.3.1_amd64.deb

sudo systemctl start grafana-server
sudo systemctl enable grafana-server


#rate({job="suricata", source="eve-json"}[$__auto])