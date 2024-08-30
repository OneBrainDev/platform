# Platform Notes

This is my full stack Laravel/Vue platform. It takes all the best practices, architecture principles, and battle tested concepts that I've been using for 20 years  and puts them into one neat package. Please understand that this is really not recommended for small projects or if you're just playing around with a throwaway idea. While this isn't difficult to undersand, it adds a bunch of overhead and complexity that you'd probably not need on a small project. 

However, if you want something that will need to be organized and stays that way for the long haul, I highly recommend this. 

## Pre-Install

These are things you need to install before you start working with this project:

- Docker
- Spin
- Taskfile 
- Lefthook
- PNPM - The frontend uses PNPM workspaces, so yes, you need PNPM over NPM or other tools

## Setup Part 1: Hosts

Set up the following host file entries:

```
https://platform.test
https://api.platform.test
https://horizon.platform.test
https://minio.platform.test
https://design.platform.test
https://docs.platform.test
```

# What's in the box

- Laravel, but with a module based structure
- Design System built in Vue3
- Web frontnd utilizing the Design System
- Storybook
- Docker
- Vitepress for system documentation
- Taskfile

## Structure

The high level setup:

```
backend (Laravel)
docs (VitePress)
frontend
    design (Vue)
    web (Vue)
```

## Code Structure: Web 
GET platform.com/photos             --> PhotosIndexPage
GET platform.com/photos/create      --> PhotosCreatePage
GET platform.com/photos/{id}        --> PhotosShowPage
GET platform.com/photos/{id}/edit   --> PhotosEditPage

## Code Structure: API
GET  api.platform.com/v1/photos         --> GetsPhotosController        --> GetPhotosService        --> PhotoRepository(GetPhotos)
POST api.platform.com/v1/photos         --> StoresPhotosController      --> StorePhotosService      --> StorePhoto(StorePhotoHandler)
GET  api.platform.com/v1/photos/{id}                                                                --> PhotoRepository(GetPhotoById)
POST api.platform.com/v1/photos/{id}    --> UpdatesPhotosController     --> UpdatePhotosService     --> UpdatePhoto(UpdatePhotoHandler)
DEL  api.platform.com/v1/photos/{id}    --> DestroysPhotosController    --> DestroyPhotoServive     --> DestroyPhoto(DestroyPhotoHandler)

