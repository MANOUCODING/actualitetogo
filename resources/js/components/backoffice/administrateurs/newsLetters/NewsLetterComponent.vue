<template>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <sidebar></sidebar>
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <topbar></topbar>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Les abonnés</h1>
                    </div>
                    
                    <div v-if="addCategoryButton" class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ajouter un abonné</h6>
                           
                            <button type="button" style="float: right; margin-top: -20px" @click="closeAddCategory" class="btn btn-danger">Fermez</button>
                           
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="container">
                                        <form @submit.prevent="saveCategory">
                                          <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <!-- <div class="small fw-light">Rechercher</div> -->
                                                <div class="input-group mb-3" v-if="errors.email">
                                                  <input class="form-control form-control-lg is-invalid border" v-model="data.email" type="text"  placeholder="Entrez l'email d'un abonné" id="example-search-input">
                                                  <span class="input-group-append">
                                                      <button class="btn btn-lg btn-success border-start-0  border ms-n5" v-if="!loading" type="submit">
                                                        Enregistrez
                                                      </button>
                                                      <button class="btn btn-lg btn-success border-start-0  border ms-n5" v-else type="submit">
                                                        Enregistrement en cours...
                                                      </button>
                                                  </span>
                                                  <div v-for="errorName in errors.email" :key="errorName" class="invalid-feedback">
                                                    {{ errorName }}
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3" v-else>
                                                    <input class="form-control form-control-lg border" v-model="data.email" type="text"  placeholder="Entrez l'email d'un abonné" id="example-search-input">
                                                    <span class="input-group-append">
                                                        <button class="btn btn-lg btn-success border-start-0  border ms-n5" v-if="!loading" type="submit">
                                                          Enregistrez
                                                        </button>
                                                        <button class="btn btn-lg btn-success border-start-0  border ms-n5" v-else type="submit">
                                                          Enregistrement en cours...
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                          </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="updateCategoryButton" class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Modifier un abonné</h6>
                           
                            <button type="button" style="float: right; margin-top: -20px" @click="closeUpdateCategory" class="btn btn-danger">Fermez</button>
                           
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="container">
                                        <form @submit.prevent="update(data.id)">
                                          <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <!-- <div class="small fw-light">Rechercher</div> -->
                                                <div class="input-group mb-3" v-if="errors.email">
                                                  <input class="form-control form-control-lg is-invalid border" v-model="data.email" type="email"  placeholder="Entrez l'email d'un abonné" id="example-search-input">
                                                  <span class="input-group-append">
                                                      <button class="btn btn-lg btn-success border-start-0  border ms-n5" v-if="!loading" type="submit">
                                                        Modifier
                                                      </button>
                                                      <button class="btn btn-lg btn-success border-start-0  border ms-n5" v-else type="submit">
                                                       Modification en cours...
                                                      </button>
                                                  </span>
                                                  <div v-for="errorName in errors.email" :key="errorName" class="invalid-feedback">
                                                    {{ errorName }}
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3" v-else>
                                                    <input class="form-control form-control-lg border" v-model="data.email" type="email"  placeholder="Entrez l'email d'un abonné" id="example-search-input">
                                                    <span class="input-group-append">
                                                        <button class="btn btn-lg btn-success border-start-0  border ms-n5" v-if="!loading" type="submit">
                                                            Modifier
                                                        </button>
                                                        <button class="btn btn-lg btn-success border-start-0  border ms-n5" v-else type="submit">
                                                           Modification en cours...
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                          </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="load" style="position: relative">
                        <div class="lds-ellipsis" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);"><div></div><div></div><div></div><div></div></div>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                    </div>
                    <div v-else class="card shadow mb-4"
                    >
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste des abonnés</h6>
                           
                            <button type="button" style="float: right; margin-top: -20px" v-if="!addCategoryButton" @click="addCategory" class="btn btn-success">Ajouter un abonné</button>
                           
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
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Ajouté le</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Ajouté le</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody v-for="info in infos.newsLetters.data" :key="info.id">
                                        <tr>
                                            <td>{{ info.email }}</td>
                                            <td>
                                                <button type="button" v-if="info.status == 0"  @click="inactifToActif(info.id)" class="btn btn-danger btn-rounded">Inactif</button>
                                                <button type="button" v-else @click="actifToInactif(info.id)" class="btn btn-primary btn-rounded">Actif</button>
                                            </td>
                                            <td>{{ moment(info.updated_at).format(" MMM DD, YYYY") }}</td>
                                            <td>
                                                <div class="row" style="max-width: 100%" >
                                                    <div class="col-md-3">
                                                      <button type="button" class="btn btn-rounded btn-success" @click="updateCategory(info.slug)"> <i class="fa fa-edit"></i></button>
                                                    </div>
                                                   
                                                    <div class="col-md-3">
                                                      <button type="button" class="btn btn-rounded btn-danger" @click="deleteCategory(info.id)"> <i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br/>
                                <Bootstrap5Pagination
                                class="mb-0"
                                :data="infos.newsLetters"
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
            data: {
                id: null,
                email: null,
                slug: null
            },
            empty : null,
            message: "",
            addCategoryButton: false,
            updateCategoryButton: false,
            loading: false,
            errorMessage : "",
            errors: {},
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
            .get(`/api/auth/admin/newsletter?page=${page}&search=${this.search}`, {
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
                } else {
                    this.empty = 0
                    this.infos = response.data.data
                    this.data.email = null
                    
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
        },

      
        saveCategory(){
            this.loading = true
           
            axios.post('/api/auth/admin/newsletter/store',{
                email : this.data.email,
            }, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            })
            .then(response =>{
                
                    if (response.data.data.status == 401) {
                        this.loading = false
                        this.errors = response.data.data.errors
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
                                title: response.data.message
                            })
                    }else{

                        if (response.data.data.status == 200) {
                            
                            this.loading = false
                            
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
                                icon: 'success',
                                title: response.data.message
                            })

                            this.getResults();

                            this.addCategoryButton = false;

                            this.searchCategoryButton = true;
                        }
                    }
              
                }).catch(error =>{
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
            })
        },

        update(id){
            this.loading = true
            
            axios.put(`/api/auth/admin/newsletter/${id}/update`,{
                email : this.data.email,
            }, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            })
            .then(response =>{
                if (response.data.data.status == 401) {
                        this.loading = false

                        this.errors = response.data.data.errors
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
                                title: response.data.message
                            })
                    }else{

                        if (response.data.data.status == 200) {
                            
                            this.loading = false
                            
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
                                icon: 'success',
                                title: response.data.message
                            })

                            this.data.email = null
                        
                            this.getResults();

                            this.updateCategoryButton = false;
                            
                        }
                    }
            }).catch(error =>{
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
            })

            
        },

        updateCategory(slug){
            this.updateCategoryButton = true;
            this.addCategoryButton = false;
            axios.get(`/api/auth/admin/newsletter/${slug}`, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            })
                .then(response => {
                
                if (response.data.data.status === 401) {
                    this.empty = 1
                    this.message = response.data.message
                } else {
                    this.empty = 0
                    this.data = response.data.data.utilisateur
                }
                   
            }).catch(error =>{
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


        },

        closeUpdateCategory(){
            this.updateCategoryButton = false;
            this.searchCategoryButton = true;
        },

        addCategory(){
            this.addCategoryButton = true;
            this.updateCategoryButton = false;
            this.searchCategoryButton = false;
        },

        closeAddCategory(){
            this.addCategoryButton = false;
            this.searchCategoryButton = true;
        },

        deleteCategory(id) {
            this.$swal({
                title: "Etes-vous sûr?",
                text: "Vous ne pourrez plus récupérer cet abonné!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "blue",
                confirmButtonText: "Oui, supprimez!",
                cancelButtonText: "Non, annuler !",
                closeOnConfirm: true,
                closeOnCancel: true
            }).then((confirmed) => {
                if (confirmed.isConfirmed) {
                axios
                .get(`/api/auth/admin/newsletter/${id}/delete`, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            })
                .then(response => {
                    this.getResults();
                        if (response.data.data.status === 200) {
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
                                icon: 'success',
                                title: response.data.message
                            })
                    } else {
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
                            title: response.data.message
                        })
                    }
                }).catch(error =>{
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
            });
            
        },
        inactifToActif(id) {
            this.$swal({
                title: "Etes-vous sûr?",
                text: "Voulez vous vraiment activer cet abonné!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "blue",
                confirmButtonText: "Oui!",
                cancelButtonText: "Non, annuler !",
                closeOnConfirm: true,
                closeOnCancel: true
            }).then((confirmed) => {
                if (confirmed.isConfirmed) {
                axios
                .get(`/api/auth/admin/newsletter/${id}/status`, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            })
                .then(response => {
                    this.getResults();
                        if (response.data.data.status === 200) {
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
                                icon: 'success',
                                title: response.data.message
                            })
                    } else {
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
                            title: response.data.message
                        })
                    }
                }).catch(error =>{
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
            });
            
        },

        actifToInactif(id) {
            this.$swal({
                title: "Etes-vous sûr?",
                text: "Voulez vous vraiment désactiver cet abonné!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "blue",
                confirmButtonText: "Oui!",
                cancelButtonText: "Non, annuler !",
                closeOnConfirm: true,
                closeOnCancel: true
            }).then((confirmed) => {
                if (confirmed.isConfirmed) {
                axios
                .get(`/api/auth/admin/newsletter/${id}/status`, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            })
                .then(response => {
                    this.getResults();
                        if (response.data.data.status === 200) {
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
                                icon: 'success',
                                title: response.data.message
                            })
                    } else {
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
                            title: response.data.message
                        })
                    }
                }).catch(error =>{
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
            });
            
        },
    },
};
</script>