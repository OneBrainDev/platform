# Welcome to The Platform

This is my full stack Laravel/Vue platform. It takes all the best practices, architecture principles, and battle tested concepts that I've been using for 20 years and puts them into one neat package.

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

### Create your env files

Out of the box Platform has 3 `.env.example` files. One is at the top level, needed for docker, one is in the application folder for laravel, and the last is in the web folder for vue/vite.

Initially, you should run `task generate:env` to have the system generate all the necessary env files for you. This will use the `platform.config.json` file and replace any values in there in their respective env files. You can add to this and regenerate those files any time you'd like, but platform regenerates those files from the .env.example files so if you've changed your .env and not added those changes into the example file, regenerating will cause you to lose that data. 


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

# What's in the box

- Laravel 11+
- Redis
- MySql
- Inertia + Vue3
- Vue3 Design System
- Docker
- Vitepress for system documentation
- Taskfile

