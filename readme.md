<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## API CRUD de Produtos

Aplicação simples para exemplificar o uso de uma API. O unico objetivo deste material é executar tarefas CRUD de produtos
através da rota /api/product

## Como rodar o projeto?


    1 Clonar o repositorio:
    git clone https://github.com/joaofds/prod-api.git
    
    2 Na raiz do projeto rodar os comandos abaixo:
    composer install (isso irá instalar o laravel e suas dependencias)
    
    3 Copiar o arquivo .ENV e fazer suas configurações locais de database, host etc...
    cp .env.example .env
    
    4 Rodar migrations
    php artisan migrate
    
    5 Usar postman para manipular o crud na rota...
    /api/product



## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.
