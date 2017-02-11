<template>
  <div class='stories'>
    <h2>Stories</h2>

  </div>
</template>

<script>
  export default {
    name: 'stories',
    props: ['image']
  };
</script>

<style lang='less' scoped>
  .stories {
    background:blue;
    color:black;
    width:60%;
    height:1000px;
  }
</style>
