import { createRouter, createWebHistory } from "vue-router";

import store from '../store/index';

import DashboardAdminComponent from '../components/backoffice/admin/DashboardAdminComponent.vue';

import DashboardPublicateurComponent from '../components/backoffice/publicateur/DashboardPublicateurComponent.vue';

import LogoutComponent from '../components/backoffice/LogoutComponent.vue';

const routes = [

    {
        path: '/admin/dashboard',
        name: 'admins.dashboard',
        component: DashboardAdminComponent,
        meta: { requiresAuth: true,  }  // add this
    },
   
    {
        path: '/publicateur/dashboard',
        name: 'publicateurs.dashboard',
        component: DashboardPublicateurComponent,
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