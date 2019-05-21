# Web Coding Challenge

This repository is my own implementation of the [United Remote web coding challenge](https://github.com/hiddenfounders/web-coding-challenge/blob/master/coding-challenge.md).

## Implemented features

* [x] As a User, I can sign up using my email & password
* [x] As a User, I can sign in using my email & password
* [x] As a User, I can display the list of shops sorted by distance
* [x] As a User, I can like a shop, so it can be added to my preferred shops
* [x] As a User I should be able to see for each repo/row the following details :
* [x] [BONUS] As a User, I can display the list of preferred shops
* [x] [BONUS] As a User, I can remove a shop from my preferred shops list

## Used technologies

**Laravel 5.8** & **Vuejs 2**

Other tools:
- **npm** as my dependencies manager.
- **git** for version control.
- **laravel-mix** for compiling and optimizing assets.
- **underscore.js** for js helper.
- **Bootstrap 4** for styling.

## Installation & testing

To get the project up and running on your local machine, do the following. I assume you already know how to go about laravel, bower composer and npm, so i'll be brief

- clone it => git clone https://github.com/MouadZIANI/ur-fullstack-coding-challenge.git or download it
- Run composer install, to install dependencies
- Run npm install to install npm dependencies
- Edit the created .env file at the root of your project, to add database credentials, etc
- For create the tables of database run this command php artisan migrate in your cmd 

```bash
php artisan serve
```
- visit the site at localhost:8000
