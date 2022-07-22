<template>
    <div>
        <HeaderComponent class="header-component-container" />
        <MainComponent class="main-component-container" />
        <FooterComponent class="footer-component-container" />
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

.header-component-container {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 3;
    background-color: white;
}

.footer-component-container {
    position: fixed;
    bottom: 0;
    left: 0;
    z-index: 3;
    background-color: white;
}

.main-component-container {
    margin-top: 70px;
    margin-bottom: 30px;
    position: relative;
}

// @import "@/_variables.scss";
</style>
