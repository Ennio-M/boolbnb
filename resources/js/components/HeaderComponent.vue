<template>
    <header>
        <!--  -->
        <div
            class="upper-header d-flex justify-content-around align-items-center"
        >
            <div id="logo d-flex">
                <img src="/storage/uploads/LogoBoolbnb.png" alt="boolbnblogo" />
            </div>

            <div
                class="searchbar d-flex justify-content-center align-items-center"
            >
                <div class="row justify-content-center align-items-center">
                    <div class="col">
                        <span class="fw-bold">Ovunque</span>
                    </div>
                    <div class="col">
                        <span class="fw-bold">Qualunque settimana</span>
                    </div>
                    <div
                        class="col d-flex justify-content-center align-items-center"
                    >
                        Aggiungi Ospiti
                        <div class="lens">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="d-flex justify-content-around align-items-center">
                <h5>Diventa un Host</h5>
                <i class="fa-solid fa-globe"></i>

                <div
                    class="nav-menu d-flex justify-content-around align-items-center"
                >
                    <i class="fa-solid fa-bars"></i>
                    <i class="fa-solid fa-user"></i>
                </div>
            </nav>
        </div>

        <!--  -->

        <div class="lower-header">
            <div class="navbar"></div>
        </div>

        <!--  -->
    </header>
</template>

<script>
export default { name: "HeaderComponent" };
</script>

<style scoped lang="scss">
header {
    background-color: #ffffff;
    height: 200px;

    .fw-bold {
        font-weight: bold;
    }

    .upper-header {
        height: 50%;
        border-color: brown;
        background-color: white;
    }

    .lens {
        background-color: #ff385c;
        height: 30px;
        width: 30px;
        border-radius: 50%;
        color: white;
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
    }

    #logo,
    img {
        height: 50px;
    }

    .lower-header {
        height: 50%;
        background-color: #ff385c;
    }

    .searchbar {
        width: 25%;
        height: 50px;
        border: 1px solid gray;
        border-radius: 30px;
    }

    .nav-menu {
        width: 20%;
        height: 50px;
        border: 1px solid gray;
        border-radius: 30px;
    }
    nav {
        width: 20%;
        height: 100%;
    }
}
</style>
