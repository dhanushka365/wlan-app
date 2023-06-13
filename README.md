# Our Presentation Slides
![ppt](https://github.com/dhanushka365/wlan-app/assets/66137046/645dfe6c-a3b9-432b-9b52-3fbba17e9e16)


[WLAN EDGE COMPUTER.pptx](https://github.com/dhanushka365/wlan-app/files/11730419/WLAN.EDGE.COMPUTER.pptx)


# User Interfaces
![index](https://github.com/dhanushka365/wlan-app/assets/66137046/3e514679-ef82-49bc-8117-f482b5bdb8d8)
![landingpage1](https://github.com/dhanushka365/wlan-app/assets/66137046/4c737605-ee20-4d8d-ba83-51e7e60a7928)
![landingpage2](https://github.com/dhanushka365/wlan-app/assets/66137046/ddee0b36-9abb-47e7-b0e2-6b49ac5c2fe7)
![login](https://github.com/dhanushka365/wlan-app/assets/66137046/541dc1f4-0fe5-4bf6-9fcd-fdbc1c4b03e6)

![Energydashboard](https://github.com/dhanushka365/wlan-app/assets/66137046/dada679f-39c4-4f85-b24b-01bb82e0bf73)
![Devicedashboard](https://github.com/dhanushka365/wlan-app/assets/66137046/12d67085-b47d-4f5a-8a2f-82e0aed5b567)
![cammera](https://github.com/dhanushka365/wlan-app/assets/66137046/171abb37-f21f-4abf-92d2-5c4dba1dc8c6)
![posedetction](https://github.com/dhanushka365/wlan-app/assets/66137046/9c0b1288-1c45-4e6d-aa8a-3487dd5a3bf3)
![face detection](https://github.com/dhanushka365/wlan-app/assets/66137046/e428b2d4-295f-41ad-9296-aca992492e42)

![password update](https://github.com/dhanushka365/wlan-app/assets/66137046/2c91f5d6-2958-4afa-9306-9a59e9ab8ef4)
![update details](https://github.com/dhanushka365/wlan-app/assets/66137046/e6976acf-9ec5-4cc0-a7a3-39ca1ec551bb)


# Oonly for development purpose

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

