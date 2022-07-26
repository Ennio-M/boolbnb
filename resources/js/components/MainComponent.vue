<template>
  <main>
    <router-view></router-view>
  </main>
</template>

<script>
export default {
  name: "MainComponent",
  data() {
    return {};
  },
};
</script>

<style  lang="scss">
main {
  margin-top: 70px;
  margin-bottom: 100px;
  background-image: url('/storage/uploads/pink-suitcase-with-hat-globe-it.jpg');
  background-size: cover;
  background-position: 10% 70%;
  height: 100%;
  position: relative;
}
</style>
