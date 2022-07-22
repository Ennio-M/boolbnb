<template>
<div>
  <section class="jumbo text-center">
    <div class="text-jumbo">
      <h2>Cerca l'appartamento dei tuoi sogni!</h2>
      <p>BoolBnB da oggi ti offre l'opportunità di trovare un alloggio che soddisfi a pieno le tue esigenze!</p>
    </div>
  </section>
  <h2 class="display-6 text-center py-2">Appartamenti in evidenza</h2>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-10 col-md-6 col-lg-4 col-xl-3 p-2" v-for="(apartment,index) in apartments" :key="index">
          <router-link :to="{ name: 'apartment', params: { slug: apartment.slug } }">
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
    axios.get("/api/apartments/milano/20/0/0/[]").then((res) => {
      this.apartments = res.data;
    });
  },
};
</script>

<style scoped lang="scss">
.jumbo{
  background-image: url('/storage/uploads/pink-suitcase-with-hat-globe-it.jpg');
  background-size: 99%;
  background-position: 100%;
  height: 300px;
  position: relative;
  .text-jumbo{
    width: 40%;
    position:absolute;
    bottom: 0;
    right: 5%;
  }
}
.card-box{
  text-decoration: none;
  color: black;
  img{
    height: 250px;
    width: 100%;
  }
}
</style>
