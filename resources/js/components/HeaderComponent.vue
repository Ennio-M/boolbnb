<template>
    <header class="container">
        <!--  -->
        <div
            class="upper-header d-flex justify-content-around align-items-center"
        >
            <div id="logo d-flex">
                <img src="/storage/uploads/LogoBoolbnb.png" alt="boolbnblogo" />
            </div>

            <div
                class="search-container d-flex justify-content-center align-items-center"
            >
                <div class="row justify-content-center align-items-center">
                    <form action="/action_page.php">
                        <input
                            class="searchbar"
                            type="text"
                            placeholder="Ricerca Appartamenti"
                            name="search"
                        />
                    </form>
                    <button class="lens" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

            <nav class="d-flex justify-content-around align-items-center">
                <h5>Diventa un Host</h5>

                <div
                    class="nav-menu d-flex justify-content-around align-items-center"
                >
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
    max-width: 90%;

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

    .nav-menu {
        width: 50px;
        height: 50px;
        border: 1px solid gray;
        border-radius: 50%;
    }
}
</style>
