require('./bootstrap');


import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import route from "ziggy-js";
import YmapPlugin from 'vue-yandex-maps'
import { ymapsApiSettings } from './map/ymapsSettings';


const el = document.getElementById('app');

createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
})
    .mixin({
        methods: {
            route
        }
    })
    .use(InertiaPlugin)
    .use(YmapPlugin, ymapsApiSettings)
    .mount(el);
