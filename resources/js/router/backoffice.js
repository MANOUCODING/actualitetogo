import { createRouter, createWebHistory } from "vue-router";

import store from '../store/index';

import LoginComponent from '../components/backoffice/LoginComponent.vue';

import LogoutComponent from '../components/backoffice/LogoutComponent.vue';

import DashboardComponent from '../components/backoffice/administrateurs/DashboardComponent.vue';

import ArticlesAllComponent from '../components/backoffice/administrateurs/articles/ArticlesAllComponent.vue';

import ArticlesPublishComponent from '../components/backoffice/administrateurs/articles/ArticlesPublishComponent.vue';

import ArticlesNotPublishComponent from '../components/backoffice/administrateurs/articles/ArticlesNotPublishComponent.vue';

import AddArticleComponent from '../components/backoffice/administrateurs/articles/AddArticleComponent.vue';

import AuthorComponent from '../components/backoffice/administrateurs/authors/AuthorComponent.vue';

import FilesComponent from '../components/backoffice/administrateurs/fichiers/FilesComponent.vue';

import MessagesComponent from '../components/backoffice/administrateurs/messages/MessagesComponent.vue';

import NewsLetterComponent from '../components/backoffice/administrateurs/newsLetters/NewsLetterComponent.vue';

import CategoryComponent from '../components/backoffice/administrateurs/category/CategoryComponent.vue';

import ArticlesAllByCategoryComponent from '../components/backoffice/administrateurs/category/ArticlesAllByCategoryComponent.vue';

import ArticlesPublishByCategoryComponent from '../components/backoffice/administrateurs/category/ArticlesPublishByCategoryComponent.vue';

import ArticlesNotPublishByCategoryComponent from '../components/backoffice/administrateurs/category/ArticlesNotPublishByCategoryComponent.vue';

import TagsComponent from '../components/backoffice/administrateurs/tags/TagsComponent.vue'

import ArticlesAllByTagsComponent from '../components/backoffice/administrateurs/tags/ArticlesAllByTagsComponent.vue'

import ArticlesPublishByTagsComponent from '../components/backoffice/administrateurs/tags/ArticlesPublishByTagsComponent.vue'

import ArticlesNotPublishByTagsComponent from '../components/backoffice/administrateurs/tags/ArticlesNotPublishByTagsComponent.vue'

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
        path: '/admin/category/:slug/articles',
        name: 'admins.category.articles',
        component: ArticlesAllByCategoryComponent ,
        meta: { requiresAuth: true }  // add this
    },

    {
        path: '/admin/category/:slug/articles/publish',
        name: 'admins.category.articles.publish',
        component: ArticlesPublishByCategoryComponent ,
        meta: { requiresAuth: true }  // add this
    },

    {
        path: '/admin/category/:slug/articles/not/publish',
        name: 'admins.category.articles.not.publish',
        component: ArticlesNotPublishByCategoryComponent ,
        meta: { requiresAuth: true }  // add this
    },

    {
        path: '/admin/tags',
        name: 'admins.tags',
        component: TagsComponent ,
        meta: { requiresAuth: true }  // add this
    },

    {
        path: '/admin/tags/:slug/articles',
        name: 'admins.tags.articles',
        component: ArticlesAllByTagsComponent ,
        meta: { requiresAuth: true }  // add this
    },

    {
        path: '/admin/tags/:slug/articles/publish',
        name: 'admins.tags.articles.publish',
        component: ArticlesPublishByTagsComponent ,
        meta: { requiresAuth: true }  // add this
    },

    {
        path: '/admin/tags/:slug/articles/not/publish',
        name: 'admins.tags.articles.not.publish',
        component: ArticlesNotPublishByTagsComponent ,
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