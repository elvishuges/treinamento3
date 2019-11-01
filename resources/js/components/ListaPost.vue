<template>
<div id="app">
  <v-app id="inspire">
    <v-card
      class="mx-auto"
      max-width="400"
    >
      <v-toolbar
        color="purple"
        dark
      >
        <v-app-bar-nav-icon></v-app-bar-nav-icon>
  
        <v-toolbar-title>Settings</v-toolbar-title>
  
        <v-spacer></v-spacer>
  
        <v-btn icon>
          <v-icon>mdi-magnify</v-icon>
        </v-btn>
      </v-toolbar>
  
      <v-list
        subheader
        three-line
      >
        <v-subheader>User Controls</v-subheader>
  
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title>Content filtering</v-list-item-title>
            <v-list-item-subtitle>Set the content filtering level to restrict appts that can be downloaded</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
  
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title>Password</v-list-item-title>
            <v-list-item-subtitle>Require password for purchase or use password to restrict purchase</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </v-list>
  
      <v-divider></v-divider>
  
      <v-list
        flat
        subheader
        three-line
      >
        <v-subheader>General</v-subheader>
  
        <v-list-item-group
          v-model="settings"
          multiple
          active-class=""
        >
          <v-list-item>
            <template v-slot:default="{ active }">
              <v-list-item-action>
                <v-checkbox v-model="active"></v-checkbox>
              </v-list-item-action>
  
              <v-list-item-content>
                <v-list-item-title>Notifications</v-list-item-title>
                <v-list-item-subtitle>Notify me about updates to apps or games that I downloaded</v-list-item-subtitle>
              </v-list-item-content>
            </template>
          </v-list-item>
  
          <v-list-item>
            <template v-slot:default="{ active }">
              <v-list-item-action>
                <v-checkbox v-model="active"></v-checkbox>
              </v-list-item-action>
  
              <v-list-item-content>
                <v-list-item-title>Sound</v-list-item-title>
                <v-list-item-subtitle>Auto-update apps at any time. Data charges may apply</v-list-item-subtitle>
              </v-list-item-content>
            </template>
          </v-list-item>
  
          <v-list-item>
            <template v-slot:default="{ active }">
              <v-list-item-action>
                <v-checkbox v-model="active"></v-checkbox>
              </v-list-item-action>
  
              <v-list-item-content>
                <v-list-item-title>Auto-add widgets</v-list-item-title>
                <v-list-item-subtitle>Automatically add home screen widgets when downloads complete</v-list-item-subtitle>
              </v-list-item-content>
            </template>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-card>
  </v-app>
</div>
</template>
 
<script>
  export default {
      
    data: () => ({
    selected: [2],
     settings: [],
    items: [
      {
        action: '15 min',
        headline: 'Brunch this weekend?',
        title: 'Ali Connors',
        subtitle: "I'll be in your neighborhood doing errands this weekend. Do you want to hang out?",
      },
      {
        action: '2 hr',
        headline: 'Summer BBQ',
        title: 'me, Scrott, Jennifer',
        subtitle: "Wish I could come, but I'm out of town this weekend.",
      },
      {
        action: '6 hr',
        headline: 'Oui oui',
        title: 'Sandra Adams',
        subtitle: 'Do you have Paris recommendations? Have you ever been?',
      },
      {
        action: '12 hr',
        headline: 'Birthday gift',
        title: 'Trevor Hansen',
        subtitle: 'Have any ideas about what we should get Heidi for her birthday?',
      },
      {
        action: '18hr',
        headline: 'Recipe to try',
        title: 'Britta Holt',
        subtitle: 'We should eat this: Grate, Squash, Corn, and tomatillo Tacos.',
      },
    ],
  }),

  }
</script>