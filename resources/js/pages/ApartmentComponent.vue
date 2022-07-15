<template>
<section>
   <div class="p-2">
    <h1>{{apartment.title}}</h1>
        <p v-html="apartment.description"></p>
    </div>
    
</section>
</template>

<script>
export default {
    name:'ApartmentComponent',
    data(){
        return{
            apartment:null,
        }
    },
    mounted(){
        const slug = this.$route.params.slug;
        axios.get(`/api/apartments/${slug}`).then((res)=>{
            this.apartment = res.data;
        })
    }
}
</script>

<style lang="scss">

</style>