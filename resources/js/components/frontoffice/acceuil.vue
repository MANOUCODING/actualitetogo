<template>
    <section class="pt-4 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"> <a class="nav-link fs-5 active" data-bs-toggle="tab" href="#important"> <i class="bi bi-bookmark-star me-2"></i> IMPORTANT </a> </li>
                        <li class="nav-item"> <a class="nav-link fs-5" data-bs-toggle="tab" @click="societeH" href="#societe"> <i class="fas fa-globe fs-5 me-2"></i> SOCIETE </a> </li>
                        <li class="nav-item"> <a class="nav-link fs-5" data-bs-toggle="tab" @click="sportsH" href="#sports"> <i class="fas fa-fire me-2"></i>SPORT </a> </li>
                        <li class="nav-item"> <a class="nav-link fs-5" data-bs-toggle="tab" @click="opinionH" href="#opinion"> <i class="bi bi-mic me-2"></i> OPINION </a> </li>
                        <li class="nav-item"> <a class="nav-link fs-5" data-bs-toggle="tab" @click="faitsDiversH" href="#faitsDivers"> <i class="fab fa-readme me-2"></i> FAITS DIVERS </a> </li>
                        <li class="nav-item"> <a class="nav-link fs-5" data-bs-toggle="tab" @click="fenetresH" href="#fenetres"> <i class="fa-solid fa-earth-africa me-2"></i>FENETRE SUR L'AFRIQUE </a> </li>                                    
                    </ul>
                    <div class="tab-content">
                        <!-- Most read tab START -->
                        <div class="tab-pane show active" id="important">
                            <div v-if="loadImportant == 1">
                                <div style="position: relative">
                                    <div class="lds-ellipsis" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);"><div></div><div></div><div></div><div></div></div>
                                    <br/><br/><br/><br/><br/><br/>
                                </div>
                            </div>
                            <div v-else-if="loadImportant == 2">
                                <div class="row">
                                    
                                    <div class="col-sm-6 col-lg-3" v-for="result in important" :key="result.id">
                                        <div class="card bg-transparent">
                                            <!-- Card img -->
                                            <img class="card-img rounded" :src='getImage(result.ogImage)' alt="" style="height: 200px; object-fit: cover">
                                            <div class="card-body px-0 pt-3">
                                                <h6 class="card-title mb-0"><span @click="article(result.slug)" style="cursor: pointer" class="btn-link text-reset fw-bold" v-html="result.title"></span></h6>
                                                <!-- Card info -->
                                                <ul class="nav nav-divider align-items-center text-uppercase small mt-2">
                                                    <li class="nav-item">
                                                        <span @click="author(result.authorSlug)" style="cursor: pointer" class="text-reset btn-link">{{ result.authorName }}</span>
                                                    </li>
                                                    <li class="nav-item">{{ moment(result.date_publish).format(" MMM DD, YYYY") }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div v-else>
                               
                            </div>
                        </div>
                        
                        <div class="tab-pane show" id="societe">
                            <div v-if="loadSociete">
                                <div style="position: relative">
                                    <div class="lds-ellipsis" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);"><div></div><div></div><div></div><div></div></div>
                                    <br/><br/><br/><br/><br/><br/>
                                </div>
                            </div>
                            <div v-else>
                                <div className="card" >
                                    <div className="row">
                                        <div class="col-sm-6 col-lg-3" v-for="result in societe"  :key="result.id">
                                            <div class="card bg-transparent">
                                                <!-- Card img -->
                                                <img class="card-img rounded" :src='getImage(result.ogImage)' alt="" style="height: 200px; object-fit: cover">
                                                <div class="card-body px-0 pt-3">
                                                    <h6 class="card-title mb-0"><span @click="article(result.slug)" style="cursor: pointer" class="btn-link text-reset fw-bold" v-html="result.title"></span></h6>
                                                    <!-- Card info -->
                                                    <ul class="nav nav-divider align-items-center text-uppercase small mt-2">
                                                        <li class="nav-item">
                                                            <span @click="author(result.authorSlug)" style="cursor: pointer" class="text-reset btn-link">{{ result.authorName }}</span>
                                                        </li>
                                                        <li class="nav-item">{{ moment(result.date_publish).format(" MMM DD, YYYY") }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane show" id="sports">
                            <div v-if="loadSport">
                                <div style="position: relative">
                                    <div class="lds-ellipsis" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);"><div></div><div></div><div></div><div></div></div>
                                    <br/><br/><br/><br/><br/><br/>
                                </div>
                            </div>
                            <div v-else>
                                <div className="card" >
                                    <div className="row">
                                        <div class="col-sm-6 col-lg-3" v-for="result in sports" :key="result.id">
                                            <div class="card bg-transparent">
                                                <!-- Card img -->
                                                <img class="card-img rounded" :src='getImage(result.ogImage)' alt="" style="height: 200px; object-fit: cover">
                                                <div class="card-body px-0 pt-3">
                                                    <h6 class="card-title mb-0"><span @click="article(result.slug)" style="cursor: pointer" class="btn-link text-reset fw-bold" v-html="result.title"></span></h6>
                                                    <!-- Card info -->
                                                    <ul class="nav nav-divider align-items-center text-uppercase small mt-2">
                                                        <li class="nav-item">
                                                            <span @click="author(result.authorSlug)" style="cursor: pointer" class="text-reset btn-link">{{ result.authorName }}</span>
                                                        </li>
                                                        <li class="nav-item">{{ moment(result.date_publish).format(" MMM DD, YYYY") }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane show" id="opinion">
                            <div v-if="loadOpinion">
                                <div style="position: relative">
                                    <div class="lds-ellipsis" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);"><div></div><div></div><div></div><div></div></div>
                                    <br/><br/><br/><br/><br/><br/>
                                </div>
                            </div>
                            <div v-else>
                                <div className="card" >
                                    <div className="row">
                                        <div class="col-sm-6 col-lg-3" v-for="result in opinion" :key="result.id">
                                            <div class="card bg-transparent">
                                                <!-- Card img -->
                                                <img class="card-img rounded" :src='getImage(result.ogImage)' alt="" style="height: 200px; object-fit: cover">
                                                <div class="card-body px-0 pt-3">
                                                    <h6 class="card-title mb-0"><span @click="article(result.slug)" style="cursor: pointer" class="btn-link text-reset fw-bold" v-html="result.title"></span></h6>
                                                    <!-- Card info -->
                                                    <ul class="nav nav-divider align-items-center text-uppercase small mt-2">
                                                        <li class="nav-item">
                                                            <span @click="author(result.authorSlug)" style="cursor: pointer" class="text-reset btn-link">{{ result.authorName }}</span>
                                                        </li>
                                                        <li class="nav-item">{{ moment(result.date_publish).format(" MMM DD, YYYY") }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane show" id="faitsDivers">
                            <div v-if="loadFaitsDivers">
                                <div style="position: relative">
                                    <div class="lds-ellipsis" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);"><div></div><div></div><div></div><div></div></div>
                                    <br/><br/><br/><br/><br/><br/>
                                </div>
                            </div>
                            <div v-else>
                                <div className="card">
                                    <div className="row">
                                        <div class="col-sm-6 col-lg-3"  v-for="result in faitsDivers" :key="result.id">
                                            <div class="card bg-transparent">
                                                <!-- Card img -->
                                                <img class="card-img rounded" :src='getImage(result.ogImage)' alt="" style="height: 200px; object-fit: cover">
                                                <div class="card-body px-0 pt-3">
                                                    <h6 class="card-title mb-0"><span @click="article(result.slug)" style="cursor: pointer" class="btn-link text-reset fw-bold" v-html="result.title"></span></h6>
                                                    <!-- Card info -->
                                                    <ul class="nav nav-divider align-items-center text-uppercase small mt-2">
                                                        <li class="nav-item">
                                                            <span @click="author(result.authorSlug)" style="cursor: pointer" class="text-reset btn-link">{{ result.authorName }}</span>
                                                        </li>
                                                        <li class="nav-item">{{ moment(result.date_publish).format(" MMM DD, YYYY") }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane show" id="fenetres">
                            <div v-if="loadFenetre">
                                 <div style="position: relative">
                                    <div class="lds-ellipsis" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);"><div></div><div></div><div></div><div></div></div>
                                    <br/><br/><br/><br/><br/><br/>
                                </div>
                            </div>
                            <div v-else>
                                <div className="card" >
                                    <div className="row">
                                        <div class="col-sm-6 col-lg-3" v-for="result in fenetres" :key="result.id">
                                            <div class="card bg-transparent">
                                                <!-- Card img -->
                                                <img class="card-img rounded" :src='getImage(result.ogImage)' alt="" style="height: 200px; object-fit: cover">
                                                <div class="card-body px-0 pt-3">
                                                    <h6 class="card-title mb-0"><span @click="article(result.slug)" style="cursor: pointer" class="btn-link text-reset fw-bold" v-html="result.title"></span></h6>
                                                    <!-- Card info -->
                                                    <ul class="nav nav-divider align-items-center text-uppercase small mt-2">
                                                        <li class="nav-item">
                                                            <span @click="author(result.authorSlug)" style="cursor: pointer" class="text-reset btn-link">{{ result.authorName }}</span>
                                                        </li>
                                                        <li class="nav-item">{{ moment(result.date_publish).format(" MMM DD, YYYY") }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br/>
    
</template>

<script>
import moment from 'moment'
export default {
    
    data(){
        return {
            
            loading: true,
            load: true,
            loadSport: false,
            sports: {},
            loadSociete: false,
            societe: {},
            loadOpinion: false,
            opinion: {},
            loadFaitsDivers: false,
            faitsDivers: {},
            loadFenetre: false,
            fenetres: {},
            // loadANePasManquer: 3,
            // aNePasManquerTogo: {},
            loadImportant: 3,
            important: {}
        }
    },
    methods: {

        getResults(){
            

            this.loadImportant = 1

            this.axios.get('/api/home/posts/important' )
                .then(response => { 

                if(response.data.data.status == 200){

                    this.loadImportant = 2

                    this.important = response.data.data.important

                    

                }

            })
            
                    
        },

        sportsH(){

            this.loadSport = true

            this.axios.get('/api/home/posts/sports' )
                .then(response => {
                
                if(response.data.data.status == 200){

                    this.loadSport = false
                    
                    this.sports = response.data.data.sports

                }
            });

        },

        societeH(){

            this.loadSociete = true

            this.axios.get('/api/home/posts/societe' )
                .then(response => {
                
                if(response.data.data.status == 200){

                    this.loadSociete = false
                    
                    this.societe = response.data.data.societe
                    
                }
            });

        },

        opinionH(){

            this.loadOpinion = true

            this.axios.get('/api/home/posts/opinion' )
                .then(response => {
                
                if(response.data.data.status == 200){

                    this.loadOpinion = false
                    
                    this.opinion = response.data.data.opinion
                    
                }
            });

        },

        faitsDiversH(){

            this.loadFaitsDivers = true

            this.axios.get('/api/home/posts/faits/divers' )
                .then(response => {
                
                if(response.data.data.status == 200){

                    this.loadFaitsDivers = false
                    
                    this.faitsDivers = response.data.data.faitsDivers
                    
                }
            });

        },

        fenetresH(){

            this.loadFenetre = true

            this.axios.get('/api/home/posts/fenetres' )
                .then(response => {
                
                if(response.data.data.status == 200){

                    this.loadFenetre = false
                    
                    this.fenetres = response.data.data.fenetres
                    
                }
            });

        },

        author(slug){
            window.location = '/auteurs/' + slug
        },

        article(slug){
            window.location = '/' + slug
        },

        getImage(slug){
            return '/storage/'+slug;
        }
    },
    mounted() {
        this.moment = moment
        this.getResults();
    }
}
</script>