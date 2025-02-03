# Welcome to The Platform

This is my full stack Laravel/Svelte platform. It takes all the best practices, architecture principles, and battle tested concepts that I've been using for 20 years and puts them into one neat package.

## Disclaimer

You can use this to build nearly anything you want. It gives you a firm base and you're able to adjust and change it as you see fit. It is important to note that I've structured this for what I consider to be a large project and a project that you, or someone else, is going to want/need to maintain for years to come. To that end, if you're looking to play around go for it, but if you've got a sort of throwaway idea you'll find that this adds a lot of weight to your application and it might not be necessary for you.

## Installing

The process of using Platform is pretty straight-forward but you are going to need some things pre-installed on your computer before you can use it. Please note: these are hard requirements. 

- [Docker](https://docker.com) -- containers and container build tools
- [Spin](https://serversideup.net/open-source/spin/) -- A tool from ServerSideUp that is used as the basis of our docker install
- [PNPM](https://pnpm.io/) -- Like NPM but way faster. Platform uses PNPM Workspaces for the frontend so this isn't something you can just swap out for NPM
- [Taskfile](https://taskfile.dev/) -- Think of it like Make if Make was designed to actually be a taskrunner. Awesome tool.
- [Lefthook](https://lefthook.dev/) -- A great tool that will help manage your git-hooks.

### Fork the Repo

Don't clone this repo. That really doesn't make any sense, you're not going to be getting updates from here often. You want to fork it and create an `upstream` remote to the main repo here. That way if you want to pull in some updates you can.

### Hosts

Add the following to your host file:

```bash
127.0.0.1 platform.test               # the main website
127.0.0.1 docs.platform.test          # VitePress documentation site
127.0.0.1 storage.platform.test       # MinIO setup for local S3 storage
127.0.0.1 mail.platform.test          # Mailpit
```
### Installing

Two easy commands to get this whole thing going now:

```bash
$ task init
```

This will pull down all the dependencies for the backend and frontend. It's a nice wrapper over over `composer install` and all the various `pnpm` commands.

```bash
$ task platform:start
```

Once you've got all the dependencies installed you'll be able to start docker up and check everything out. The `--build` is only needed when you want to rebuild your containers so on subsequent starts you don't need it. The `--detach` is so that way you can continue to use your current terminal window. If you'd rather all the output be dumped into your current terminal session you can remove `--detach` too.

### How to adjust the platform

I've build this platform in a way that allows you to make a lot if adjustments to really make this your own.

#### I want to use a different domain/subdomain/port

The platform has several `.env` files in it: the main one is located in the root, one for laravel and one in the web folder. These files cascade and are used in docker, laravel, and vite as necessary. If you want to change the domain or a particular port it's as easy as opening up the main `.env` file and adjusting the particular value.

# What's in the box

- Laravel 11+
- Inertia + Vue3
- Vue3 Design System
- Docker
- Vitepress for system documentation
- Taskfile

# Laravel Workflow

Generally speaking you can do whatever you want, but upon setup of a new module, you'll have an `Actions` and `Services` folder. This matches the workflow that I use which looks like this:

```
Request -> Controller (Request) -> Service (DTO) -> Action (DTO)
View <- (Array) Controller <- (Collection<DTO>|DTO) Service <- (Collection<DTO>|DTO) Action 
```

1. A request comes into a controller, the request does all the validation of the data (if any) and checks if the user can make the request
2. The Controller will take the validated request and turn it into a DataObject and dispatch that to Service. 
3. The Service will call an Action
4. An Action communicates with the Model to persist or get data

On the way back with data...

5. The action will return either a Collection or a DTO
6. Service will return either a Collection or a DTO
7. Controller will convert the Collection or DTO into an Array and return to the view
8. View will do whatever to the data

## Actions and Services

In this context a `Service` is really what laravel calls a Job. The service can either `dispatch` or `handle` or `defer` the service. Handle means it will execute now dispatch will add to a queue, and defer will handle after the request goes to the browser but in the same context.

## Multitenant Multidatabase Concepts in Action

Platform is a multtenant/multidatabase system and that comes with a bunch of challanges.
