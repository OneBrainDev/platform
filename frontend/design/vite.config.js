import { fileURLToPath, URL } from 'node:url'
import { resolve } from 'node:path'
import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import dts from 'vite-plugin-dts'

export default defineConfig({
  plugins: [
    vue(),
    dts({
      rollupTypes: true,
      insertTypesEntry: true,
      exclude: ['node_modules/**', 'src/test/**', 'src/**/docs/**', 'src/**/*.stories.ts'],
    }),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url)),
    },
  },
  build: {
    copyPublicDir: false,
    cssCodeSplit: true,
    manifest: true,
    lib: {
      entry: resolve(__dirname, 'src/index.ts'),
      fileName: 'platform-ui',
      name: 'platform-ui',
      formats: ['es'],
    },
    rollupOptions: {
      external: ['vue'],
      output: {
        assetFileNames: 'platform-ui.[ext]',
        globals: {
          Vue: 'vue',
        },
      },
    },
  },
})
