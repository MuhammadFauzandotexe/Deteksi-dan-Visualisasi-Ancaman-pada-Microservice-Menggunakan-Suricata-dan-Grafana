cd /usr/local/bin
rm loki  # hapus file zip yang salah

# Download binary yang BENAR, langsung versi Linux
wget https://github.com/grafana/loki/releases/download/v2.9.3/loki-linux-amd64.zip

# Rename dan kasih izin eksekusi
mv loki-linux-amd64 loki
chmod +x loki


sudo vi /etc/systemd/system/loki.service


sudo systemctl daemon-reload
sudo systemctl enable loki
sudo systemctl start loki



#wget https://github.com/grafana/loki/releases/download/v2.9.3/loki-linux-amd64.zip
#unzip loki-linux-amd64.zip
#sudo mv loki-linux-amd64 /usr/local/bin/loki
#sudo chmod +x /usr/local/bin/loki
#loki --version