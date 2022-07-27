<template>
<div class="home-main py-5">
  <div class="text-jumbo">
    <p class="h1">Cerca l'appartamento dei tuoi sogni!</p>
    <p class="h4">BoolBnB da oggi ti offre l'opportunità di trovare un alloggio che soddisfi a pieno le tue esigenze!</p>
  </div>
  <div class="container">
    <h1 class="display-6 text-center py-3 my-3">Appartamenti in evidenza</h1>
      <div class="row justify-content-center">
        <div class="col-8 card m-3 col-md-6 col-lg-3 py-2 shadow" v-for="(apartment,index) in apartments" :key="index">
          <router-link :to="{ name: 'apartment', params: { slug: apartment.slug } }" target="_blank">
            <div class="card-box">
              <img class="rounded" :src="`../storage/${apartment.images[0].image}`" alt="">
              <h6 class="font-weight-bold pt-1">{{apartment.title}}</h6>
              <span>Host privato</span>
              <p class="p-0"><span class="font-weight-bold">{{apartment.price}}</span> €/ notte</p>
            </div>
          </router-link>
        </div>
      </div>
    </div>
</div>

</template>

<script>
export default {
    name: "HomeComponent",
    data() {
        return {
            apartments: [],
        };
    },
    created() {
        axios.get("/api/sponsorships").then((res) => {
            this.apartments = res.data;
        });
    },
};
</script>

<style scoped lang="scss">
.home-main{
  color: white;
  background-image: url('/storage/uploads/pink-suitcase-with-hat-globe-it.jpg');
  background-size: cover;
  background-position: 10% 70%;
  height: 100%;
  position: relative;
  background-color: #9BD6CC;
  overflow: auto;
  .text-jumbo{
    color: white;
    width: 20%;
    position:absolute;
    bottom: 5%;
    right: 5%;
  }
  .card-box{
    text-decoration: none;
    color: black;
    img{
      max-height: 250px;
      min-height: 150px;
      width: 100%;
    }
  }
}
@media (max-width: 992px) {
  .home-main{
    // background-image: url('/storage/uploads/background-mobil.png');
    // background-size: 80%;
    background-attachment: fixed;
    .text-jumbo{
      display: none;
    }
  }

}

</style>
