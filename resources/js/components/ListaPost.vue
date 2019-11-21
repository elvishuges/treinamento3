

<template>
<div id="app">
    {{posts}}
   <v-app id="inspire">
 
     <v-container v-if="apareceForm"> 
       
        <form>
        
    <v-text-field
      v-model="titulo"      
      :counter="10"
      label="Titulo"
      required
      
    ></v-text-field>
    <v-text-field
      v-model="conteudo"      
      label="Conteudo"
      required      
    ></v-text-field>    
    <v-checkbox
      v-model="checkbox"      
      label="Do you agree?"
      required      
    ></v-checkbox>

    <v-btn class="mr-4" @click="formSubmit">Postar</v-btn>
    <v-btn @click="">limpar</v-btn>
  </form>
     </v-container> 

     

    <v-container v-if="!apareceForm" class="pa-4 text-center">
      <v-row class="fill-height" align="center" justify="center">
        
        <template v-for="(item, i) in posts">
          <v-col
            :key="i"
            cols="12"
            md="3"
          >
          <v-card
              color="#385F73"
              dark
            >
              <v-card-title class="headline" color="red darken-2">{{item.titulo}}</v-card-title>
                <ol>
                    <li  v-for="(item, i) in item.comentarios" :key="i">
                      {{item.titulo}}
                    </li>
              </ol>
              <v-card-actions>
                <v-btn text>Seguir</v-btn>
              </v-card-actions>
            </v-card>
            
          </v-col>
        </template>
      </v-row>
    </v-container>
     <div class="text-center">
      
  
      <v-btn  @click="apareceForm = !apareceForm" class="mx-2" fab dark large color="cyan">
        <v-icon dark>mdi-pencil</v-icon>
      </v-btn>  
      
    </div>
  </v-app>
</div>
</template>
 
<script>
  export default {      
      
    data: () => ({
    icons: ['mdi-rewind', 'mdi-play', 'mdi-fast-forward'],
    posts:[],
    checkbox:false,
    titulo:'',
    conteudo:'',
    apareceForm:false,
    transparent: 'rgba(255, 255, 255, 0)',
  }),

  created() {
            this.getPosts();
        },
 
        methods: {
            getPosts(api_url) {
                api_url = api_url || '/posts';
                fetch(api_url)
                    .then(response => response.json())
                    .then(response => {
                        this.posts = response.data;
                        console.log(this.posts);
                        
                    })
                    .catch(err => console.log(err));
            },

                formSubmit(e) {
                e.preventDefault();
                let currentObj = this;
                var api_url = '/posts';
                axios.post(api_url, {
                    user_id:1,
                    titulo: this.titulo,
                    conteudo: this.conteudo
                })
                .then(function (response) {
                    console.log( response.data);
                    this.getPosts();
                    this.apareceForm =  false
                }.bind(this))
                .catch(function (error) {
                    console.log( error);
                    
                });
            }
        },

            submit(){
              fetch('posts', {
              method: 'POST',
              body: JSON.stringify({
                  email : 'emailHere',
                  password : 'passwordHere'
              })             
            }).then(function(response){
              console.log('resposta',response);
              
                  this.getPosts()

              })  .then(function(json){

                // change course

              })
                .catch(function(error){


                });
            }
        

  }
</script>


<style lang="stylus">
.v-card {
transition: opacity .4s ease-in-out;
}

.v-card:not(.on-hover) {
opacity: 0.6;
 }

.show-btns {
color: rgba(255, 255, 255, 1) !important;
}
</style>
