sudo rm /etc/apt/sources.list.d/grafana.list
sudo rm /etc/apt/sources.list.d/grafana-oss.list
sudo rm /etc/apt/sources.list.d/*grafana*

sudo mkdir -p /usr/share/keyrings
wget -q -O - https://packages.grafana.com/gpg.key | sudo gpg --dearmor -o /usr/share/keyrings/grafana.gpg

echo "deb [signed-by=/usr/share/keyrings/grafana.gpg] https://packages.grafana.com/oss/deb stable main" \
| sudo tee /etc/apt/sources.list.d/grafana.list

sudo apt update
sudo apt install grafana

sudo systemctl start grafana-server
sudo systemctl enable grafana-server


Kalau sudah berhasil, akses Grafana di browser:

🔗 http://localhost:3000
atau
🔗 http://[IP_ADDRESS_SERVER]:3000

Login: admin / admin