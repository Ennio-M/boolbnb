<template>

    <body>
        <div id="loader" class="center">
            <h1>Attendere prego</h1>
        </div>
    </body>

</template>

<script>
export default {

    name: 'LoaderComponent',

    mounted() {
        document.onreadystatechange = function () {
            if (document.readyState !== "complete") {
                document.querySelector(
                    "body").style.visibility = "hidden";
                document.querySelector(
                    "#loader").style.visibility = "visible";
            } else {
                document.querySelector(
                    "#loader").style.display = "none";
                document.querySelector(
                    "body").style.visibility = "visible";
            }
        };


    }



};


</script>

<style lang="scss">
#loader {
    width: 100%;
    height: 100vh;
    border: 12px solid #f3f3f3;
    border-top: 12px solid #444444;
    background-color: #444444;
}



.center {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}
</style>