<template>
    <main class="container">
        <router-view></router-view>
    </main>
</template>

<script>
export default {
    name: "MainComponent",
};
</script>

<style lang="scss">
// @import "/resources/sass/_variables.scss";

#app {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    position: relative;
}

main {
    background-color: rgb(16, 6, 44);
    height: 500px;
    max-width: 90%;
    color: white;
}
</style>
