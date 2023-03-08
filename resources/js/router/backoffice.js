import { createRouter, createWebHistory } from "vue-router";

import LoginComponent from '../components/backoffice/LoginComponent.vue';

import DashboardComponent from '../components/backoffice/administrateurs/DashboardComponent.vue';

const routes = [
    {
        path: '/login',
        component: LoginComponent,
        name: 'login',
    },

    {
        path: '/admin/dashboard',
        name: 'dashboard',
        component: DashboardComponent,
    },

]

const router =  createRouter({
    history: createWebHistory(),
    routes
})


export default router;