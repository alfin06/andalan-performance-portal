import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import route from 'ziggy-js';
import { ZiggyVue } from 'ziggy';
import { Ziggy } from './ziggy';

createInertiaApp({
    title: title => '${title} | Andalan Performance',
    // Vite
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    progress: {
        color: '#29d',
    },
  
    // Webpack
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
      const VueApp = createApp({ render: () => h(App, props) })
                    .use(plugin)
                    .use(ZiggyVue, Ziggy)
                    .mixin({ methods: { route } })
                    .mount(el)
    },
})