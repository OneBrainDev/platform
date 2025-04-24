
# Welcome to The Platform

This is my full-stack Laravel/Vue platform. It combines best practices, solid architecture principles, and battle-tested concepts that I've developed over the past 20 years—all wrapped into one neat package.

## Disclaimer

You can use this platform to build almost anything. It provides a solid foundation, and you're free to adjust and modify it as needed. However, it's important to note that I've structured it with large, long-term projects in mind—projects that you (or someone else) will need to maintain for years.

If you're just experimenting or working on a throwaway idea, you might find this setup a bit heavy. In such cases, a simpler approach may be more appropriate.

## Installing

Getting started with The Platform is straightforward, but there are a few prerequisites. These are hard requirements—you'll need them installed before proceeding:

- [Docker](https://docker.com) — Containers and build tools
- [Spin](https://serversideup.net/open-source/spin/) — A tool from ServerSideUp that forms the basis of our Docker setup
- [PNPM](https://pnpm.io/) — A faster alternative to NPM. Required for frontend PNPM workspaces
- [Taskfile](https://taskfile.dev/) — Think of it like Make, but designed as a modern task runner
- [Lefthook](https://lefthook.dev/) — Manages Git hooks for you

### Repository Structure & Cloning

**Important:** This project uses Git submodules, so you'll need a few extra steps to clone everything properly.

Why submodules? Because this platform isn't meant to pull regular updates from upstream. You'll likely customize and extend it heavily. That said, submodules are useful for sharing small, reusable pieces of code across projects.

To clone the repository:

```bash
git clone git@github.com:OneBrainDev/platform.git
cd platform
git submodule init
git submodule update
```

You now have all the code locally.

### Environment Setup

Environment setup here differs from a typical Laravel project. This platform separates concerns across multiple environments—Docker, Laravel, and the frontend. If you're adding something like NativePHP later, there may be even more.

We use multiple `.env` files and a shared `platform.config.json` file to help manage them.

Check out `platform.config.json` to see what's included. You can add anything you'd like here—just follow the existing conventions, and your values will be synced to the appropriate `.env` files.

> **Important:** Do **not** include sensitive data in `platform.config.json`. It’s tracked by Git. Sensitive values should always go in the `.env` files themselves.

### Initialization

Run the following:

```bash
cd platform
task init
```

This will:

1. Install all Laravel dependencies
2. Install all frontend dependencies
3. Generate all required environment and Docker config files

### Hosts File

Add the following entry to your system’s `hosts` file:

```bash
127.0.0.1 platform.test
```

#### Important URLs

Platform includes preconfigured MinIO and Mailpit instances. Once your host file is updated and containers are running, you’ll be able to access:

- https://platform.test
- http://mail.platform.test:8250
- http://storage.platform.test:9000
- http://docs.platform.test:8080

### Starting and Stopping the Platform

Once everything is set up, you're ready to go.

> Make sure Docker is running before starting the platform.

To start:

```bash
cd platform
task platform:start
```

Docker will spin up all services. This might take a few minutes, depending on your connection and system performance. The platform runs in detached mode by default, so your terminal will be free once it's loaded.

To shut everything down:

```bash
task platform:stop
```

## Workflow

### Frontend

#### Web
#### Blank

### Backend

## Docs
