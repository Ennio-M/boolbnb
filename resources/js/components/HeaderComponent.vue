<template>
    <header class="container">
        <!--  -->
        <div
            class="upper-header d-flex justify-content-around align-items-center">
            <div id="logo d-flex">
                <img src="/storage/uploads/LogoBoolbnb.png" alt="boolbnblogo" />
            </div>

            <div
                class="search-container d-flex justify-content-center align-items-center">
                <div class="row justify-content-center align-items-center">
                    <form action="/action_page.php">
                        <input class="searchbar" type="text" v-model="inputText" placeholder="Ricerca Appartamenti" name="search"/>
                    </form>
                    <router-link :to="{ name:'research', params:{userInput: inputText} }">
                        <button class="lens" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </router-link>
                </div>
            </div>

            <nav class="d-flex text-center justify-content-center align-items-center">
                <a class="text-muted" href="/register"><h5>Diventa un Host</h5></a>

                <a class="text-muted" href="/admin"><i class="fa-solid fa-circle-user"></i></a>
            </nav>
        </div>

        <!--  -->

        <div class="lower-header">
            <div class="navbar">
                <h3>Filtra la tua ricerca</h3>
                <form action="#">
                    <label for="min_rooms">Numero minimo di stanze</label>
                    <input type="number" id="min_rooms" name="min_rooms">
                    
                    <label for="min_beds">Numero minimo di posti letto</label>
                    <input type="number" id="min_beds" name="min_beds">

                    <label for="radius">Raggio di ricerca</label>
                    <input type="range" min="1" max="100" value="20" id="radius" name="radius" v-model="userRange"> <span>{{userRange}} km</span>

                    <p class="m-0">Servizi</p>
                    <div v-for="(service, index) in services" :key="index" class="form-check-inline">
                        <input type="checkbox" :id="service.id" name="services[]">
                        <label :for="service.id">{{service.name}}</label>
                    </div>
                </form>
            </div>
        </div>

        <!--  -->
    </header>
</template>

<script>
export default { 
    name: "HeaderComponent",
    data(){
        return {
            inputText: '',
            services: null,
            userRange: 20
        }
    },
    mounted(){
        axios.get('/api/services').then((response) => {
            this.services = response.data;
            console.log(this.services)
        }).catch((error) => {
            console.log(error);
        })
    }
};
</script>

<style scoped lang="scss">
header {
    background-color: #ffffff;
    height: 200px;
    max-width: 90%;

    .fw-bold {
        font-weight: bold;
        text-decoration: none;
        font-size: 16px;
    }

    .upper-header {
        height: 50%;
        border-color: brown;
        background-color: white;
    }

    .fa-circle-user {
        font-size: 35px;
        color: gray;
        margin-left: 10px;

        &:hover {
            color: rgb(63, 62, 62);
        }
    }

    nav {
        height: 40px;
    }

    .lens {
        background-color: #ff385c;
        border: none;
        height: 30px;
        width: 30px;
        border-radius: 50%;
        color: white;
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        margin-left: 5px;
    }

    #logo,
    img {
        height: 50px;
    }

    .lower-header {
        height: 50%;
        background-color: grey;
    }

    .search-container {
        width: 25%;
        height: 50px;
        border: 1px solid gray;
        border-radius: 30px;
    }

    .searchbar {
        border: none;
    }
}
</style>
