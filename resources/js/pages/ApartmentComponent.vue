<template>
    <section>
        <div class="p-2">
            <h1>{{ apartment.title }}</h1>
            <p v-html="apartment.description"></p>
            <map-component :apartment="apartment" />
        </div>
    </section>
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
        };
    },
    mounted() {
        const slug = this.$route.params.slug;
        axios.get(`/api/apartments/${slug}`).then((res) => {
            this.apartment = res.data;
        });
    },
};
</script>

<style lang="scss"></style>
