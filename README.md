<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### PRUEBA TECNICA

Se necesita una prueba piloto de un blog para uno de nuestros productos.
Empezaremos con algo sencillo, sólo se quiere autores y posts. Se necesita acceder al contenido del blog desde otras aplicaciones, lo que nos requiere exponer una API. Como modelo de datos se propone usar el de https://jsonplaceholder.typicode.com/.
Por tanto, este proyecto debe tener 2 secciones:
**Blog público**
- Lista de posts
- Página de post, donde se mostrará una pequeña ficha del autor
**API**
- Endpoint GET para la obtención de posts (y en cada post incluir la información del autor)
- Endpoint POST para la publicación de un post.

### Tecnología y herramientas utilizadas
**Backend**
- PHP 8
- Framework Laravel 9
- Laravel Debugbar: herramienta para tener control de la app y debuggear la capa de acceso a datos.

### PASOS PARA EL DESPLIEGUE DE LA API

Requerimientos mínimos:
```requiere
PHP 8
Composer 2.*
```
Clonar la API del Github:
`git clone https://github.com/lili080916/Ipglobal-blog.git`

Comandos para iniciar el proyecto:
```command
composer install
php artisan migrate
php artisan db:seed
```
En el **.env** incluir la variable de entorno:
`JSON_PLACEHOLDER_URL=`
*Con el valor de la API dada.*

### Lógica seguida para el desarrollo de la API

Para la implementación de la API deseada se hizo uso de la práctica de programación TDD. De forma general se implementaron:
- Tests 
- Request validate para validar los datos de entrada
- Middleware Cors para validar peticiones al backend de servidores externos.
- Seeder para cargar información a la BD. 
*En este punto es necesario detallar que aunque no era objetivo de este ejercicio se creó uns BD en SQLlite para evitar otras configuraciones. Además de poder mostrar el trabajo con persistencia de datos, relaciones entre modelos y resource para mostrar datos en formato Json. 
Para llenar los datos faker en vez de utilizar los factory de Laravel, se tomaron de la API recomenada viendose asi el trabajo con API externas mediante las peticiones HTTP .*
- Traits para las peticiones HTTP para acceder de forma global, y tener acceso a estas funciones getUsersData() y getPostsData() que toman los datos de la API externa recomendada.
- Resource y collections para la respuestas de datos con la estructura deseada.
- ORM Eloquent para interacción con la capa de datos.

En la raíz del proyecto, la carpeta **client http** puede importarse una collection de **Postsman** para interactuar con los endpoints desarrollados. 

Para acceder a la documentación de la API:
`https://documenter.getpostman.com/view/19798850/UyxgK8Ec`

*Para la documentación decidí utilizar el cliente de Postman y la estructura que ofrece para acceder a los endpoint y la documentación que permite generar.*

**Tiempo estimado de implementación del Backend**
Aproximadamente 2 horas( análisis del ejercicio e implentación del mismo).
### Gracias

