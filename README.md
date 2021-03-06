Working on the laravel daily beginner path

# Routing and Controllers: Basics

## The Task: Simple Personal Blog

You need to create a personal blog with just three pages:

Homepage: List of articles

- [x] Article page
- [x] Some static text page like "About me"
- [x] Also, there should be a Login mechanism (but no Register) for the author to write articles:

- [x] Manage (meaning, create/update/delete) categories
- [x] Manage tags
- [x] Manage articles
- [x] For Auth Starter Kit, use Laravel Breeze (Tailwind) or Laravel UI (Bootstrap) - that starter kit will have some
  design, which is enough: the design is irrelevant for accomplishing the task

DB Structure:

- [x] Article has title (required), full text (required) and image to upload (optional)
- [x] Article may have only one category, but may have multiple tags

## Features to implement

- [x] Callback Functions and Route::view()
- [x] Routing to a Single Controller Method
- [x] Route Parameters
- [x] Route Naming
- [x] Route Groups
- [x] Blade Basics

- [x] Displaying Variables in Blade
- [x] Blade If-Else and Loop Structures
- [x] Blade Loops
- [] Layout: @include, @extends, @section, @yield
- [x] Blade Components
- [x] Auth Basics

- [x] Default Auth Model and Access its Fields from Anywhere
- [x] Check Auth in Controller / Blade
- [x] Auth Middleware
- [x] Database Basics

- [x] Database Migrations
- [x] Basic Eloquent Model and MVC: Controller -> Model -> View
- [x] Eloquent Relationships: belongsTo / hasMany / belongsToMany
- [x] Eager Loading and N+1 Query Problem
- [x] Full Simple CRUD

- [x] Route Resource and Resourceful Controllers
- [x] Forms, Validation and Form Requests
- [x] File Uploads and Storage Folder Basics
- [x] Table Pagination

added

- [x] separate back and front controllers
- [x] separate back and front components and views
- [x] update readme with installation instructions

## To install this project

- pull the project
- create a database
- set .env settings
- install dependencies
- run migrations and seeds
- create a user in the database
- reset the user password
- enter / url for front
- enter /admin url for back
- have fun!
