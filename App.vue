<template>
    <div id="app">
      <MyComponent />
    </div>
  </template>
  
  <script>
  import MyComponent from './components/MyComponent.vue';
  
  export default {
    name: 'App',
    components: {
      MyComponent,
    },
  };
  </script>
  
  <style>
  /* global styles */
  </style>