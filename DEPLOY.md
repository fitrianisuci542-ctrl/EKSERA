# Deploy EKSERA

Aplikasi Laravel ini memakai:

- **EthioDeploy Free** sebagai hosting utama (native Laravel: nginx + PHP-FPM).
- **Supabase PostgreSQL** sebagai database.
- **Supabase Storage** (S3-compatible) untuk foto upload, karena filesystem
  container bersifat sementara.

```
Browser  ->  EthioDeploy (nginx + PHP-FPM)  ->  Supabase PostgreSQL
                                          \->  Supabase Storage (foto)
```

Render masih bisa dipakai sebagai alternatif. Dockerfile untuk Render ada di
`Dockerfile.render` (bukan `Dockerfile` di root) supaya EthioDeploy mendeteksi
Laravel secara native.

## File pendukung

| File | Fungsi |
|---|---|
| `Dockerfile.render` | Image Render: Vite + Composer + PHP 8.4/Apache |
| `docker/entrypoint.sh` | Set port, cache config/route/view, migrasi, start Apache |
| `docker/php.ini` | Batas upload 8 MB, OPcache, log ke stderr |
| `docker/apache.conf` | DocumentRoot ke `public/`, izinkan `.htaccess` |
| `render.yaml` | Blueprint Render (region Singapore, plan Free) |
| `config/filesystems.php` | Disk `public` bisa lokal atau Supabase Storage |
| `bootstrap/app.php` | `trustProxies` agar HTTPS di belakang proxy benar |

---

## Langkah 1 - Siapkan Supabase Storage

1. Buka **Supabase Dashboard -> Storage**.
2. Klik **New bucket**, isi:
   - Name: `eksera`
   - Public bucket: **aktif**
3. Buka **Storage -> S3 Access Keys** (atau **Project Settings -> Storage**).
4. Buat access key baru dan catat:
   - **Access key ID**
   - **Secret access key** (hanya tampil sekali)
5. Nilai koneksi untuk proyek ini:
   - Endpoint: `https://rhuxirysaknhtpdnjhnh.supabase.co/storage/v1/s3`
   - Region: `ap-northeast-1`
   - Public URL: `https://rhuxirysaknhtpdnjhnh.supabase.co/storage/v1/object/public/eksera`
   - Path-style endpoint: `true`

> Bucket harus public karena Supabase S3 tidak mendukung header ACL.

## Langkah 2 - Deploy ke EthioDeploy

### 2.1 Buat akun dan hubungkan repo

1. Login ke <https://ethiodeploy.com> dengan GitHub.
2. Install **EthioDeploy GitHub App** pada repo
   `fitrianisuci542-ctrl/EKSERA` (butuh akses admin ke repo).
3. Buat **API token** di **Settings -> API tokens**, atau jalankan:

   ```bash
   npx -y ethiodeploy login
   ```

### 2.2 Buat project

Dari root repo:

```bash
npx -y ethiodeploy new --no-deploy \
  --start "php artisan migrate --force && ethiodeploy-start"
```

Jika project untuk repo ini sudah ada, gunakan `ethiodeploy init` atau
`ethiodeploy projects` untuk melihatnya.

Catat URL project, misalnya `https://eksera-app.ethiodeploy.app`.

### 2.3 Set environment variables

Semua nilai berikut diisi di **Settings -> Environment** (atau lewat
`ethiodeploy env set`). Jangan commit nilai secret ke repo.

