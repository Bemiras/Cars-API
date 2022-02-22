# Laravel Products and Cart API

<p align="left">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
<a href="https:github.com/bemiras"><img src="https://img.shields.io/badge/author-Bemiras-blue" alt="Author"></a>
<a href="http://laravel-cars-api.herokuapp.com/api/documentation"><img src="https://img.shields.io/badge/website-CHECK-green" alt="Website" ></a>

</p>


This project was built as a simple backend task, in PHP as a recruitment job.

App in server:
http://laravel-cars-api.herokuapp.com/api/documentation

## Task Requiremnts:
### 1. User can execute using endpoint:
- add new car
- update car
- delete car
- list of cars
- show first car where type='big', name uppercase
- show first car where type='big', name lowercase
- delete first car where type='big

## Language, Framework, and Datastore.
- This System is implemented using php laravel framework
- Mysql is ised as a Database for this application (DB_NAME = "Shop")
- The Cart data is persisted in the Database to be in-compliance with the RESTfulness Guidelines and best practices and avoid using the sessions to save the state of the user


## Documentation API:

#### Cars
![swagger](https://user-images.githubusercontent.com/55050773/155113628-d5a7b7d0-2034-4b5b-8f90-a8180ac9c1a6.jpg)

![model](https://user-images.githubusercontent.com/55050773/155113752-e1571a99-59fb-48b5-b08b-073dc5898290.jpg)


## Installation
````
$ php artisan migrate
$ php artisan db:seed
$ php artisan serve
````

## License
[MIT license](https://opensource.org/licenses/MIT)
