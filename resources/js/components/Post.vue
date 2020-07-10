<template>
    <div>
        <div class="card w-100">
         <div class="card-body">
        <router-link :to="{name: 'singlepost', params:{id}}"><h5 class="card-title">{{ title }}</h5></router-link>
        
         <p class="card-text">{{ content }}</p>
         <div class="d-flex justify-content-between mr-5">
         <p class="card-text">Posted by:  {{ name }}</p>
         <p class="card-text">Likes  {{ likes }}</p>
         </div>
        </div>
        </div>
    </div>
</template>

<script>
import { mapState} from "vuex";
export default {
    props: { title: String, content: String, name: String , id: Number, likes: Number},

    computed:{
    ...mapState({
      isLoggedIn: "isLoggedIn"
    }),
    }
    


    // data (){
    //     return{
    //         title: "This is the tile of the post",
    //         content: "This is the content part of the post"
    //     }
    // }
    
}
</script>