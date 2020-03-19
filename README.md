<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

Документация для развёртывания проекта.
1. Необходимое по для проекта:
    
    <ul>
        <li>php 7.2>= </li>
        <li>Redis-server=3.2.6</li>
        <li>Mariadb-10.1.44</li>
        <li>Mysql or Mariadb</li>
        <li>Composer-1.10.0</li>
        <li>npm 6.14.2</li>
        <li>nodejs v8.17.0</li>
    </ul>
    
2. Ссылка на github:
    <a href='https://github.com/valeron007/nuts-test'>Nuts-test-project</a>

3. Установить зависимости composer:
    composer install

4. Установить npm зависимости:
    npm install

5. Почту необходимо настроить на своё усмотрение, сейчас настроена на мой почтовый адрес. 
Но для теста можно настроить в Log.

6. Перед запуском проекта необходимо создать базу данных и 
в файле .env прописать настройки подключения. 

7. Выполнить миграцию:
    php artisan migrate

8. Для заполнения базы начальными данными выполнить:
    php artisan db:seed

9. Запустить проект php artisan serve

10. Выполнить npm run dev
 
Unit-тестами не успел покрыть. 

В случае проблем пишите.
  
  
  
