<template>
    <main>
        <section class="container py-5 text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1>{{ apartment.title }}</h1>
                </div>
                <div class="col-12">
                    <div class="slider-wrapper" tabindex="0"
                    @keydown.left="slidePrev"
                    @keydown.right="slideNext"
                    >
                        <div class="item h-50" >
                            <img class="img-fluid" :src="`/storage/${apartment.images[indexActive].image}`" :alt="apartment.title" />
                        </div>

                        <div class="thumbs d-flex">
                            <div @click="slidePrev" class="prev translate-middle"></div>
                            <div @click="slideNext" class="next translate-middle"></div>
                            <div @click="select(index)" class="thumb" :class="{'active': index === indexActive}" v-for="(images,index) in apartment.images" :key="index">
                                <img :src="`/storage/${images.image}`" :alt="apartment.title"/>
                            </div>
                        </div>

                    </div>
                </div>
                
                <div class="col-12">
                   <p v-html="apartment.description"></p>
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
    
}
.item{
    position: relative;
    img{
        height: 100%;
    }
}
.thumbs {
    width: 100%;
    background: #000;
    position: relative;
    .thumb {
      width: calc(100% / 5);
      opacity: 0.5;
      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    }
  }
  .thumb.active {
      border: 2px solid #ccc;
      opacity: 1;
  }

  .prev, .next {
      width: 20px;
      height: 20px;
      margin: 10px 0;
      border-radius: 50%;
      background: #ccc;
      position: absolute;
      right: 0;
      bottom: 50%;
      cursor: pointer;
      z-index: 999;
  }

  .next {
      left: 0;
  }
  .prev::after {
      content: '';
      width: 10px;
      height: 10px;
      border-top: 1px solid black;
      border-right: 1px solid black;
      display: block;
      position: absolute;
      top: 35%;
      left: 50%;
      transform: translate(-50%) rotate(-45deg);
  }

  .next::before {
      content: '';
      width: 10px;
      height: 10px;
      border-top: 1px solid black;
      border-right: 1px solid black;
      display: block;
      position: absolute;
      bottom: 35%;
      left: 50%;
      transform: translate(-50%) rotate(135deg);
  }
</style>
