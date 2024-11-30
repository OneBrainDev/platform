import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin';
import { svelte } from '@sveltejs/vite-plugin-svelte'
import basicSsl from '@vitejs/plugin-basic-ssl'

// https://vite.dev/config/
export default defineConfig({
  envDir: '../../application',
  server: {
    host: 'https://platform.test',
    port: 3000,
    hmr: {
      host: 'platform.test',
    },
    watch: {
        usePolling: true
    }
  },
  plugins: [
    laravel({
      detectTls: 'platform.test',
      input: 'app.js',
      refresh: true,
      publicDirectory: '../../public',
    }),
    svelte(),
    basicSsl()
  ],
})
