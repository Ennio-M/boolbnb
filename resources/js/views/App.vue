<template>
    <div id="app">
        <Header />
        <AppMain />
        <Footer />
    </div>
</template>

<script>
import AppMain from "../components/AppMain.vue";
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
export default {
    name: "App",
    components: {
        Header,
        AppMain,
        Footer,
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
