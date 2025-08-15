# Panduan Implementasi Mikrotik Radius

Panduan ini membantu menambahkan dukungan Radius pada Router Mikrotik dan mengintegrasikannya dengan MIKHMON v3.

## Persyaratan
- Router Mikrotik dengan RouterOS versi 6.45 atau lebih baru
- Server Radius (contoh: FreeRADIUS) yang sudah terpasang
- Akses ke MIKHMON v3

## Konfigurasi Server Radius
1. Install server Radius, misalnya pada Ubuntu:
   ```bash
   sudo apt update && sudo apt install freeradius
   ```
2. Tambahkan Mikrotik sebagai klien di `clients.conf`:
   ```
   client mikrotik {
       ipaddr = 192.168.88.1
       secret = rahasiaRadius
   }
   ```
3. Restart layanan Radius untuk menerapkan perubahan:
   ```bash
   sudo systemctl restart freeradius
   ```

## Konfigurasi Mikrotik
1. Tambah server Radius:
   ```
   /radius add service=hotspot address=IP_RADIUS secret=rahasiaRadius authentication-port=1812 accounting-port=1813
   ```
2. Aktifkan penggunaan Radius pada profil hotspot:
   ```
   /ip hotspot profile set [find name=default] use-radius=yes
   ```
3. Pastikan firewall mengizinkan komunikasi ke server Radius.

## Integrasi dengan MIKHMON
1. Masuk ke MIKHMON.
2. Buka menu **Settings > Radius**.
3. Isi alamat server, secret, dan port sesuai konfigurasi di atas.
4. Simpan lalu lakukan uji login hotspot.

## Uji Coba
1. Buat user pada server Radius.
2. Lakukan login melalui portal hotspot Mikrotik.
3. Periksa tab **Status** di MIKHMON untuk memastikan autentikasi dan accounting Radius berjalan.

Panduan ini memberikan gambaran dasar integrasi Radius dengan Mikrotik.
Sesuaikan kembali konfigurasi agar sesuai kebutuhan jaringan Anda.
