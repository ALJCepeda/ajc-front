<template>
  <main class='outer'>
    <div class='card blue-grey darken-1'>
      <div class='card-content white-text'>
        <span class='card-title'>{{data.title}}</span>
        <p>{{data.description}}</p>
      </div>
      <div class='card-action'>
        <a href='#'>This is a link</a>
        <a :href='data.goto' style='float:right'>Try it out!</a>
      </div>
    </div>
  </main>
</template>

<script>
  export default {
    name: 'projectCard',
    props: [ 'data' ]
  };
</script>

<style lang='less'>
  .outer {
    width:50vw;
    height:50vh;
  }
</style>
