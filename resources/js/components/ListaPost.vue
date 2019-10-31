<template>
    <div>
        <div class="card mb-2" v-for="post in posts" v-bind:key="post.id">
            <div class="card-body ">
                <h4 class="card-title">{{ post.titulo }}</h4>
                <p class="card-text">{{ post.conteudo }}</p>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                posts: []
            };
        },
 
        created() {
            this.getPosts();
        },
 
        methods: {
            getPosts(api_url) {
                api_url = api_url || '/posts';
                fetch(api_url)
                    .then(response => response.json())
                    .then(response => {
                        console.log('safado');
                        
                        this.posts = response.data;
                        console.log(this.posts);
                        
                    })
                    .catch(err => console.log(err));
            }
        }
    };
</script>