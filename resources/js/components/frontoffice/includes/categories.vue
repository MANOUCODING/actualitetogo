<template>
    <h5 class="mb-4 text-white">Nos Catégories</h5>
    <div class="row " v-if="loading">
        <div style="position: relative">
            <div class="lds-ellipsis" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);"><div></div><div></div><div></div><div></div></div>
            <br/><br/><br/><br/><br/><br/>
        </div>
    </div>
    <div class="row " v-else>

        <div class="col-4" v-for="info in categories" :key="info.id">
            <ul class="nav flex-column " >
                <li class="nav-item "><span class="nav-link pt-0 text-white" @click="category(info.slug)" style="cursor: pointer"> {{ info.name }} </span></li>
            </ul>
        </div>
    
    </div>
</template>

<script>
export default {
    
    data(){
        return {
            categories: {},
            loading: true,
        }
    },
    methods: {

        getResults(){
            this.axios.get('/api/home/footer/categories' )
                .then(response => {
                
                if(response.data.data.status == 200){

                    this.loading = false
                    
                    this.categories = response.data.data.categories
    
                }
            });
        },

        category(slug){
            window.location = '/' + slug
        }

    },
    mounted() {
        
        this.getResults();
    }
}
</script>