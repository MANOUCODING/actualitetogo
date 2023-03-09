<template>
    <section class="pt-4">
        <div class="container">
            <div class="row">
                <!-- Title -->
                <div class="col-md-12">
                    <div class="mb-4 d-md-flex justify-content-between align-items-center">
                        <h2 class="m-0">Toute l'actualité</h2>
                    </div>
                    <div class="border-bottom border-primary border-2 opacity-1"></div>
                </div>
            </div>
            <br>
            <div v-if="loading">
                <div style="position: relative">
                    <div class="lds-ellipsis" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);"><div></div><div></div><div></div><div></div></div>
                    <br/><br/><br/><br/><br/><br/>
                </div>
            </div>
            <div v-else class="row">

                <div class="col-lg-6"  v-for="result in all" :key="result.id">
                    <div class="card mb-2 mb-md-4">
						<div class="row g-3">
							<div class="col-4">
								<img class="rounded-3" :src='getImage(result.ogImage)' alt="">
							</div>
							<div class="col-8">
								<h6><span @click="article(result.slug)" style="cursor: pointer" class="btn-link stretched-link text-reset fw-bold" v-html="result.title"></span></h6>
								<!-- Card info -->
								<ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
									<li class="nav-item">
										<div class="nav-link">
											<div class="d-flex align-items-center position-relative">
                                                <div class="d-flex align-items-center position-relative"> 
                                                    <i class="fa fa-2x fa-user-circle" ></i>
                                                    &nbsp; par &nbsp; <span @click="author(result.authorSlug)" style="cursor: pointer" class="text-reset btn-link">{{ result.authorName }}</span>
                                                </div>
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
        </div>
    </section>

</template>
<script>
import moment from 'moment'
export default {
    
    data(){
        return {
            
            loading: true,
            all: {},

            
        }
    },

    methods: {
        getResults(){

            this.loading = true

            this.axios.get('/api/home/posts/all' )
                .then(response => { 

                if(response.data.data.status == 200){

                    this.loading = false

                    this.all = response.data.data.all

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