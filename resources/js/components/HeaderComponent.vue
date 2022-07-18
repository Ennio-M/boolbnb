<template>
    <header>
    <!-- <nav class="container-fluid">
        <div class="row py-2 align-items-center justify-content-between text-center">
            <div class="col-12 py-1 col-md-3">
                <img class="logo" src="/storage/uploads/LogoBoolbnb.png" alt="boolbnblogo"/>
            </div>
            <div class="col-12 col-md-5 col-lg-4 py-1 input-box d-flex align-items-center justify-content-between py-2">
                <input type="text" class="search-input text-center" placeholder="Ricerca appartamenti" name="search" v-model="inputText" @keyup.enter="search">
                <div class="magnifying-box d-flex align-items-center justify-content-center" @click="search">
                    <i class="text-white fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
            <div class="col-12 col-md-3 py-1 d-flex align-items-center justify-content-center px-3">
                <a class="text-muted" href="/register">Diventa un Host</a>
                <a href="/admin" class="user-box  text-muted d-flex align-items-center border justify-content-center mx-3 p-3">
                    <i class="fa-solid fa-user"></i>
                </a>
            </div>
        </div>
    </nav> -->
</header>

</template>

<script>
export default { 
    name: "HeaderComponent",
    data(){
        return {

        }
    },
    mounted(){

    }
};
</script>

<style lang="scss">
    .logo{
    max-width: 180px;
    }
    .input-box{
        border: 1px solid grey;
        border-radius: 30px;
        .search-input{
        border-color:transparent;
        background-color: transparent;
        outline: none;
        width: 80%;
        border-right: 1px solid grey;
        }
        .magnifying-box{
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #E61C54;
        }
    }
    .user-box{
        width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: lightgrey;
    }

</style>
