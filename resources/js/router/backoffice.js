import { createRouter, createWebHistory } from "vue-router";

import store from '../store/index';

import LoginComponent from '../components/backoffice/LoginComponent.vue';

import LogoutComponent from '../components/backoffice/LogoutComponent.vue';

import DashboardComponent from '../components/backoffice/administrateurs/DashboardComponent.vue';

import NewsLetterComponent from '../components/backoffice/administrateurs/newsLetters/NewsLetterComponent.vue';

import CategoryComponent from '../components/backoffice/administrateurs/category/CategoryComponent.vue';

import AuthorsDashboardComponent from '../components/backoffice/authors/DashboardComponent.vue';

const routes = [
    {
        path: '/login',
        component: LoginComponent,
        name: 'login',
    },

    {
        path: '/admin/dashboard',
        name: 'admins.dashboard',
        component: DashboardComponent,
        meta: { requiresAuth: true }  // add this
    },

    {
        path: '/admin/newsletters',
        name: 'admins.newsletters',
        component: NewsLetterComponent ,
        meta: { requiresAuth: true }  // add this
    },

    {
        path: '/admin/category',
        name: 'admins.category',
        component: CategoryComponent ,
        meta: { requiresAuth: true }  // add this
    },

    {
        path: '/authors/dashboard',
        name: 'authors.dashboard',
        component: AuthorsDashboardComponent,
        meta: { requiresAuth: true }  // add this
    },
    {
        path: '/logout',
        component: LogoutComponent,
        name: 'logout',
    },

]

const router =  createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {

    // check if the route requires authentication and user is not logged in
    if (to.matched.some(route => route.meta.requiresAuth) && !store.state.isLoggedIn) {
        // redirect to login page
        next({ name: 'login' })
        return
    }

    // if logged in redirect to dashboard
    if(to.path === '/login' && store.state.isLoggedIn) {

        if(store.state.user.role == "admin"){

            next({ name: 'admins.dashboard' })
            return

        }else{

            next({ name: 'authors.dashboard' })
            return

        }

    }

    next()
})


export default router;