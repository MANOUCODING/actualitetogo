require('./bootstrap')

import { createApp } from 'vue'

import axios from 'axios'

import VueAxios from 'vue-axios'

import VueSweetalert2 from 'vue-sweetalert2';

import 'sweetalert2/dist/sweetalert2.min.css';

import tagsFooter from './components/frontoffice/includes/tags.vue'

import newsletterFooter from './components/frontoffice/includes/newsletter.vue'


const tags = createApp(tagsFooter)

tags.use(VueAxios, axios)

const newsletter = createApp(newsletterFooter)

newsletter.use(VueAxios, axios)

newsletter.use(VueSweetalert2);

tags.mount('#tags')

newsletter.mount('#newsletter')
