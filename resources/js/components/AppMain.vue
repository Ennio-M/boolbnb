<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">I'm an example component.</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AppMain",
    data() {},
};
</script>

<style lang="scss">
@import "./resources/sass/_variables.scss";
@import "./resources/sass/admin.scss";
@import "./resources/sass/front.scss";

#app {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    position: relative;
}
</style>
