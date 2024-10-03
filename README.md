## Wenda Beurutu (215314190)
# Tugas Rest API CLint Dan Server untuk Todo list 

## Dokumentsi ResTFUll Api denga open API
### saya membuat dokumentasi di folder sendiri di Docs/openAPItodo.json

![image](https://github.com/user-attachments/assets/5e93c592-d274-4e76-8aa4-0a52756b1b9c)

#### Get Todo 
![image](https://github.com/user-attachments/assets/0d433a8f-563a-4b10-869c-5e14f030e6bc)
#### Post Todo ( membuat todo baru ) 
![image](https://github.com/user-attachments/assets/2138af09-0e10-4c2d-bef9-4aa9a891445d)
#### menampilkan Get berdasarkan ID 
![image](https://github.com/user-attachments/assets/1e4c8c37-dd9e-4513-8a81-f08164139f7e)
#### memperbaharui todo
![image](https://github.com/user-attachments/assets/7dd7331e-e284-4902-b6c6-1341994ba37c)
#### menghapus berdasarkan ID 
![image](https://github.com/user-attachments/assets/bca03b46-8e2a-499a-917b-ab7b0f2f3c2a)


# setelah membuat dokumentasi menggunakan Open API maka buat lah API SERVER

### berikut langkah-langkah membuat API 
 #### 1. buat routes API 
          yang akan digunakan untuk memanggil dan membuat API nya 
 #### 2. buat controller khusus API 
          controller ini berguna untuk membuat API servernya disini saya membuat GET, POST, GET ID , PUT, dan Delete 

# setelah semua berhasil API DI Test di Client dengan Postman
## membuka postman 
 disini setelah dibuka buat new workspace atau new http kemudian masukkan link dari API server yang telah dibuat disini saya masih local
 # http://127.0.0.1:8000/api/todos
 # GET
 ![image](https://github.com/user-attachments/assets/12f11a0d-cace-4a68-8c27-8286cbf7a4bb)

 kemudian ketika di klik send akan menampilkan semua data base yang dimili oleh si server 
 ![image](https://github.com/user-attachments/assets/c87dc8e4-4516-44a4-b0dc-7de00cf8fd91)

# post 
kemudiaan ubah menjadi method post lalu isi key dan value nya disini saya memiliki nama dan completed. 
![image](https://github.com/user-attachments/assets/4a868b5d-c20c-43da-853b-fb3187660c97)
setelah memasukkan key dan value nya klik send maka dia akan menambahkan data yang sudah kita buat 
![image](https://github.com/user-attachments/assets/a13028d8-03ca-451b-b619-e9f8ab21a2d1)

# put 
mengubah data dengan cara mencari dengan id nya yang tadinya seperti berikut
![image](https://github.com/user-attachments/assets/6ee6a479-0b6d-4bae-84a7-2a8284ba3dee)
di ubah menjadi  seperti dibawah dan akan menampilkan berhasil atau tidak 
![image](https://github.com/user-attachments/assets/2c6607fa-4332-4014-9484-87c0ab788d1e)

# delete
berguna untuk menghapus data nya 
![image](https://github.com/user-attachments/assets/c7f04926-dc87-4d34-87fb-0e4260ac7536)
setelah di klik send maka akan menampilkan pesan berhasil di hapus







          


