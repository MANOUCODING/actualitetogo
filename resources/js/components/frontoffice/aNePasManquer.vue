<template>
    <div v-if="loading">
        <div style="position: relative">
            <div class="lds-ellipsis" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);"><div></div><div></div><div></div><div></div></div>
            <br/><br/><br/><br/><br/><br/>
        </div>
    </div>
    <div v-else>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 "  v-for="result in aNePasManquerTogo" :key="result.id">
                <div class="card" >
                    <!-- Card img -->
                    <div class="position-relative">
                        <img class="card-img" :src='getImage(result.ogImage)' style="height: 350px; width: 350px ; object-fit: cover" alt="Card image">
                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                            
                            <!-- Card overlay bottom -->
                            <div class="w-100 mt-auto">
                                <!-- Card category -->
                                <span @click="article(result.categorySlug)" style="cursor: pointer" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ result.categoryName}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-3">
                        <h6 class="card-title mb-0"><span @click="article(result.slug)" style="cursor: pointer" class="btn-link text-reset fw-bold" v-html="result.title"></span></h6>
                        <!-- Card info -->
                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="d-flex align-items-center position-relative"> 
                                        <i class="fa fa-2x fa-user-circle" ></i>
                                        &nbsp; par <span @click="author(result.authorSlug)" style="cursor: pointer" class="text-reset btn-link">{{ result.authorName }}</span>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">{{ moment(result.date_publish).format(" MMM DD, YYYY") }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment'
export default {
    
    data(){
        return {
            
            loading: true,
            aNePasManquerTogo: {},

            
        }
    },

    methods: {
        getResults(){

            this.loading = true

            this.axios.get('/api/home/posts/aNePasManquer' )
                .then(response => { 

                if(response.data.data.status == 200){

                    this.loading = false

                    this.aNePasManquerTogo = response.data.data.aNePasManquerTogo

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

    mounted(){
        this.moment = moment
        this.getResults();
    }
}

</script>