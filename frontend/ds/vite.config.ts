import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import { resolve } from 'path'
import vue from '@vitejs/plugin-vue'
import dts from 'vite-plugin-dts'
import vueDevTools from 'vite-plugin-vue-devtools'

export default defineConfig({
   plugins: [
      vue(),
      dts({
         rollupTypes: true,
         insertTypesEntry: true,
         exclude: [
            'node_modules/**',
            'src/test/**',
            'src/**/docs/**',
            'src/**/*.stories.ts',
            'src/**/*.spec.ts',
            'src/**/__test__/**',
         ],
      }),
      vueDevTools(),
   ],
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
         fileName: 'ds',
         name: 'ds',
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
