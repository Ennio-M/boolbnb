<template>
    <main>
        <section class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 font-weigth-bold text-center">
                    <h1>{{ apartment.title }}</h1>
                </div>
                <div class="col-12 h-75">
                    <div class="slider-wrapper rounded" tabindex="0"
                    @keydown.left="slidePrev"
                    @keydown.right="slideNext"
                    >
                        <div class="item position-relative" >
                            <div @click="slidePrev" class="prev">prev</div>
                            <div @click="slideNext" class="next">next</div>
                            <img class="img-fluid rounded" :src="`/storage/${apartment.images[indexActive].image}`" :alt="apartment.title" />
                        </div>

                        <div class="thumbs d-flex rounded my-3">
                            <div @click="select(index)" class="thumb" :class="{'active': index === indexActive}" v-for="(images,index) in apartment.images" :key="index">
                                <img class="rounded-bottom" :src="`/storage/${images.image}`" :alt="apartment.title"/>
                            </div>
                        </div>

                    </div>
                </div>
                
                <div class="col-12 py-2">
                   <h5>Intero Alloggio - Host : {{apartment.user_id}}  </h5>
                   <span>{{apartment.beds * 2}} Ospiti - {{apartment.
                    rooms}} camere da letto - {{apartment.beds}} letti - {{apartment.bathrooms}} bagni</span>
                   <p v-html="apartment.description"></p>
                </div>
                <div class="col-12">
                    <h3>Cosa Troverai</h3>
                    <div v-for="(service,index) in apartment.services" :key="index">
                        <p>{{service.name}}</p>
                    </div>
                </div>
            </div>
           <!-- <map-component :apartment="apartment" /> -->
        </section>
    </main>
</template>

<script>
import MapComponent from "../components/MapComponent.vue";

export default {
    name: "ApartmentComponent",
    components: {
        MapComponent
    },
    data() {
        return {
            apartment: null,
             indexActive:0,
            intervallo:null
        };
    },
    methods:{
        slidePrev(){
            if(this.indexActive === 0){
                this.indexActive = this.apartment.images.length -1;
            }else{
                this.indexActive -= 1
            }
        },
        slideNext(){
            if(this.indexActive === this.apartment.images.length -1){
                this.indexActive = 0;
            }else{
                this.indexActive += 1
            }
        },
    },
    mounted() {
        const slug = this.$route.params.slug;
        axios.get(`/api/apartments/${slug}`).then((res) => {
            this.apartment = res.data;
        });
    },
};
</script>

<style scoped lang="scss">
.slider-wrapper{
    outline:0;
    .item{
        position: relative;
        overflow: hidden;
        img{
            height: 100%;
        }
        .prev, .next {
            text-align: center;
            width: 100px;
            height: 100px;
            margin: 10px 0;
            border-radius: 50%;
            background: white;
            position: absolute;
            cursor: pointer;
            z-index: 999;
            line-height: 25px;
            text-transform: uppercase;
            padding: 10px;
            font-size: 1em;
            letter-spacing: 1.5px;
            color:#E61C54;
            top: 50%;
        }
        .next{
            transform: rotate(270deg);
            right: -60px;
        }
        .prev{
            left: -60px;
            transform: rotate(90deg);
        }   
    }   
    .thumbs {
        width: 100%;
        background: #000;
        .thumb {
            width: calc(100% / 5);
            opacity: 0.5;
            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }
        .thumb.active {
            border: 2px solid #ccc;
            opacity: 1;
        }
    }
     .description_container{
        border-bottom: 3px solid grey;
    }
 }
   
 </style>