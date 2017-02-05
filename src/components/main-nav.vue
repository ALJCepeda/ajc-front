<template>
  <div class='container'>
    <div class='cover-photo'></div>
    <nav></nav>
    <div class='main-photo'></div>
  </div>
</template>

<script>
  export default {
    name: 'mainNav'
  };
</script>

<style scoped>
  .container {
    width:100%;
    height:70%;
    background-color:blue;
  }

  .cover-photo {
    height:85%;
    background-color:cyan;
  }

  .main-photo {
    position:relative;
    top:-190px;
    left:20px;

    height:47%;
    width:17%;
    min-height:150px;
    min-width:150px;
    
    background-color:yellow;
  }

  nav {
    background-color:green;
  }
</style>
