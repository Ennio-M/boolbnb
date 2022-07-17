<template>
    <header class="container">
        <!--  -->
        <div class="upper-header d-flex justify-content-around align-items-center">
            <div id="logo d-flex">
                <img src="/storage/uploads/LogoBoolbnb.png" alt="boolbnblogo" />
            </div>

            <nav class="d-flex text-center justify-content-center align-items-center">
                <a class="text-muted" href="/register"><h5>Diventa un Host</h5></a>

                <a class="text-muted" href="/admin"><i class="fa-solid fa-circle-user"></i></a>
            </nav>
        </div>

        <!--  -->


        <!--  -->
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
    header {
        background-color: #ffffff;
        height: 200px;
        max-width: 90%;

        .fw-bold {
            font-weight: bold;
            text-decoration: none;
            font-size: 16px;
        }

        .upper-header {
            height: 50%;
            border-color: brown;
            background-color: white;
        }

        .fa-circle-user {
            font-size: 35px;
            color: gray;
            margin-left: 10px;

            &:hover {
                color: rgb(63, 62, 62);
            }
        }

        nav {
            height: 40px;
        }

        .lens {
            background-color: #ff385c;
            border: none;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            color: white;
            display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;
            margin-left: 5px;
        }

        #logo,
        img {
            height: 50px;
        }

        .lower-header {
            height: 50%;
            background-color: grey;
        }

        .search-container {
            width: 25%;
            height: 50px;
            border: 1px solid gray;
            border-radius: 30px;
        }

        .searchbar {
            border: none;
        }
    }
</style>
