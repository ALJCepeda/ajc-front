<template>
  <main class='stories'>
    <story-entry :name='name' :image='image'></story-entry>

  </main>
</template>

<script>
  import storyEntry from './../components/story-entry.vue';

  export default {
    name: 'stories',
    components: { storyEntry },
    props: ['name', 'image']
  };
</script>

<style lang='less' scoped>
  .stories {
    color:black;
    width:60%;
  }
</style>
