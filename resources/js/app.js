require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from "@inertiajs/progress";

import BootstrapVue3 from 'bootstrap-vue-3';
import VueToast from 'vue-toast-notification';
import VueSweetalert2 from 'vue-sweetalert2';

import Layout from "@/Shared/Layout/Layout";
import myMixin from "@/Shared/Layout/Common/layouts.mixin";


createInertiaApp({
    resolve: name => {
        let page = require(`./Pages/${name}`).default;
        if (page.layout === undefined) {
            page.layout = Layout;
        }
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({
                render: () => h(App, props),
                mixins: [myMixin],
                provide: {
                    count: Math.floor((window.innerHeight - 370) / 63),
                    count2: Math.floor(((window.innerHeight - 170) - 170) / 61),
                    count3: Math.floor(((window.innerHeight - 170) - 130) / 61),
                    height: window.innerHeight - 250,
                    heightProfile : window.innerHeight - 335
                },
                mounted() {
                    this.mixinMethod('horizontal');
                }
            })
            .use(plugin)
            .use(BootstrapVue3, VueToast)
            .use(VueSweetalert2)
            .component("Link", Link)
            .component("Head", Head)
            .mount(el)
            // .config.devtools = true
    },
    title: title => `AGCAMS | ${title}`
})

InertiaProgress.init({
    color: "red",
    showSpinner: true,
});