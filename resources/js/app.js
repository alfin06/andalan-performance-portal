import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import route from 'ziggy'
import { ZiggyVue } from './ziggy'

createInertiaApp({
    title: title => '${title} | Andalan Performance',
    // Vite
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
  
    // Webpack
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
      const VueApp = createApp({ render: () => h(App, props) })
                    .use(plugin)
                    .mixin({ methods: { route } })
                    .mount(el)
    },
})