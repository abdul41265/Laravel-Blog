<template>
    <div>
        <div class="card w-100">
         <div class="card-body">
        <router-link :to="{name: 'singlepost', params:{id}}"><h5 class="card-title">{{ title }}</h5></router-link>
        
         <p class="card-text">{{ content }}</p>
         <p class="card-text">{{ id }}</p>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    props: { title: String, content: String, id: Number },
    // data (){
    //     return{
    //         title: "This is the tile of the post",
    //         content: "This is the content part of the post"
    //     }
    // }
    
}
</script>