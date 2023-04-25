Nama : Figo Putra Mahawangsa

BNCC ID : BNCC2201295

BNCC-Fin-Project merupakan projek back-end website yang saya buat untuk menyelesaikan Final Project LnT BNCC saya. Website yang saya buat merupakan sebuah mock website pendataan barang sebuah perusahaan yang saya beri nama Toserba.

Download Steps :

1. Clone repository

2. ketik di command prompt composer install

3. Buat file .env baru(copas dari .env example)

4. copy database di phpmyadmin #Note : nama database bncc_fin_project

5. taro nama database di .env

6. ketik di command prompt php artisan key:generate

7. ketik di command prompt php artisan migrate

8. ketik di command prompt cd BNCC-Fin-Project/public

9. ketik di command prompt rm storage #klik yes

10. ketik di command prompt cd ..

11. ketik di command prompt php artisan storage:link

12. ketik di command prompt php artisan serve

Saat user pertama memasuki website, user akan ditampilkan login page. User bisa pertama melakukan registrasi lalu login. User bisa login sebagai admin atau role tergantung email dan password yang dimasukkan.

===============================

Admin :

-email = password

-admin1@gmail.com = admin1

-admin2@gmail.com = admin2

-admin3@gmail.com = admin3

===============================

User :

-maxim@gmail.com = maxim1

-nikolas@gmail.com = nikolas1

===============================

USER VIEW

User ditampilkan navbar pada atas page dimana user bisa pergi ke view page dan view cart. Selain itu user bisa memencet dropdown button pada nama user di atas kanan. Dropdown akan menampilkan menu melihat history transaction user dan logout.

Saat user login, user akan ditampilkan page view-barang dimana user dapat melihat barang, filter barang berdasarkan kategori, dan menambahkan barang ke cart.

Pada page view cart, user bisa mengedit jumlah tiap barang yang ingin dibeli dan menghapus barang user pada cart. Setelah itu user bisa checkout.

Setelah checkout, user akan ditunjukan invoice transaksi tersebut. Lalu jika pencet go back, user akan dialihkan ke page transaction history.

Pada page transaction history, user bisa melihat list semua transaksi yang pernah dilakukan user. Pada tiap row user bisa antara melihat detil transaction/invoice atau mendownload nya sebagai pdf.

===============================

ADMIN VIEW

Admin ditampilkan navbar pada atas page dimana admin bisa pergi ke page list barang, add kategori, dan add barang. Selain itu terdapat dropdown button pada nama admin di atas kanan page. Pada dropdown menu admin bisa logout.

Saat admin login, admin akan langsung ditampilkan dengan list semua barang yang ada. Pada page itu, akan ditampilkan semua barang yang ada di database pada tiap row. Tiap barang bisa di edit dan dihapus. Selain itu ada tombol Add New Barang pada tabel untuk menambahkan barang.

Pada page Add Barang dan edit barang, admin akan diminta untuk memasukkan nama, kategori, harga, jumlah, dan foto barang. 

Pada page add kategori, admin bisa menambahkan kategori baru ke database. Selain itu, dibawah form add kategori, admin juga bisa melihat dan menghapus tiap kategori yang ada.