| Key | Value |
|---|---|
| `APP_NAME` | `EKSERA` |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_KEY` | `base64:...` dari `.env` lokal (pakai key yang sama) |
| `APP_URL` | `https://<project>.ethiodeploy.app` |
| `APP_LOCALE` | `id` |
| `APP_FALLBACK_LOCALE` | `en` |
| `APP_FAKER_LOCALE` | `id_ID` |
| `LOG_CHANNEL` | `stderr` |
| `LOG_LEVEL` | `info` |
| `DB_CONNECTION` | `pgsql` |
| `DB_HOST` | `aws-1-ap-northeast-1.pooler.supabase.com` |
| `DB_PORT` | `5432` |
| `DB_DATABASE` | `postgres` |
| `DB_USERNAME` | `postgres.rhuxirysaknhtpdnjhnh` |
| `DB_PASSWORD` | password Supabase (secret) |
| `DB_SSLMODE` | `require` |
| `SESSION_DRIVER` | `database` |
| `SESSION_SECURE_COOKIE` | `true` |
| `CACHE_STORE` | `database` |
| `QUEUE_CONNECTION` | `sync` |
| `MAIL_MAILER` | `log` |
| `FILESYSTEM_PUBLIC_DRIVER` | `s3` |
| `AWS_ACCESS_KEY_ID` | access key Supabase (secret) |
| `AWS_SECRET_ACCESS_KEY` | secret key Supabase (secret) |
| `AWS_DEFAULT_REGION` | `ap-northeast-1` |
| `AWS_BUCKET` | `eksera` |
| `AWS_ENDPOINT` | `https://rhuxirysaknhtpdnjhnh.supabase.co/storage/v1/s3` |
| `AWS_URL` | `https://rhuxirysaknhtpdnjhnh.supabase.co/storage/v1/object/public/eksera` |
| `AWS_USE_PATH_STYLE_ENDPOINT` | `true` |

Tandai `APP_KEY`, `DB_PASSWORD`, `AWS_ACCESS_KEY_ID`, dan
`AWS_SECRET_ACCESS_KEY` sebagai **sensitive/runtime-only** jika opsi itu
tersedia. Perubahan env baru berlaku setelah redeploy.

### 2.4 Deploy

```bash
npx -y ethiodeploy deploy
npx -y ethiodeploy logs -f
```

Build akan menjalankan `composer install --no-dev`, `npm run build`, lalu start
command di atas. Health check default `/` menerima status 302; `/up` juga bisa
dipakai sebagai health check path.

---

## Langkah 3 - Verifikasi

1. Buka `https://<project>.ethiodeploy.app/up` -> harus `200 OK`.
2. Buka `/login` dan login:
   - Admin: `admin@eksera.test` / `admin12345`
   - Pembina: `pembina@eksera.test` / `pembina12345`
   - Siswa: `test@example.com` / `password`
3. Upload foto (misalnya lewat edit ekskul atau profil), lalu pastikan URL foto
   mengarah ke `https://rhuxirysaknhtpdnjhnh.supabase.co/storage/v1/object/public/eksera/...`.
4. Redeploy atau tunggu app tidur lalu bangunkan; foto harus tetap tampil.
5. Cek logs untuk error 500/DB.

---

## Alternatif: Render

Render memakai `Dockerfile.render` lewat `render.yaml`:

```yaml
dockerfilePath: ./Dockerfile.render
```

Langkahnya sama seperti sebelumnya: buat Blueprint dari `render.yaml`, isi
`APP_KEY`, `DB_PASSWORD`, `AWS_ACCESS_KEY_ID`, dan `AWS_SECRET_ACCESS_KEY`,
lalu set `APP_URL` setelah service dibuat.

## Catatan Free Plan

- EthioDeploy Free: app tidur setelah 30 menit tanpa trafik; request pertama
  bisa menunggu sampai ~30 detik.
- RAM 256 MB / 0.5 CPU; native nginx + PHP-FPM lebih ringan daripada Apache.
- Render Free: tidur setelah 15 menit; request pertama bisa ~1 menit.
- Supabase Free bisa pause setelah 7 hari tanpa aktivitas database.
- Migrasi dijalankan otomatis saat start (`migrate --force`), aman dan
  idempotent. Jangan jalankan `migrate:fresh` di production.

## Troubleshooting

| Gejala | Penyebab / solusi |
|---|---|
| Build gagal di `composer install` | Cek log; biasanya ekstensi PHP kurang |
| 500 setelah deploy | Cek logs; pastikan `APP_KEY` terisi dan `DB_*` benar |
| `route:cache` gagal | Ada route closure baru; ubah ke controller/redirect |
| Foto tidak muncul | Cek `AWS_URL`, bucket harus public, `FILESYSTEM_PUBLIC_DRIVER=s3` |
| Upload gagal `AccessDenied` | Access key salah atau bucket bukan `eksera` |
| Session hilang | `SESSION_SECURE_COOKIE=true` hanya untuk HTTPS; pastikan `APP_URL` https |
| Redirect ke `http://` | Pastikan `trustProxies` aktif dan `APP_URL` memakai https |
