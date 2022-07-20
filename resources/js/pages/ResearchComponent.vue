<template>
  <section class="row">
    <!-- navbar -->

    <div class="navbar col d-flex justify-content-center align-items-center">

      <!-- / Search Container -->

      <h3 class="py-3">Filtra la tua ricerca</h3>

      <!-- search boxes -->

      <div class="search-box col py-3">
        <label for="min_rooms">Numero minimo di stanze:</label>
        <input
          type="number"
          id="min_rooms"
          name="min_rooms"
          v-model="userRooms"
        />
      </div>

      <div class="search-box col py-3">
        <label for="min_beds">Numero minimo di posti letto:</label>
        <input type="number" id="min_beds" name="min_beds" v-model="userBeds" />
      </div>

      <div class="search-box col py-3 text-center">
        <label for="radius">Raggio di ricerca:</label>
        <input
          type="range"
          min="1"
          max="100"
          value="20"
          id="radius"
          name="radius"
          v-model="userRange"
        />
        <span>{{ userRange }} km</span>
      </div>

      <div class="services-box py-3">
        <h5 class="mb-4 mt-2">Servizi:</h5>
        <div
          v-for="(service, index) in services"
          :key="index"
          class="form-check-inline d-flex"
          style="text-align: center"
        >
          <input
            type="checkbox"
            class="mr-3"
            :id="service.id"
            :value="service.id"
            v-model="userServices"
          />
          <label class="service-label" :for="service.id">{{
            service.name
          }}</label>
        </div>

        <!-- Filter button -->

        <button class="filter-button" type="button" @click="filter">
          Filtra
        </button>
      </div>
    </div>

    <!-- Appartamenti ricercati -->
    <div class="apartments-box row justify-content-center">
      <!-- <h1>Appartamenti ricercati:</h1> -->
      <div
        class="row my-3 mx-3"
        v-for="(apartment, index) in filtered"
        :key="index"
      >
        <!-- inizio Card -->
        <div class="card" style="width: 500px, height: 500px">
          <div class="row no-gutters">
            <div
              class="col-sm-5 d-flex justify-content-center align-items-center"
            >
              <!-- <img
                :src="`../storage/${apartment.images[0].image}`"
                class="img-fluid"
                :alt="apartment.title"
              /> -->
            </div>
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title">{{ apartment.title }}</h5>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Assumenda veniam earum doloribus deleniti reprehenderit
                  officia porro vero, incidunt beatae obcaecati eos tempore
                  dicta illo nesciunt esse magni error. Velit, ad!
                </p>
                <router-link
                  :to="{
                    name: 'apartment',
                    params: { slug: apartment.slug },
                  }"
                  >Visualizza appartamento</router-link
                >
              </div>
            </div>
          </div>
        </div>
        <!-- /fine Card -->
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "ResearchComponent",
  data() {
    return {
      apartments: null,
      filtered: null,
      aptServices: null,
      services: null,
      userRooms: null,
      userBeds: null,
      userRange: 20,
      userServices: [1, 2, 3],
    };
  },
  methods: {
    search() {
      
      
    },

    filter() {
      // filtro ogni appartamento
      this.filtered = this.apartments.filter((apt) => {
        // salvo gli id dei servizi dell'appartamento
        this.aptServices = [];
        apt.services.forEach((element) => {
          this.aptServices.push(element.id);
        });
        // controllo il numero minimo di stanze e posi letto
        if (
          apt.rooms >= this.userRooms &&
          apt.beds >= this.userBeds &&
          this.userServices.every((serv) => {
            // con la funzione every() controllo che ogni id dei servizi scelti dall'utente sia nell'array degli id dei servizi dell'appartamento
            return this.aptServices.includes(serv);
          })
        ) {
          // ritorno true se le 3 condizioni sono soddisfatte, quindi l'appartamento verrà inserito nella lista filtrata
          return true;
        }
      });
    },
  },

mounted() {
    const inputServices = JSON.stringify(this.userServices);
    // chiamo l'api impostata nel controller passandole l'input dell'utente e salvo la lista di appartamenti restituita
    const inputText = this.$route.params.userInput;
    axios
      .get(`/api/apartments/${inputText}/${this.userRange}/${this.userRooms}/${this.userBeds}/${inputServices}`)
      .then((response) => {
        this.apartments = response.data;
        console.log(this.apartments)
        // salvo gli appartamenti in una lista da filtrare successivamente
        this.filtered = response.data;
      })
      .catch((error) => {
        console.log(error);
      });


    // salvo tutti i servizi nel db tramite api
    axios
      .get("/api/services")
      .then((response) => {
        this.services = response.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>

<style scoped lang="scss">
section {
  width: 100%;
  height: 100%;
}

.navbar {
  max-width: 30%;
  height: 100%;
  // background-color: #febb02;
  background-color: white;
}

.search-box {
  border: 1px solid grey;
  border-radius: 5px;
  width: 100%;
  margin-top: 5%;
  margin-bottom: 5%;
  background-color: #febb02;
}

.services-box {
  border: 1px solid grey;
  border-radius: 5px;
  width: 100%;
  padding: 10%;
  background-color: #febb02;

  h5 {
    font-weight: bold;
  }

  input[type="checkbox"] {
    transform: scale(1.5);
  }

  .filter-button {
    margin-top: 7%;
    background-color: #003580;
    color: white;
    // border-color: #003580;
    border: none;

    width: 150px;
    height: 50px;

    &:hover {
      background-color: #0975b4e0;
    }
  }
}

.card-title {
  color: #003580;
  font-weight: bold;
  text-transform: uppercase;
}

.apartments-box {
  background-color: white;
  max-width: 70%;
  max-height: 90%;
  overflow-y: auto;
}

// .apartment-card {
//   width: 500px;
//   border: solid 1px rgb(0, 0, 0);

//   .img-fluid {
//     float: left;
//   }
// }
</style>
