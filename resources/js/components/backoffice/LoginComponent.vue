<template>
    <div class="bg-gradient-success">
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">
    
                <div class="col-xl-10 col-lg-12 col-md-9">
    
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block ">
                                    <img src="/assets/admin/img/banniereactualitetogo.jpg" style="background-position: center;
                                    background-size: cover; width: 470px; height: 571px; object-fit: cover" alt="">
                                </div>
                                <div class="col-lg-6">
                                    <br><br>
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Page de connexion</h1>
                                            <div class="alert alert-danger" v-if="error" role="alert">
                                                {{ error }}
                                              </div>
                                        </div>
                                        <form class="user">
                                            <div class="form-group" v-if="errors.username">
                                                <input type="text" class="form-control form-control-user is-invalid"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                   v-model="username"  placeholder="Votre nom d'utilisateur ou email">
                                                   <div id="exampleInputEmail" v-for="errorUsername in errors.username" :key="errorUsername" class="invalid-feedback">
                                                        {{ errorUsername }}
                                                  </div>
                                            </div>
                                            <div class="form-group" v-else>
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                   v-model="username"  placeholder="Votre nom d'utilisateur ou email">
                                            </div>
                                            <div class="form-group" v-if="errors.password">
                                                <input type="password" class="form-control form-control-user is-invalid"
                                                   v-model="password" id="exampleInputPassword" placeholder="Mot de passe">
                                                <div id="exampleInputEmail" v-for="errorPassword in errors.password" :key="errorPassword" class="invalid-feedback">
                                                    {{ errorPassword }}
                                              </div>
                                            </div>
                                            <div class="form-group" v-else>
                                                <input type="password" class="form-control form-control-user" v-model="password" id="exampleInputPassword" placeholder="Mot de passe">   
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                                                </div>
                                            </div>
                                            <button type="button" v-if="loading" class="btn btn-primary btn-user btn-block">
                                                Connexion en cours ...
                                            </button>
                                            <button type="submit" @click.prevent="submitLogin" v-else class="btn btn-primary btn-user btn-block">
                                                Se connecter
                                            </button>
                                            
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            
                                            <a class="small" href="#">Mot de passe oublié?</a>
                                        </div>
                                        
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
    </div>
</template>
<script>

import store from '../../store/index'
    export default {
        data() {
            return {
                username: '',
                password: '',
                loginError: false,
                loading: false,
                error: false,
                errors: []
            }
        },
        methods: {
            submitLogin() {
                this.loading = true

                this.loginError = false;

                axios.post('/api/auth/login', {username: this.username, password: this.password}).then(response => {

                    this.loading = false

                    if(response.data.status === 200){

                        // login user, store the token and redirect to dashboard

                        store.commit('loginUser')

                        store.state.user.token = response.data.access_token

                        localStorage.setItem('token', response.data.access_token)


                        this.$router.push({ name: 'dashboard' })

                    }else{

                        if (response.data.status === 401) {

                            this.errors = response.data.errors

                        } else {
                            
                            this.error = response.data.message

                        }

                    }

                    
                   
                }).catch(error => {
                    this.loginError = true
                });
            }
        }
    }

</script>