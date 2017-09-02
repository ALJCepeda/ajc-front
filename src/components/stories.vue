<template>
  <main class='stories'>
    <story-entry></story-entry>

  </main>
</template>

<script>
  import storyEntry from './../components/story-entry.vue';

  export default {
    name: 'stories',
    components: { storyEntry }
  };
</script>

<style lang='less' scoped>
  .stories {
    color:black;
    width:60%;
  }
</style>
