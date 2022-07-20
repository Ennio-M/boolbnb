<template>
  <div>
    <h1>Vue 3 TomTom Maps Demo</h1>
    <div id="map"></div>
  </div>
</template>

<script>
import { onMounted, ref } from "vue";

export default {
  name: "Map",

  mounted() {
    const apartmentcoordinates = [
      this.apartment.longitude,
      this.apartment.latitude,
    ];
    const map = tt.map({
      container: "map",
      key: "YeAUs1VSBC9gVGieDMDGZZVGtnxy9myl",
      center: apartmentcoordinates,
      zoom: 15,
    });
    const apartmentmarker = new tt.marker()
      .setlnglat(apartmentcoordinates)
      .addto(map);

    function addMarker(map) {
      const tt = window.tt;
      var location = [-121.91595, 37.36729];
      var popupOffset = 25;

      var marker = new tt.Marker().setLngLat(location).addTo(map);
      var popup = new tt.Popup({ offset: popupOffset }).setHTML(
        "Your address!"
      );
      marker.setPopup(popup).togglePopup();
    }
  },

  props: {
    apartment: Object,
  },
};
</script>

<style>
#map {
  height: 50vh;
  width: 50vw;
}
</style>
