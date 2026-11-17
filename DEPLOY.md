# Deploy EKSERA ke Render

Aplikasi berjalan sebagai **Docker Web Service** di Render, database memakai
**Supabase PostgreSQL**, dan upload foto disimpan di **Supabase Storage**
(karena filesystem Render Free bersifat sementara).

```
Browser  ->  Render (Docker: PHP 8.4 + Apache)  ->  Supabase PostgreSQL
                                             \->  Supabase Storage (foto)
```

## Yang sudah disiapkan di repo

| File | Fungsi |
|---|---|
| `Dockerfile` | Build asset Vite + install Composer + PHP/Apache |
| `.dockerignore` | Mencegah `.env`, `vendor`, `node_modules` masuk image |
| `docker/entrypoint.sh` | Set port Render, cache config/view, jalankan migrasi |
| `docker/php.ini` | Batas upload 8 MB, OPcache, log ke stderr |
| `docker/apache.conf` | DocumentRoot ke `public/`, izinkan `.htaccess` |
| `render.yaml` | Blueprint Render (region Singapore, plan Free) |
| `config/filesystems.php` | Disk `public` bisa lokal atau Supabase Storage |
| `bootstrap/app.php` | `trustProxies` agar HTTPS di belakang proxy Render benar |

---

## Langkah 1 - Siapkan Supabase Storage

1. Buka **Supabase Dashboard -> Storage**.
2. Klik **New bucket**, isi:
   - Name: `eksera`
   - Public bucket: **aktif**
3. Buka **Storage -> Settings -> S3 access keys** (atau **Project Settings -> Storage**).
4. Catat tiga nilai berikut:
   - **Endpoint** (contoh `https://<ref>.supabase.co/storage/v1/s3`)
   - **Region** (untuk proyek ini biasanya `ap-northeast-1`)
   - **Access key ID** dan **Secret access key** (secret hanya tampil sekali)

> Bucket harus public karena Supabase S3 tidak mendukung header ACL.

## Langkah 2 - Deploy ke Render

### Cara A - Blueprint (paling cepat)

1. Buka <https://dashboard.render.com/blueprints> -> **New Blueprint Instance**.
2. Pilih repo `fitrianisuci542-ctrl/EKSERA`, branch `main`.
3. Render membaca `render.yaml`. Isi variabel yang diminta (`sync: false`):
   - `APP_KEY`
   - `DB_PASSWORD`
   - `AWS_ACCESS_KEY_ID`
   - `AWS_SECRET_ACCESS_KEY`
4. Klik **Apply** dan tunggu build selesai.
5. Setelah service jadi, salin URL-nya (mis. `https://eksera-xxxx.onrender.com`),
   tambahkan environment variable `APP_URL` dengan nilai tersebut, lalu
   **Manual Deploy -> Deploy latest commit**.

### Cara B - Manual Web Service

1. **New -> Web Service**, hubungkan repo EKSERA.
2. Isi:
   - **Language:** `Docker`
   - **Region:** `Singapore`
   - **Branch:** `main`
   - **Plan:** `Free`
   - **Health Check Path:** `/up`
3. Salin semua environment variable dari `render.yaml` ke tab **Environment**.
4. Deploy.

### Nilai environment penting

| Key | Value |
|---|---|
| `APP_KEY` | `base64:...` dari `.env` lokal (`php artisan key:generate --show`) |
| `APP_URL` | `https://<nama-service>.onrender.com` (isi setelah service dibuat) |
| `DB_PASSWORD` | password Supabase (jangan di-commit) |
| `AWS_ACCESS_KEY_ID` | Access key dari Supabase Storage |
| `AWS_SECRET_ACCESS_KEY` | Secret key dari Supabase Storage |
| `AWS_ENDPOINT` | endpoint S3 dari dashboard Supabase |
| `AWS_URL` | `https://<ref>.supabase.co/storage/v1/object/public/eksera` |

## Langkah 3 - Verifikasi

1. Buka `https://<service>.onrender.com/up` -> harus `200 OK`.
2. Login:
   - Admin: `admin@eksera.test` / `admin12345`
   - Pembina: `pembina@eksera.test` / `pembina12345`
3. Tambah/edit ekskul dengan foto, lalu cek file muncul di bucket `eksera`.
4. Restart service dari dashboard Render, pastikan foto tetap ada.

---

## Catatan Render Free

- Service tidur setelah 15 menit tanpa trafik; request pertama bisa lambat ~1 menit.
- Tidak ada Shell / pre-deploy command -> migrasi dijalankan oleh `docker/entrypoint.sh`.
- Build ulang otomatis setiap push ke `main`.
- Supabase Free bisa pause setelah 7 hari tanpa aktivitas database.

## Troubleshooting

| Gejala | Penyebab / solusi |
|---|---|
| Build gagal di `composer install` | Cek log; biasanya ekstensi PHP kurang di `Dockerfile` |
| 500 setelah deploy | Cek **Logs**; pastikan `APP_KEY` terisi dan `DB_*` benar |
| Foto tidak muncul | Cek `AWS_URL`, bucket harus public, dan `FILESYSTEM_PUBLIC_DRIVER=s3` |
| Upload gagal `AccessDenied` | Access key salah atau bucket bukan `eksera` |
| Session hilang saat pindah halaman | `SESSION_SECURE_COOKIE=true` hanya untuk HTTPS; pastikan `APP_URL` https |
| Error `route:cache` | Jangan jalankan `route:cache`/`optimize` (ada closure route) |
