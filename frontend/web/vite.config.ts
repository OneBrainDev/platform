import { fileURLToPath, URL } from 'node:url'
import laravel from 'laravel-vite-plugin'
import { defineConfig } from 'vite'
import { resolve } from 'path'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'

export default defineConfig({
   build: {
      cssCodeSplit: true,
      manifest: true,
      sourcemap: true,
   },
   server: {
      host: 'https://platform.test',
      port: 3000,
      hmr: {
         host: 'platform.test',
      },
      watch: {
         usePolling: true,
      },
   },
   plugins: [
      laravel({
         detectTls: 'platform.test',
         input: 'app.js',
         refresh: true,
         publicDirectory: '../../application/public',
      }),
      vue(),
   ],

   resolve: {
      alias: {
         '@': fileURLToPath(new URL('./src', import.meta.url)),
      },
   },
})
