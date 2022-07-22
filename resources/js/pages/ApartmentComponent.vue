<template>
    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 font-weigth-bold text-center">
                <h1>{{ apartment.title }}</h1>
            </div>
            <div class="col-12">
                <div
                    class="slider-wrapper rounded"
                    tabindex="0"
                    @keydown.left="slidePrev"
                    @keydown.right="slideNext"
                >
                    <div class="item position-relative">
                        <div @click="slidePrev" class="prev">prev</div>
                        <div @click="slideNext" class="next">next</div>
                        <img
                            class="img-fluid rounded"
                            :src="`/storage/${apartment.images[indexActive].image}`"
                            :alt="apartment.title"
                        />
                    </div>

                    <div class="thumbs d-flex rounded my-3">
                        <div
                            @click="select(index)"
                            class="thumb"
                            :class="{ active: index === indexActive }"
                            v-for="(images, index) in apartment.images"
                            :key="index"
                        >
                            <img
                                class="rounded-bottom"
                                :src="`/storage/${images.image}`"
                                :alt="apartment.title"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 py-2">
                <h5>Intero Alloggio - Host : {{ apartment.user_id }}</h5>
                <span
                    >{{ apartment.beds * 2 }} Ospiti -
                    {{ apartment.rooms }} camere da letto -
                    {{ apartment.beds }} letti -
                    {{ apartment.bathrooms }} bagni</span
                >
                <p v-html="apartment.description"></p>
            </div>
            <div class="col-12">
                <h3>Cosa Troverai</h3>
                <div
                    v-for="(service, index) in apartment.services"
                    :key="index"
                >
                    <p>{{ service.name }}</p>
                </div>
            </div>
        </div>
        <div class="chat-image">
            <i
                class="first fa-solid fa-comments left"
                @click="display = true"
            ></i>
            <div class="chat p-3 shadow-sm" v-if="display == true">
                <span class="chat-title">Invia un Messaggio all'host</span>
                <span class="chat-closer" @click="display = false">X</span>
                <form @submit.prevent="addMessage()">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            aria-describedby="name"
                            placeholder="Inserisci Name"
                            v-model="formData.name"
                            required
                            autocomplete="off"
                        />
                    </div>
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input
                            type="text"
                            class="form-control"
                            id="email"
                            aria-describedby="email"
                            placeholder="Inserisci email"
                            v-model="formData.email"
                            required
                            autocomplete="off"
                        />
                    </div>
                    <div class="form-group">
                        <label for="content">Messaggio</label>
                        <textarea
                            class="form-control"
                            id="content"
                            aria-describedby="content"
                            cols="30"
                            rows="7"
                            laceholder="Inserisci messaggio"
                            v-model="formData.content"
                            required
                            autocomplete="off"
                        ></textarea>
                    </div>
                    <button type="submit">Invia Messaggio</button>
                </form>
            </div>
        </div>
        <map-component :apartment="apartment" />
    </section>
</template>

<script>
import MapComponent from "../components/MapComponent.vue";

export default {
    name: "ApartmentComponent",
    components: {
        MapComponent,
    },
    data() {
        return {
            apartment: null,
            indexActive: 0,
            intervallo: null,
            display: false,
            formData: {
                name: "",
                email: "",
                content: "",
                apartment_id: "",
            },
        };
    },
    methods: {
        slidePrev() {
            if (this.indexActive === 0) {
                this.indexActive = this.apartment.images.length - 1;
            } else {
                this.indexActive -= 1;
            }
        },
        slideNext() {
            if (this.indexActive === this.apartment.images.length - 1) {
                this.indexActive = 0;
            } else {
                this.indexActive += 1;
            }
        },
        addMessage() {
            axios
                .post("/api/messages", this.formData)
                .then((response) => {
                    console.log(this.apartment);
                    console.log(this.apartment.messages);
                    this.apartment.messages.push(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });

            this.display = false;
        },
    },
    mounted() {
        const slug = this.$route.params.slug;
        axios.get(`/api/apartments/${slug}`).then((res) => {
            this.apartment = res.data;
            this.formData.apartment_id = this.apartment.id;
        });
    },
};
</script>

<style scoped lang="scss">
.slider-wrapper {
    outline: 0;
    .item {
        position: relative;
        overflow: hidden;
        img {
            height: 100%;
        }
        .prev,
        .next {
            text-align: center;
            width: 100px;
            height: 100px;
            margin: 10px 0;
            border-radius: 50%;
            background: white;
            position: absolute;
            cursor: pointer;
            z-index: 990;
            line-height: 25px;
            text-transform: uppercase;
            padding: 10px;
            font-size: 1em;
            letter-spacing: 1.5px;
            color: #e61c54;
            top: 50%;
        }
        .next {
            transform: rotate(270deg);
            right: -60px;
        }
        .prev {
            left: -60px;
            transform: rotate(90deg);
        }
    }
    .thumbs {
        width: 100%;
        background: #000;
        .thumb {
            width: calc(100% / 5);
            opacity: 0.5;
            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }
        .thumb.active {
            border: 2px solid #ccc;
            opacity: 1;
        }
    }
    .description_container {
        border-bottom: 3px solid grey;
    }
}
.chat-image {
    border-radius: 50%;
    background-color: #e61c54;
    width: 100px;
    height: 100px;
    position: fixed;
    right: 2%;
    bottom: 5%;
    z-index: 991;
    cursor: pointer;
    .first {
        color: white;
        font-size: 50px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 992;
    }
    .chat {
        width: 400px;
        height: 500px;
        position: fixed;
        bottom: 5%;
        right: 2%;
        z-index: 996;
        background-color: white;
        font-size: 14px;
        border-radius: 10px;
        .chat-closer {
            font-size: 2em;
            color: #e61c54;
            font-weight: bolder;
            position: absolute;
            top: 0px;
            right: 10px;
        }
        .chat-title {
            font-size: 1.5em;
            color: #e61c54;
        }
        button {
            padding: 8px 28px;
            background-color: #e61c54;
            color: white;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            &:hover {
                background: #bc1746;
            }
        }
    }
}
</style>
