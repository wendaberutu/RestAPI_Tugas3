# Web to do list dan autentifikasi login, logout dengan laravel
ini adalah website sederhana untuk memenuhi tugas kuliah Rest API 

## Fitur 

** landing page** 
ini berisi informasi peribadi penulis dan tampilan untuk login 

** Autenifikasi Penggunaa** 
- pengguna dapat login dan logout dengan menggunakan email dan password
- rute yng dilindungi yang hanya dapat di akses oleh pengguna yang sudah login

** Manajement TO-Do List** 
- menambahkan tugas baru
- menandai tugas selesai
- menghapus tugas

  ### instalasi
1. buat project baru di laravel dengan nama project dengan code berikut '
   composer create-project --prefer-dist laravel/laravel nama-proyek-anda
2. design landing page anda
   ![image](https://github.com/user-attachments/assets/18514ee6-581d-4716-88ec-e79a461537a8)

4. design login dan logout dengan controler
   **auth controler untuk login dan logout
   ![image](https://github.com/user-attachments/assets/13734327-1666-4698-a717-65b4470be0b2)

   ** buat seeder untuk database login agar bisa memasukkan email dan password
   ![image](https://github.com/user-attachments/assets/4de7a763-9e99-44fa-8bd6-0bc54c7b8661)

   tampilan login
   ![image](https://github.com/user-attachments/assets/16f7fb3f-b445-4a9b-be6f-4553fa67ea2f)

5. buat halaman home setelah login
   ![image](https://github.com/user-attachments/assets/a8297599-fa19-4391-bd58-4caa80184df1)

6. buat controller untuk task( to do list )
   ![image](https://github.com/user-attachments/assets/4091f7f2-f618-48ea-b7d5-143a3d3a21c8)

   **tampilan to do list
   ![image](https://github.com/user-attachments/assets/6f3aa79d-3361-4de2-b41a-8ec523ff7e69)


   
