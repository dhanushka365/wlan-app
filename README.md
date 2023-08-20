# Our Presentation Slides
![ppt](https://github.com/dhanushka365/wlan-app/assets/66137046/645dfe6c-a3b9-432b-9b52-3fbba17e9e16)
[WLAN EDGE COMPUTER (2) (1).pptx](https://github.com/dhanushka365/wlan-app/files/11796906/WLAN.EDGE.COMPUTER.2.1.pptx)

# Video
[Link to Video](https://drive.google.com/file/d/1eqHiMNS1Fmv8Q1pyvqPRn_vB94SKA0Cc/view?usp=sharing)


# User web Interfaces
![land1](https://github.com/dhanushka365/wlan-app/assets/66137046/3e112480-9eca-4cce-a686-7a928fffee05)
![landingpage1](https://github.com/dhanushka365/wlan-app/assets/66137046/3e939fa7-f4a2-4640-a613-6a70a4284dd7)
![landingpage2](https://github.com/dhanushka365/wlan-app/assets/66137046/8219a8e9-5cb7-4784-a796-105cc1634d40)

![sensordashboard](https://github.com/dhanushka365/wlan-app/assets/66137046/3ad4b490-ea1a-4463-9546-3245c217f4ce)
![device control](https://github.com/dhanushka365/wlan-app/assets/66137046/89e39311-8ff1-4a58-8148-7701a7114eea)
![forecast](https://github.com/dhanushka365/wlan-app/assets/66137046/eb6074ec-1e6f-4647-a6d0-47b1b990d02e)
![login](https://github.com/dhanushka365/wlan-app/assets/66137046/3af637a9-4f7f-4e8e-9ddc-476eaec6d2aa)
![posedetction](https://github.com/dhanushka365/wlan-app/assets/66137046/735ecfd2-c464-4754-88e1-e067c42c27f8)
![face detection](https://github.com/dhanushka365/wlan-app/assets/66137046/6755c970-1a12-4c59-87f0-1a05406b9b67)

![Update details](https://github.com/dhanushka365/wlan-app/assets/66137046/5d165b34-aa7b-4842-8429-7f3147244a97)
![Update Password](https://github.com/dhanushka365/wlan-app/assets/66137046/3b261599-49d1-4ee7-a55c-874a5565ac2e)



# Only for development purpose

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
-  php artisan make:controller Device/ChartsApiController   
## serve app
-  php artisan serve --host=0.0.0.0 --port=8000
## image upload
-  composer require intervention/image

