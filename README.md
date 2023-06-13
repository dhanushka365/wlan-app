# Our Presentation Slides
[WLAN EDGE COMPUTER.pptx](https://github.com/dhanushka365/wlan-app/files/11730419/WLAN.EDGE.COMPUTER.pptx)


# User Interfaces
![index](https://github.com/dhanushka365/wlan-app/assets/66137046/3e514679-ef82-49bc-8117-f482b5bdb8d8)
![landingpage1](https://github.com/dhanushka365/wlan-app/assets/66137046/4c737605-ee20-4d8d-ba83-51e7e60a7928)
![landingpage2](https://github.com/dhanushka365/wlan-app/assets/66137046/ddee0b36-9abb-47e7-b0e2-6b49ac5c2fe7)
![login](https://github.com/dhanushka365/wlan-app/assets/66137046/541dc1f4-0fe5-4bf6-9fcd-fdbc1c4b03e6)

![Energydashboard](https://github.com/dhanushka365/wlan-app/assets/66137046/dada679f-39c4-4f85-b24b-01bb82e0bf73)
![Devicedashboard](https://github.com/dhanushka365/wlan-app/assets/66137046/12d67085-b47d-4f5a-8a2f-82e0aed5b567)

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

