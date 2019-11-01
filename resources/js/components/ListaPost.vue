

<template>
<div id="app">
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

    <v-btn class="mr-4" @click="submit">Postar</v-btn>
    <v-btn @click="clear">limpar</v-btn>
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
            <v-hover v-slot:default="{ hover }">
              <v-card
              color="pink darken-2"
                :elevation="hover ? 12 : 2"
                :class="{ 'on-hover': hover }"
              >
                <v-img
                  :src="item.img"
                  height="225px"
                >
                  <v-card-title  class="title white--text">
                    <v-row
                      class="fill-height flex-column"
                      justify="space-between"
                    >
                      <p dark class="mt-4 dark subheading text-left">{{ item.titulo }}</p>
  
                      <div>
                        <p class="ma-0 body-1 font-weight-bold font-italic text-left">
                          {{ item.text }}
                        </p>
                        <p class="caption font-weight-medium font-italic text-left">
                          {{ item.subtext }}
                        </p>
                      </div>
  
                      <div class="align-self-center">
                        <v-btn
                          v-for="(icon, index) in icons"
                          :key="index"
                          :class="{ 'show-btns': hover }"
                          color="transparent"
                          icon
                        >
                          <v-icon
                            :class="{ 'show-btns': hover }"
                            color="transparent"
                          >
                            {{ icon }}
                          </v-icon>
                        </v-btn>
                      </div>
                    </v-row>
                  </v-card-title>
                </v-img>
              </v-card>
            </v-hover>
          </v-col>
        </template>
      </v-row>
    </v-container>
     <div class="text-center">
      <v-btn class="mx-2" fab dark small color="primary">
        <v-icon dark>mdi-minus</v-icon>
      </v-btn>
  
      <v-btn class="mx-2" fab dark small color="pink">
        <v-icon dark>mdi-heart</v-icon>
      </v-btn>
  
      <v-btn class="mx-2" fab dark color="indigo">
        <v-icon dark>mdi-plus</v-icon>
      </v-btn> 
      
  
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
                api_url = api_url || '/posts/';
                fetch(api_url)
                    .then(response => response.json())
                    .then(response => {
                        this.posts = response.data;
                        console.log(this.posts);
                        
                    })
                    .catch(err => console.log(err));
            },
            submit(){
              fetch('/post/', {
              method: 'post',
              credentials: "same-origin",
              body: 'olá'
            }).then(function(response){
                  this.getPosts()
              })  .then(function(json){

                // change course

              })
                .catch(function(error){


                });
            }
        },

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
