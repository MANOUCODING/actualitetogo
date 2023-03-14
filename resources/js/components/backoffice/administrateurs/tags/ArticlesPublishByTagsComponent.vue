<template>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <sidebar></sidebar>
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" >
                <topbar></topbar>

                <div class="container-fluid" v-if="load" style="position: relative">
                    <div class="lds-ellipsis" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);"><div></div><div></div><div></div><div></div></div>
                    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                </div>

                <div class="container-fluid" v-else>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2 class="h3 mb-0 text-gray-800">Les articles publiés de "{{ infos.author }}"</h2>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Ajouter un article</a>
                    </div>
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <router-link :to="{ name: 'admins.tags.articles', params: {slug : infos.slug }}">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                   Tous les articles</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ infos.articleCount }} articles</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <router-link :to="{ name: 'admins.tags.articles.publish', params: {slug : infos.slug }}">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                   Les articles publiés</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ infos.articlePublishCount }} articles</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <router-link :to="{ name: 'admins.tags.articles.not.publish', params: {slug : infos.slug }}">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                  Les brouillons</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ infos.articleNotPublishCount }} articles</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4 border-left-success">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Les articles publiés ({{ infos.articlePublishCount }} article(s))</h6>                           
                        </div>
                        <div class="card-body" v-if="empty === 0">
                            <div class="row">
                                <div class="col-md-8">

                                </div>
                                <div class="col-md-4">
                                    <div class="container">
                                        <form @submit.prevent="getResults">
                                          <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <!-- <div class="small fw-light">Rechercher</div> -->
                                                <div class="input-group mb-3">
                                                  <input class="form-control border" v-model="search" type="search"  placeholder="Rechercher..." id="example-search-input">
                                                  <span class="input-group-append">
                                                      <button class="btn btn-success border-start-0  border ms-n5" type="submit">
                                                          <i class="fa fa-search"></i>
                                                      </button>
                                                  </span>
                                              </div>
                                            </div>
                                          </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Ajouté le</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Ajouté le</th>
                                        </tr>
                                    </tfoot>
                                    <tbody v-for="info in infos.articlePublish.data" :key="info.id">
                                        <tr>
                                            <th > <router-link :to="{ name: 'admins.tags.articles', params: {slug : info.slug }}" v-html="info.title"></router-link></th>
                                            <td>{{ moment(info.date_publish).format(" MMM DD, YYYY") }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br/>
                                <Bootstrap5Pagination
                                class="mb-0"
                                :data="infos.articlePublish"
                                :limit="2"
                                :show-disabled="showDisabled"
                                :size="size"
                                :align="align"
                                @pagination-change-page="getResults"
                            />
                            </div>
                        </div>
                        <div class="card-body" v-else-if="empty === 1">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                  <div style="position: relative; height: 400px;">
                                      <img src="/assets/admin/img/empty.png" style="width: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" alt="empty">
                                  </div>
                                  <h5 style="text-align: center; margin-top: -50px"> {{ message  }} </h5>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
            <footerbar></footerbar>
        </div>
    </div>
</template>
<script>
import moment from 'moment'
import store from '../../../../store'
import { Bootstrap5Pagination } from '../../../lib';
export default {
    components: {
        Bootstrap5Pagination,
    },
    data() {
        return {
            infos: {},
            empty : null,
            message: "",
            loading: false,
            load: true,
            search: '',
            query: '',
            searchCategoryButton: false,
            style: 'bootstrap4',
            showDisabled: false,
            size: 'default',
            align: 'right'
        };
    },
   
    mounted() {
        this.moment = moment;
        this.searchCategoryButton = true
        this.getResults();
    },
    methods: {
        
        getResults(page = 1){
            axios
            .get(`/api/auth/admin/tags/${this.$route.params.slug}/articles/publish?page=${page}&search=${this.search}`, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            })
            .then((response) => {
              
                this.load = false
                
                if (response.data.data.status == 401) {
                    this.empty = 1
                    this.message = response.data.message
                    this.infos = response.data.data
                } else if (response.data.data.status == 200) {
                    this.empty = 0
                    this.infos = response.data.data
                    
                    
                }
               
            })
            .catch(error => {
                const Toast = this.$swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', this.$swal.stopTimer)
                        toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: "Votre session est expirée.Veuillez vous reconnectez"
                })

                localStorage.removeItem('token')

                store.commit('logoutUser')

                this.$router.push({ name: 'login' })
            });
        }
    }
}
</script>
