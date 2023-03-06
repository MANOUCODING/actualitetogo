<template>
    <section class="pt-4 pb-0">
        <div class="container-fluid">
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
    <section className="pt-4 pb-0 card-grid">
        <div v-if="loadANePasManquer == 1">
            <div style="position: relative">
                <div class="lds-ellipsis" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);"><div></div><div></div><div></div><div></div></div>
                <br/><br/><br/><br/><br/><br/>
            </div>
        </div>
        <div v-else-if="loadANePasManquer == 2">
            <div className="container-fluid">

                <div className="row g-4">
                    <div className="col-lg-8">
                        <div>
                            <h3 className="m-0"><i className="bi bi-newspaper me-2"></i>A NE PAS MANQUER TOGO</h3>
                        </div> 
                    </div>
                </div>
                <br/>
                <div className="border-bottom border-primary border-2 opacity-1"></div>
            </div>
            <br/>
            <div className="container-fluid">
                <div className="row g-4">
                    <div className="col-lg-12">
                        <Splide aria-label="My Favorite Images" :options="{type: 'loop', autoplay: true, interval: 3000 }">
                            
                            <SplideSlide v-for="result in aNePasManquerTogo" :key="result.id">
                                <div class="card card-overlay-bottom card-img-scale">
                                    
                                    <img class="card-img" :src='getImage(result.ogImage)' alt="Card image" style="height: 600px; width: 1350px; object-fit: cover"/>
                                    
                                    <div class="card-img-overlay d-flex align-items-center p-3 p-sm-5"> 
                                        <div class="w-100 mt-auto">
                                            <div class="col">
                                                
                                                <a href="#" class="badge text-bg-info mb-2"><i class="fas fa-circle me-2"></i> {{result.categoryName}} </a>
                                                
                                                <h5 class="text-white"><span @click="article(result.slug)" style="cursor: pointer" class="btn-link text-reset stretched-link fw-normal" v-html="result.title"></span></h5>
                                            
                                                <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                                    <li class="nav-item">
                                                        <div class="nav-link">
                                                            <div class="d-flex align-items-center text-white position-relative">
                                                               par <span @click="author(result.authorSlug)" style="cursor: pointer" class="stretched-link text-reset btn-link ms-3">{{ result.authorName }}</span>                                                                
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item">{{ moment(result.date_publish).format(" MMM DD, YYYY") }}</li>
                                                    <li class="nav-item">
                                                        <a href="#" class="btn-link"><i class="fas fa-comment-alt me-1"></i> {{ result.commentsCount }} Commentaires</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </SplideSlide>
                    </Splide>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>

        </div>
    </section>
    <br/> <br />
</template>

<script>
import moment from 'moment'
import { Splide, SplideSlide } from '@splidejs/vue-splide'
import '@splidejs/vue-splide/css';
export default {
    components: {
        Splide,
        SplideSlide,
    },
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
            loadANePasManquer: 3,
            aNePasManquerTogo: {},
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

                    this.loadANePasManquer = 1

                    this.axios.get('/api/home/posts/aNePasManquer' )
                        .then(response => { 

                        if(response.data.data.status == 200){

                            this.loadANePasManquer = 2

                            this.aNePasManquerTogo = response.data.data.aNePasManquerTogo

                        }
                    });

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