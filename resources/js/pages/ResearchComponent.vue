<template>
<section>
    <div class="search-container d-flex justify-content-center align-items-center">
        <div class="row justify-content-center align-items-center">
            <form action="/action_page.php">
                <input class="searchbar" type="text" v-model="inputText" placeholder="Ricerca Appartamenti" name="search"/>
            </form>
            <button class="lens" type="submit" @click="search">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
    <div class="lower-header">
        <div class="navbar">
            <h3>Filtra la tua ricerca</h3>
            <form action="#">
                <label for="min_rooms">Numero minimo di stanze</label>
                <input type="number" id="min_rooms" name="min_rooms" v-model="userRooms">
                
                <label for="min_beds">Numero minimo di posti letto</label>
                <input type="number" id="min_beds" name="min_beds" v-model="userBeds">

                <label for="radius">Raggio di ricerca</label>
                <input type="range" min="1" max="100" value="20" id="radius" name="radius" v-model="userRange"> <span>{{userRange}} km</span>

                <p class="m-0">Servizi</p>
                <div v-for="(service, index) in services" :key="index" class="form-check-inline">
                    <input type="checkbox" :id="service.id" :value="service.id" v-model="userServices">
                    <label :for="service.id">{{service.name}}</label>
                </div>
                <button type="button" @click="filter">Filtra</button>
            </form>
        </div>
    </div>
    <h1>Appartamenti ricercati</h1>
    <div class="row row-cols-4">
        <div class="col my-3" v-for="(apartment, index) in filtered" :key="index">
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
            apartments: null,
            filtered: null,
            aptServices: null,
            inputText: '',
            services: null,
            userRooms: null,
            userBeds: null,
            userRange: 20,
            userServices: []
        }
    },
    methods: {
        search(){
        // chiamo l'api impostata nel controller passandole l'input dell'utente e salvo la lista di appartamenti restituita
            axios.get(`/api/apartments/${this.inputText}/${this.userRange}`).then((response) => {
                this.apartments = response.data;
                // salvo gli appartamenti in una lista da filtrare successivamente
                this.filtered = response.data;
            }).catch((error) => {
                console.log(error);
            })
        },

        filter(){
            // filtro ogni appartamento
            this.filtered = this.apartments.filter((apt) => {
                // salvo gli id dei servizi dell'appartamento
                this.aptServices = [];
                apt.services.forEach(element => {
                    this.aptServices.push(element.id)
                })
                // controllo il numero minimo di stanze e posi letto
                if( apt.rooms >= this.userRooms && apt.beds >= this.userBeds && this.userServices.every((serv) => { 
                        // con la funzione every() controllo che ogni id dei servizi scelti dall'utente sia nell'array degli id dei servizi dell'appartamento
                        return this.aptServices.includes(serv)
                    })
                ){
                    // ritorno true se le 3 condizioni sono soddisfatte, quindi l'appartamento verrà inserito nella lista filtrata
                    return true
                }
            })
        }
    },
    mounted(){
        // salvo tutti i servizi nel db tramite api
        axios.get('/api/services').then((response) => {
            this.services = response.data;
        }).catch((error) => {
            console.log(error);
        })
    }
}
</script>

<style lang="scss">

</style>