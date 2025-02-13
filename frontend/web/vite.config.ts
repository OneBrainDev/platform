import { fileURLToPath, URL } from 'node:url'
import laravel from 'laravel-vite-plugin'
import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'
import fs from 'fs'

export default defineConfig({
   build: {
      cssCodeSplit: true,
      manifest: true,
      sourcemap: true,
   },
   server: {
      host: process.env.VITE_URL,
      https: {
         key: fs.readFileSync(
            '../../.infrastructure/conf/traefik/dev/certificates/local-dev-key.pem',
         ),
         cert: fs.readFileSync('../../.infrastructure/conf/traefik/dev/certificates/local-dev.pem'),
      },
      cors: true,
      port: parseInt(process.env.VITE_PORT ? process.env.VITE_PORT : '3000'),
      hmr: {
         host: process.env.VITE_DOMAIN,
      },
      watch: {
         usePolling: true,
      },
   },
   plugins: [
      laravel({
         detectTls: process.env.VITE_DOMAIN,
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
      },
   },
})
