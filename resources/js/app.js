import './bootstrap'
import '../css/app.css'

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import { createApp, h, defineAsyncComponent } from 'vue'
import { createInertiaApp, InertiaLink } from '@inertiajs/inertia-vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { createPinia } from 'pinia'
const pinia = createPinia()
import { Plugin as Vanilla } from '@indigit/vanilla-components'
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Inspire'

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {

        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(Vanilla)
            .use(pinia)
            .component('Link', InertiaLink)
            .component(
                'MyCustomComponent',
                defineAsyncComponent(() => import('@/Components/MyCustomComponent.vue'))
            )
            .mount(el)
    },
})
