<template>
<div>
  <section class="jumbo text-center">
    <div class="text-jumbo">
      <h2>Cerca l'appartamento dei tuoi sogni!</h2>
      <p>BoolBnB da oggi ti offre l'opportunità di trovare un alloggio che soddisfi a pieno le tue esigenze </p>
    </div>
  </section>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-10" v-for="(apartment,index) in apartments" :key="index">
          <div class="card">
            <img class="img-fluid" :src="`../storage/${apartment.images[0].image}`" alt="">
          </div>
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
</style>
