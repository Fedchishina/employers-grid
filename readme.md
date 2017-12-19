<h1 align="center">Employers-grid</h1>

## Installation

- clone repository
- run the command:
```sh
composer install
```
- copy .env-example to .env and change settings of DB
- run the command for creating DB tables:
```sh
php artisan migrate
```
- run the command for filling test data of DB tables:
```sh
php artisan db:seed
```
- run the command:
```sh
npm install
```
- run the command:
```sh
npm run dev
```

## Using
In this application you can create departments, employees, and establish connections between departments and employees.
These links are shown in the grid of employees.
