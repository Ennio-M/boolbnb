<template>
    <footer class="container-fluid d-flex justify-content-between">
        <div class="footer-left text-center">
            <ul>
                <li>© 2022 Boolbnb</li>
                <li>·</li>
                <li>Privacy</li>
                <li>·</li>
                <li>Termini</li>
                <li>·</li>
                <li>Destinazioni</li>
            </ul>
        </div>
        <div class="footer-right text-center">
            <ul>
                <li><i class="fa-solid fa-globe"></i> Italiano (IT)</li>
                <li>·</li>
                <li>Supporto e risorse</li>
            </ul>
        </div>
    </footer>
</template>

<script>
export default { name: "FooterComponent" };
</script>

<style scoped lang="scss">
// @import "@/assets/footer.scss";
// @import "/sass/_variables.scss";
footer {
    background-color: white;
    border-top: 1px solid rgba(128, 128, 128, 0.5);

    .footer-left {
        width: 50%;
        height: 100%;

        ul {
            list-style: none;

            li {
                display: inline-block;
                margin-left: 3px;
                margin-right: 3px;
            }
        }
    }

    .footer-right {
        width: 50%;
        height: 100%;
    }

    ul {
        list-style: none;

        li {
            display: inline-block;
            margin-left: 3px;
            margin-right: 3px;
        }
    }
}
</style>
