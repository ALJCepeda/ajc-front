<template>
  <main class='blog-card'>
    <img class='logo' :src='data.image'>
    <div class='info'>
      <div class='title'>{{data.title}}</div>

      <div class='description'>{{data.description}}</div>
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
  @import './../../less/variables.less';
  @import './../../less/flex.less';
  @import './../../less/index.less';

  .blog-card {
    .border;
    .row-nw;.ai-center;
    padding-right:10px;
    width:425px;
    cursor:pointer;

    &:hover {
      background-color:@color-grey3;
    }

    .logo {
      width:100px;
      height:100px;
    }

    .info {
      margin-left:10px;
      width:340px;

      .title {
        font-size:14px;
        font-weight:bold;
        color:@color-blue;
      }

      .description {
        max-height:50px;
        font-size:12px;
        color:@color-grey4;
        overflow:hidden;
      }
    }
  }
</style>
