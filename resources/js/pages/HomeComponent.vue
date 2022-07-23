<template>
    <section class="home">
        <!-- <main v-if="apartments"></main>
        <section v-else>
            <div
                class="container welcome-page d-flex justify-content-center py-4"
            >
                <h1>
                    Benvenuto su Boolbnb! Inizia la tua ricerca tra migliaia di
                    appartamenti!
                </h1>
            </div>
        </section> -->

        <!-- <ul v-for="(apartment, index) in apartments" :key="index">
            <li>
                <router-link
                    :to="{
                        name: 'apartment',
                        params: { slug: apartment.slug },
                    }"
                    >{{ apartment.title }}</router-link
                >
            </li>
        </ul> -->
    </section>
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

<style scoped lang="scss"></style>
