<template>

    <div class="preloader d-flex row justify-content-center align-items-center">

        <container class="col-6 loader-container d-flex justify-content-center align-items-center">
            <h1 class="m-3">Pagina in fase di caricamento...</h1>


            <div class="loader"></div>
        </container>




    </div>
</template>

<script>
export default {

    name: 'LoaderComponent',

};


</script>

<style scoped lang="scss">
.preloader {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: rgb(114, 116, 116);
    z-index: 3;

    h1 {

        color: white;
    }

}

.loader-container {

    width: 50%;
    height: 50%;
}



.loader {
    border: 16px solid #f3f3f3;

    border-top: 16px solid #e61954;
    border-bottom: 16px solid #e61954;
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;


}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>