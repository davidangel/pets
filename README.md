# Pets

A pet directory to keep track of all of the awesome pets that belong to the employees at Radio Systems Corporation.

## Objective

Build a well-designed application that is simple and fun. Foster our culture by providing a way for employees and pets throughout the company to get to know each other better.

## Tech Stack / Roadmap

 - Laravel
 - VueJS
 - Bootstrap4
 - Azure/Docker Deployment?
 - Google Analytics
 - Google Maps?

## Up and Running

 - Prerequisite: Install [Laravel Valet](https://laravel.com/docs/5.6/valet#installation)
 - Configure valet to host your `pets` repo
 - `cd` into project directory
 - Run `chmod +x ./init.sh && ./init.sh`
 - Create a new database in local MySQL/MariaDB and configure credentials in the new `.env` file
 - Run `php artisan migrate` to run initial database migrations
 - Optionally run `php artisan db:seed` to create sample data in the database
 - Visit `https://pets.test/` to confirm everything's ready to rock.
