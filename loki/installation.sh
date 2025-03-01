wget wget https://github.com/grafana/loki/releases/download/v2.9.3/loki-linux-amd64.zip  -O /usr/local/bin/loki
chmod +x /usr/local/bin/loki

sudo mkdir -p /etc/loki
sudo vi /etc/loki/config.yml


sudo vi /etc/systemd/system/loki.service


sudo systemctl daemon-reload
sudo systemctl enable loki
sudo systemctl start loki



#wget https://github.com/grafana/loki/releases/download/v2.9.3/loki-linux-amd64.zip
#unzip loki-linux-amd64.zip
#sudo mv loki-linux-amd64 /usr/local/bin/loki
#sudo chmod +x /usr/local/bin/loki
#loki --version

