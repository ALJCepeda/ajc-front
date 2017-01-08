<template>
  <h1> Hello World! </h1>
</template>

<script>
  module.exports = {
    data: () => {
      console.log('LOADED!!');
      return false;
    }
  };
</script>

<style scoped>
  h1 {
    color:red;
  }
</style>
