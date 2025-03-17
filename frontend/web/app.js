import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

import { ZiggyVue } from 'ziggy-js'

import '@platform/blank/dist/blank.css'

createInertiaApp({
   resolve: (name) => {
      const pages = import.meta.glob('./src/pages/**/*.vue', { eager: true })
      return pages[`./src/pages/${name}.vue`]
   },
   setup({ el, App, props, plugin }) {
      createApp({ render: () => h(App, props) })
         .use(plugin)
         .use(ZiggyVue)
         .mount(el)
   },
})
