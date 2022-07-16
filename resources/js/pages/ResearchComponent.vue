<template>
<section>
    <h1>Appartamenti ricercati</h1>
    <div class="row row-cols-4">
        <div class="col my-3" v-for="(apartment, index) in apartments" :key="index">
            <div class="card" style="width: 18rem;">
                <img :src="`../storage/${apartment.images[0].image}`" class="card-img-top" :alt="apartment.title">
                <div class="card-body">
                    <h5 class="card-title">{{apartment.title}}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<script>
export default {
    name:'ResearchComponent',
    data(){
        return {
            apartments: null
        }
    },
    mounted(){
        // salvo l'input dell'utente
        const userInput = this.$route.params.userInput;
        // chiamo l'api impostata nel controller passandole l'input dell'utente e salvo la lista di appartamenti restituita
        axios.get(`/api/apartments/${userInput}`).then((response) => {
            this.apartments = response.data;
        }).catch((error) => {
            console.log(error);
        })
    }
}
</script>

<style lang="scss">

</style>