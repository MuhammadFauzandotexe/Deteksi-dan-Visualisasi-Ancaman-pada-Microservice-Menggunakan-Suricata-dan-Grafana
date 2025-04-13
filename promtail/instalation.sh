sudo apt update && sudo apt upgrade -y
sudo apt install wget unzip -y
wget https://github.com/grafana/loki/releases/latest/download/promtail-linux-amd64.zip

#Ektrak dan pinhdakan file
unzip promtail-linux-amd64.zip
sudo mv promtail-linux-amd64 /usr/local/bin/promtail
sudo chmod +x /usr/local/bin/promtail

promtail --version


Konfigurasi Promtail

sudo mkdir -p /etc/promtail
sudo nano /etc/promtail/config.yml /etc/promtail/


promtail -config.file /etc/promtail/config.yml
promtail -config.file /etc/promtail/config.yml & # task background


run as service

###
[Unit]
Description=Promtail service
After=network.target

[Service]
ExecStart=/opt/promtail -config.file=/etc/promtail-config.yaml
Restart=always

[Install]
WantedBy=multi-user.target
'

vi /etc/systemd/system/promtail.service

sudo nano /etc/promtail/config.yml /etc/promtail/


sudo systemctl daemon-reexec
sudo systemctl daemon-reload
sudo systemctl enable --now promtail

