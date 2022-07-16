<template>
    <main class="container">
        <router-view></router-view>
    </main>
</template>

<script>
export default {
    name: "MainComponent",
    data() {
        return {}
    },
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
    height: 600px;
}
</style>
