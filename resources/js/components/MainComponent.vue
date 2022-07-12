<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Title</div>

                    <div class="card-body">Card</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MainComponent",
    data() {},
};
</script>

<style lang="scss">
// @import "../sass/_variables.scss";
// @import "@/js/sass/admin.scss";
// @import "../sass/admin.scss";
// @import "/sass/front.scss";

#app {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    position: relative;
}

.container {
    background-color: red;
    width: 100%;
    height: 300px;
}
</style>
