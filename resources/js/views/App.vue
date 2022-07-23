<template>
    <div>
        <HeaderComponent />
        <MainComponent/>
        <FooterComponent/>
    </div>
</template>

<script>
import MainComponent from "../components/MainComponent.vue";
import HeaderComponent from "../components/HeaderComponent.vue";
import FooterComponent from "../components/FooterComponent.vue";
export default {
    name: "App",
    components: {
        MainComponent,
        FooterComponent,
        HeaderComponent,
    },
};
</script>

<style lang="scss">
#app {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Roboto", sans-serif;
}
// @import "@/_variables.scss";
</style>
