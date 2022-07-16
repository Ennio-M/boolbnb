<template>
<section>
   <!-- <ul v-for="(apartment,index) in apartments" :key="index">
        <li>
            <router-link :to="{ name:'apartment', params:{slug: apartment.slug} }">{{apartment.title}}</router-link>
        </li>
    </ul> -->
</section>
</template>

<script>
export default {
    name:'HomeComponent',
    data(){
        return{
            // apartments:[]
        }
    },
    created(){
        // axios.get('/api/apartments').then((res) =>{
        //     this.apartments = res.data;
        // })
    }
}
</script>

<style lang="scss">

</style>