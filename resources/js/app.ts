import '../js/assets/css/satoshi.css';
import '../js/assets/css/style.css';
import './bootstrap';

import DefaultLayout from '@/layouts/DefaultLayout.vue';
import { createInertiaApp, Head, Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createPinia } from 'pinia';
import { createApp, type DefineComponent, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel Vue App';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const page = resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob<DefineComponent>('./Pages/**/*.vue'),
        );
        page.then((module) => {
            module.default.layout = module.default.layout || DefaultLayout;
        });
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(createPinia())
            .use(plugin)
            .component('Link', Link)
            .component('Head', Head)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        delay: 250,
        color: '#aeb7c0',
    },
});
