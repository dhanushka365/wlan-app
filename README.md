## migrate DB
-  php artisan make:migration create_db_power_meter_tabel
-  php artisan make:migration create_db_device_control_tabel
-  php artisan make:migration create_admins_table
-  php artisan migrate

## model create
-  php artisan make:model Admin

## middleware create
-  php artisan make:middleware Admin

## database seeder create
-  php artisan make:seeder AdminsTableSeeder
-  php artisan db:seed

## Controller create
-  php artisan make:controller Device/DeviceController   

## serve app
-  php artisan serve --host=0.0.0.0 --port=8000

## image upload
-  composer require intervention/image