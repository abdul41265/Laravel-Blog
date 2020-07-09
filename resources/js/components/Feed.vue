<template>
  <div>
    <!-- <post></post>
    <post></post>
    <post></post> -->
    <!-- <post
      post-title="This title is comming from props"
      post-content="This content is also comming from props"
    ></post> -->
    <div v-if="loading">Your Data is loading...</div>
    <div v-else>
        <div class="row">
            <post class="col-md-12 d-flex align-items-stretch mb-2"
            v-bind="post"
            v-for="(post, index) in posts"
            :key="index"
            ></post>

            <!-- <post class="col-md-12 d-flex align-items-stretch mb-2"
             :title="post.title"
            :content="post.content"
            :id="post.id"
            v-for="(post, index) in posts"
            :key="index"
            ></post> -->
        </div>

        
      <!-- <post
      v-if="post2" 
      :post-title="post2.postTitle"
      :post-content="post2.postContent"
    ></post> -->

    </div>
    
    
  </div>
</template>

<script>
import Post from "./Post";

export default {
  components: {
    Post
  },

    data (){
        return{

        //     post1:{
        //         postTitle: "this is coming from data element in the feed",
        //         postContent: "this is also comming from the data element in the feed component"
        //     },

        //     post2:{
        //         postTitle: "this is 2nd post coming from data element in the feed",
        //         postContent: "this is also comming from the data element in the feed component"
        //     }
        // }
        // post1: null,
        posts: null,
        loading: false
        }
    },

    created(){

        this.loading=true;

        const request = axios.get("/api/posts")
        .then(response=>{
            this.posts=response.data.data;
            this.loading=false;
        });

    //     setTimeout(() => {
    // //   this.post1.postTitle = "This is changed after 5 seconds";
    // //   this.post2.postTitle = "This is also changed after 5 seconds";
        

    //     this.posts=[
    //         {
    //             postTitle: "this is from an array inside the post 1",
    //             postContent: "this is from the post1 array inside the post 1"
    //         },
    //         {
    //             postTitle: "this is from an array inside the post 2",
    //             postContent: "this is from the post1 array inside the post 2"
    //         }
    //     ];

    // //   this.post1={
    // //       postTitle: "this is from an array inside the post 1",
    // //       postContent: "this is from the post1 array inside the post 1"
    // //   };
    // //   this.post2={
    // //       postTitle: "this is from an array inside the post 2",
    // //       postContent: "this is from the post1 array inside the post 2"

    // //   };
    //   this.loading = false;
    // }, 5000);
    }

//   beforeCreate() {
//     console.log("before create");
//   },
//   created() {
//     console.log("created");
//   },
//   beforeMount() {
//     console.log("before mount");
//   },
//   mounted() {
//     console.log("mounted");
//   },
//   beforeDestroy() {
//     console.log("before destroy");
//   },
//   destroyed() {
//     console.log("destroyed");
//   }
};
</script>