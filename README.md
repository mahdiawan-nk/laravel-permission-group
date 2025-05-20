Berikut adalah dokumentasi dalam format Markdown (`README.md`) yang dapat kamu pakai langsung untuk dokumentasi package **`mahdiawan-nk/laravel-permission-group`**:

---

````markdown
# Laravel Permission Group

Laravel Permission Group adalah package tambahan untuk Laravel yang memungkinkan kamu mengelompokkan permission berdasarkan grup tertentu. Sangat cocok digunakan dalam sistem Role-Based Access Control (RBAC) untuk organisasi atau aplikasi berskala besar.

## 🧩 Fitur

-   Mengelompokkan permission ke dalam grup
-   Integrasi mudah dengan Laravel (auto-discovery support)
-   PSR-4 autoloading
-   Siap digunakan dalam Laravel 9, 10, 11, dan 12
-   Cocok digunakan bersama package seperti Spatie Laravel-Permission

---

## 📦 Instalasi

Untuk menginstal package ini, cukup jalankan perintah berikut:

```bash
composer require mahdiawan-nk/laravel-permission-group
```
````

> Pastikan kamu menggunakan PHP 8.1 atau lebih tinggi.

---

## ⚙️ Konfigurasi (Opsional)

Package ini menggunakan auto-discovery, jadi kamu **tidak perlu menambahkan service provider secara manual**. Namun jika kamu ingin melakukannya secara eksplisit:

```php
// config/app.php

'providers' => [
    MahdiawanNk\LaravelPermissionGroup\Providers\PermissionServiceProvider::class,
],
```

---

## ✅ Contoh Penggunaan

Kamu dapat menggunakan class helper atau facade untuk membuat grup permission baru:

```php
use MahdiawanNk\PermissionGroup\Facades\PermissionGroup;

PermissionGroup::create('Manajemen User', [
    'user.create',
    'user.edit',
    'user.delete',
]);
```

Menampilkan semua permission berdasarkan grup:

```php
$groups = PermissionGroup::allGrouped();

foreach ($groups as $group => $permissions) {
    echo "Group: $group\n";
    foreach ($permissions as $permission) {
        echo "- " . $permission->name . "\n";
    }
}
```

---

## 🧑‍💻 Kontribusi

Pull Request sangat diterima! Jika kamu menemukan bug atau ingin menambahkan fitur, silakan buka [issue](https://github.com/mahdiawan-nk/laravel-permission-group/issues) atau kirim PR.

---

## 📄 Lisensi

Package ini dilisensikan di bawah [MIT License](LICENSE).
"# laravel-permission-group" 
