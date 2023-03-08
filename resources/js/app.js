require('./bootstrap')

import { createApp } from 'vue'

import axios from 'axios'

import VueAxios from 'vue-axios'

import VueSweetalert2 from 'vue-sweetalert2';

import 'sweetalert2/dist/sweetalert2.min.css';

// Importer le composant backoffice

import backofficeH from './components/backoffice/backoffice.vue'

import backOfficeRouter from './router/backoffice'


// Importer les composants frontoffice

import categoriesF from './components/frontoffice/includes/categories.vue'

import tagsF from './components/frontoffice/includes/tags.vue'

import newsletterF from './components/frontoffice/includes/newsletter.vue'

import contactB from './components/frontoffice/contact.vue'

import acceuilB from './components/frontoffice/acceuil.vue'

import aNePasManquerB from './components/frontoffice/aNePasManquer.vue'

import allActualiteB from './components/frontoffice/allActualite.vue'

//Integrer le composant backoffice

const backoffice = createApp(backofficeH)

backoffice.use(VueAxios, axios)

backoffice.use(backOfficeRouter)

backoffice.mount('#backoffice')


//Integrer les composants frontoffice

const categories = createApp(categoriesF)

categories.use(VueAxios, axios)

const tags = createApp(tagsF)

tags.use(VueAxios, axios)

const newsletter = createApp(newsletterF)

newsletter.use(VueAxios, axios)

newsletter.use(VueSweetalert2);

const contact = createApp(contactB)

contact.use(VueAxios, axios)

contact.use(VueSweetalert2);

const acceuil = createApp(acceuilB)

acceuil.use(VueAxios, axios)

acceuil.mount('#acceuil')

const aNePasManquer = createApp(aNePasManquerB)

aNePasManquer.use(VueAxios, axios)

aNePasManquer.mount('#aNePasManquer')

const allActualite = createApp(allActualiteB)

allActualite.use(VueAxios, axios)

allActualite.mount('#allActualite')

categories.mount('#categories')

tags.mount('#tags')

newsletter.mount('#newsletter')

contact.mount('#contact')