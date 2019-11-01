<template>
<div id="app">
  <v-app id="inspire">
    <div>
      <v-alert type="success">
        I'm a success alert.
      </v-alert>
  
      <v-alert type="info">
        I'm an info alert.
      </v-alert>
  
      <v-alert type="warning">
        I'm a warning alert.
      </v-alert>
  
      <v-alert type="error">
        I'm an error alert.
      </v-alert>
    </div>
  </v-app>
</div>
</template>
 
<script>
  export default {
    data: () => ({
      type: 'month',
      start: '2019-01-01',
      end: '2019-01-06',
      typeOptions: [
        { text: 'Day', value: 'day' },
        { text: '4 Day', value: '4day' },
        { text: 'Week', value: 'week' },
        { text: 'Month', value: 'month' },
        { text: 'Custom Daily', value: 'custom-daily' },
        { text: 'Custom Weekly', value: 'custom-weekly' }
      ]
    })
  }
</script>