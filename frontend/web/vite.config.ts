import { fileURLToPath, URL } from 'node:url'
import laravel from 'laravel-vite-plugin'
import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'
import path from 'node:path'

export default defineConfig({
   envDir: '.',
   build: {
      cssCodeSplit: true,
      manifest: true,
      sourcemap: true,
      emptyOutDir: true,
   },
   server: {
      host: 'platform.test',
      https: {
         key: '../../.infrastructure/conf/traefik/dev/certificates/local-dev-key.pem',
         cert: '../../.infrastructure/conf/traefik/dev/certificates/local-dev.pem',
      },
      cors: true,
      port: 3000,
      hmr: {
         host: 'https://platform.test',
      },
      watch: {
         usePolling: true,
      },
   },
   plugins: [
      laravel({
         detectTls: 'https://platform.test',
         input: 'app.js',
         refresh: true,
         publicDirectory: '../../application/public',
      }),
      vue(),
      vueDevTools(),
   ],
   resolve: {
      alias: {
         '@': fileURLToPath(new URL('./src', import.meta.url)),
         "@actions/": fileURLToPath(new URL('./src', import.meta.url)) + "/router/actions",
         "@routes/": fileURLToPath(new URL('./src', import.meta.url)) + "/router/routes",
      },
   },
})
