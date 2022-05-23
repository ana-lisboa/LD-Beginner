Working on the laravel daily beginner path

# Routing and Controllers: Basics

## The Task: Simple Personal Blog

You need to create a personal blog with just three pages:

Homepage: List of articles

- [x] Article page
- [x] Some static text page like "About me"
- [] Also, there should be a Login mechanism (but no Register) for the author to write articles:

- [] Manage (meaning, create/update/delete) categories
- [] Manage tags
- [] Manage articles
- [x] For Auth Starter Kit, use Laravel Breeze (Tailwind) or Laravel UI (Bootstrap) - that starter kit will have some
  design, which is enough: the design is irrelevant for accomplishing the task

DB Structure:

- [x] Article has title (required), full text (required) and image to upload (optional)
- [] Article may have only one category, but may have multiple tags

## Features to implement

- [x] Callback Functions and Route::view()
- [x] Routing to a Single Controller Method
- [x] Route Parameters
- [x] Route Naming
- [x] Route Groups
- [x] Blade Basics

- [x] Displaying Variables in Blade
- [] Blade If-Else and Loop Structures
- [x] Blade Loops
- [] Layout: @include, @extends, @section, @yield
- [] Blade Components
- [] Auth Basics

- [] Default Auth Model and Access its Fields from Anywhere
- [] Check Auth in Controller / Blade
- [] Auth Middleware
- [] Database Basics

- [x] Database Migrations
- [x] Basic Eloquent Model and MVC: Controller -> Model -> View
- [] Eloquent Relationships: belongsTo / hasMany / belongsToMany
- [] Eager Loading and N+1 Query Problem
- [] Full Simple CRUD

- [x] Route Resource and Resourceful Controllers
- [] Forms, Validation and Form Requests
- [] File Uploads and Storage Folder Basics
- [] Table Pagination
