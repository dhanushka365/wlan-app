## migrate DB
-  php artisan make:migration create_db_power_meter_tabel
-  php artisan make:migration create_db_device_control_tabel
-  php artisan migrate

## Controller create
-  php artisan make:controller Device/DeviceController   

## serve app
-  php artisan serve --host=0.0.0.0 --port=8000