<template>

    <div class="row">
        <div class="col-12">
        <h2>NOUS ENVOYER UN MESSAGE</h2>
        <p>Pour nous contacter veuillez utiliser le formulaire ci-dessous.</p>
        <div class="alert alert-danger" v-if="error" role="alert">
            {{ error  }}
        </div>
        <!-- Form START -->
        <form class="contact-form" id="contact-form" @submit.prevent="store">
        <!-- Main form -->
        <div class="row">
            <div class="col-md-6">
            <!-- name -->
            <div class="mb-3"  v-if="!errors.nomComplet">
                <input required id="con-email" name="nomComplet" v-model="data.nomComplet"  type="text" class="form-control " placeholder="Noms & Prénoms (*)">
            </div>
            <div class="mb-3"  v-else>
                <input required id="con-email" name="nomComplet" v-model="data.nomComplet"  type="text" class="form-control is-invalid" placeholder="Noms & Prénoms (*)">
                <div  class="invalid-feedback" style="color: red; font-size: 0.9em">
                    {{ errors.nomComplet }}
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <!-- name -->
            <div class="mb-3"  v-if="!errors.telephone">
                <input  id="con-email" name="telephone" v-model="data.telephone"  type="number" class="form-control" placeholder="Numero de Télephone">
            </div>
            <div class="mb-3"  v-else>
                <input  id="con-email" name="telephone" v-model="data.telephone"  type="number" class="form-control is-invalid" placeholder="Numero de Télephone">
                <div  class="invalid-feedback" style="color: red; font-size: 0.9em">
                    {{ errors.telephone }}
                </div>
            </div>
            </div>
            <div class="col-md-12">
            <!-- email -->
            <div class="mb-3"  v-if="!errors.email">
                <input required id="con-email" name="email" v-model="data.email"  type="email" class="form-control" placeholder="Votre email(*)">
            </div>
            <div class="mb-3"  v-else>
                <input required id="con-email" name="email" v-model="data.email"  type="email" class="form-control is-invalid" placeholder="Votre email(*)">
                <div  class="invalid-feedback" style="color: red; font-size: 0.9em">
                    {{ errors.email }}
                </div>
            </div>
            </div>
            <div class="col-md-12">
            <!-- Subject -->
            <div class="mb-3"  v-if="!errors.siteweb">
                <input  id="con-email" name="siteweb" v-model="data.siteweb"  type="text" class="form-control " placeholder="Votre Site Web (Pas obligatoire)">
            </div>
            <div class="mb-3"  v-else> 
                <input  id="con-email" name="siteweb" v-model="data.siteweb"  type="text" class="form-control is-invalid" placeholder="Votre Site Web (Pas obligatoire)">
                <div  class="invalid-feedback" style="color: red; font-size: 0.9em">
                    {{ errors.siteweb }}
                </div>
            </div>
            </div>
            <div class="col-md-12">
            <!-- Subject -->
            <div class="mb-3"  v-if="!errors.sujet">
                <input required id="con-email" name="sujet" v-model="data.sujet"  type="text" class="form-control" placeholder="Votre Sujet ou Requête">
            </div>
            <div class="mb-3"  v-else>
                <input required id="con-email" name="sujet" v-model="data.sujet"  type="text" class="form-control is-invalid" placeholder="Votre Sujet ou Requête">
                <div   class="invalid-feedback" style="color: red; font-size: 0.9em">
                    {{ errors.sujet }}
                </div>
            </div>
            </div>
            <div class="col-md-12">
            <!-- Message -->
            <div class="mb-3" v-if="!errors.content">
                <textarea required id="con-message" name="content" v-model="data.content" cols="40" rows="6" class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="mb-3" v-else>
                <textarea required id="con-message" name="content" v-model="data.content" cols="40" rows="6" class="form-control" placeholder="Message"></textarea>
                <div class="invalid-feedback" style="color: red; font-size: 0.9em">
                {{ errors.content }}
                </div>
                </div>
            </div>
            
            
            <!-- submit button -->
            <div class="col-md-12 text-start">
                <button class="btn btn-primary w-100" type="submit" v-if="!loading">Envoyer votre message</button>
                <button class="btn btn-primary w-100" type="button" v-else><i  style="color: #fff" class="fa fa-spinner fa-spin fa-fw"></i>
                    <span class="sr-only"></span>Envoie en cours</button>
            </div>
        </div>
        </form>
                <!-- Form END -->
        </div>
    </div>
                  
</template>

<script>
export default {
    data(){
		return {
           
            loading: false, 
            
            
            data: {
                nomComplet: null,
                telephone: null,
                email: null,
                siteweb: null,
                sujet: null,
                content: null, 
            },
            errors: {},
            error: '',
            
        }
    },
    methods: {
        
        store(){
            this.loading = true
           
            axios.post('/api/contact/store', this.data)
            .then(response =>{
                
                    if (response.data.data.status == 401) {
                        this.loading = false
                        this.errors = response.data.data.errors
                        const Toast = this.$swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 4000,
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
                                timer: 4000,
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

                        }
                    }
              
                }).catch(error =>{
                   
            })
        }, 
    
    },
    mounted() {

    }
}
</script>