Dalam proyek yang Anda sebutkan, yaitu "Deteksi dan Visualisasi Ancaman pada Microservice Menggunakan Suricata dan Grafana," masing-masing komponen memiliki fungsi spesifik yang berkontribusi terhadap keseluruhan sistem. Berikut adalah penjelasan mengenai fungsi dari setiap komponen:

1. Suricata
Fungsi: Suricata adalah sistem deteksi intrusi (IDS) dan pencegahan intrusi (IPS) yang digunakan untuk memantau lalu lintas jaringan secara real-time. Dalam proyek ini, Suricata berfungsi untuk:
Mendeteksi ancaman atau serangan terhadap microservices dengan menganalisis paket data yang masuk dan keluar.
Menghasilkan log dan alert ketika terdeteksi aktivitas mencurigakan atau serangan, seperti DDoS, port scanning, atau malware.
2. Loki
Fungsi: Loki adalah sistem pengumpulan log yang dirancang untuk menyimpan log dalam format terstruktur. Dalam konteks proyek ini:
Loki digunakan untuk mengumpulkan dan menyimpan log dari berbagai sumber termasuk output dari Suricata.
Memungkinkan pencarian cepat atas log-log tersebut serta integrasi dengan Grafana untuk visualisasi.
3. Promtail
Fungsi: Promtail adalah agen pengumpul log yang bekerja bersama dengan Loki. Fungsinya dalam proyek ini meliputi:
Mengambil log dari file-file tertentu (misalnya, file log Suricata) di server.
Mengirimkan data tersebut ke Loki agar dapat disimpan dan dianalisis lebih lanjut.
4. Grafana
Fungsi: Grafana adalah platform visualisasi data open-source yang memungkinkan pengguna membuat dashboard interaktif berdasarkan data dari berbagai sumber termasuk Loki. Dalam proyek ini:
Grafana digunakan untuk menampilkan visualisasi real-time dari ancaman jaringan berdasarkan data yang dikumpulkan oleh Suricata melalui Promtail ke dalam Loki.
Pengguna dapat melihat grafik, tabel, dan metrik lainnya terkait aktivitas jaringan serta potensi ancaman secara intuitif.
Kesimpulan
Dengan kombinasi keempat komponen ini—Suricata sebagai detektor ancaman, Promtail sebagai pengumpul log, Loki sebagai penyimpanan logs terstruktur, dan Grafana sebagai alat visualisasi—proyek ini mampu mendeteksi serta memvisualisasikan ancaman pada microservices secara efektif sehingga memberikan wawasan penting bagi keamanan jaringan aplikasi berbasis microservices tersebut.
