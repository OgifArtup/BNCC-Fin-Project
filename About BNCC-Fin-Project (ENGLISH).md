Name : Figo Putra Mahawangsa

BNCC ID : BNCC2201295

BNCC-Fin-Project is a back-end website project that i made using laravel and myPhpAdmin(XAMPP) in order to finish my LnT BNCC Final Project. This website I made is an item listing mock website for a library that I named Toserba (Toko serba ada (Convinient Store in Indonesian), I named it because the library is a "Convinient Store" for books)

Download Steps :

1. Clone repository

2. Type in command prompt composer install

3. Make a new .env file (copy paste from .env example) #Note : must be in BNCC-Fin-Project directory

4. copy database in phpmyadmin #Note : database name is bncc_fin_project

5. Put database name in .env

6. Type in command prompt php artisan storage:link #Note : must be in BNCC-Fin-Project directory

7. Type in command prompt php artisan serve

================IF IMAGES DO NOT APPEAR================

1. Type in command prompt cd BNCC-Fin-Project/public

2. Type in command prompt rm storage #Note : type y for yes

3. Type in command prompt cd ..

4. Type in command prompt php artisan storage:link

===============================================================

When user logs in, the login page will be displayed. User first can register and then login. User can login as admin or user depending on the email and password inputted.

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

Navbar is displayed to user at the top of the page where user can go to view page and view cart. User can also click the dropdown button on the user's name at the top right. Dropdown will show user the option to see transaction history and logout button.

When user logs in, user will be displayed view-barang page where user can see all the items, filter items by category, and add items to cart.

On the view cart page, user can edit every item's quantity and delete the item's in the user's cart. After that users can checkout.

After checking out, user will be directed to the transaction's invoice. Then if go back button is clicked, user will be directed to transaction history page.

On the transaction history page, user can see all the transactions that has been made by the user. On each row, user can see transaction detail and download it as pdf.

===============================

ADMIN VIEW

Navbar is displayed to admin at the top of the page where admin can go to list item (list barang) page, add kategori (category), and add barang(item). Other than that, there is a dropdown button on the admin's name in the top right. On the dropdown menu, admin can logout.

When admin logs in, admin will be displayed with list of all item. On that page, all items in the database will be displayed on each row. Every item can be editted or deleted. There is also an Add New Barang(Item) button on the table for adding new items.

On the add barang and edit barang (item) page, admin will be asked to input nama(name), kategori(category), harga(price), jumlaH(quantity), and foto(photo) of the item.

On the add category page, admin can add category to the database. Other than that, below the add kategori form, admin can also see and delete each existing category.
