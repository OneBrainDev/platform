import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import { resolve } from 'path'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'

export default defineConfig({
   plugins: [vue(), vueDevTools()],
   server: {
      host: '0.0.0.0',
   },
   build: {
      cssCodeSplit: true,
      manifest: true,
      sourcemap: true,
      lib: {
         entry: {
            index: resolve(__dirname, 'src/index.ts'),
         },
         formats: ['es'],
      },
      rollupOptions: {
         external: ['vue'],
         output: {
            globals: {
               Vue: 'vue',
            },
         },
      },
   },
   resolve: {
      alias: {
         '@': fileURLToPath(new URL('./src', import.meta.url)),
      },
   },
})
