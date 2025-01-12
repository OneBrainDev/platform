import { fileURLToPath, URL } from 'node:url'
import  laravel  from 'laravel-vite-plugin'
import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'

// export default defineConfig({
// 	envDir: '../../application',
// 	server: {
// 		host: 'https://platform.test',
// 		port: 3000,
// 		hmr: {
// 			host: 'platform.test'
// 		},
// 		watch: {
// 			usePolling: true
// 		}
// 	},
// 	plugins: [
// 		laravel({
// 			detectTls: 'platform.test',
// 			input: 'app.js',
// 			refresh: true,
// 			publicDirectory: '../../application/public'
// 		}),
// 		svelte(),
// 		basicSsl()
// 	]
// });

// https://vite.dev/config/
export default defineConfig({
   plugins: [
		laravel({
			detectTls: 'platform.test',
			input: 'app.js',
			refresh: true,
			publicDirectory: '../../application/public'
		}),
      vue(),
      vueDevTools()
   ],
   resolve: {
      alias: {
         '@': fileURLToPath(new URL('./src', import.meta.url)),
      },
   },
})
