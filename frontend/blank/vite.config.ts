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
         tsconfigPath: './tsconfig.json',
         rollupTypes: true,
         insertTypesEntry: true,
         strictOutput: true,
         outDir: './dist',
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
      outDir: './dist',
      lib: {
         entry: {
            index: resolve(__dirname, 'src/index.ts'),
         },
         fileName: 'blank',
         name: 'blank',
         formats: ['es'],
      },
      rollupOptions: {
         external: ['vue'],
         output: {
            assetFileNames: (assetInfo) => {
               if (assetInfo.name == 'blank.css' || assetInfo.name == 'index.css') {
                  return 'blank.css'
               }

               return assetInfo.name
            },
            globals: {
               vue: 'Vue',
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
