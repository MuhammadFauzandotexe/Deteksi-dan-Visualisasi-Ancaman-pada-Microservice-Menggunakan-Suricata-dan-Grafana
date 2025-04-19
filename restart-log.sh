#pkill promtail
#pkill loki
#pkill grafana-server
#pkill suricata

systemctl stop loki
systemctl stop promtail
systemctl stop grafana-server
systemctl stop suricata

sudo rm -rf /tmp/loki
sudo rm /tmp/positions.yaml
rm -rf /tmp/positions.yaml
rm -rf  /var/log/suricata/fast.log
rm -rf /var/log/suricata/suricata.log
rm -rf rm -rf  /var/log/suricata/eve.json

systemctl start loki
systemctl start promtail
systemctl start grafana-server
systemctl start suricata
