<template>
  <div class='about'>
    <header>
      <i class="material-icons">&#xE7FD;</i> About
    </header>
  </div>
</template>

<script>
  export default {
    name: 'about',
    components: { },
    props: [ ]
  };
</script>

<style lang='less' scoped>
  @import './../less/variables.less';
  @import './../less/flex.less';

  .about {
    background:blue;

    header {
      .row-nw;.c-center;

      height:60px;
      width:100%;
      background:#f6f7f9;
      color:@color-black1;
      vertical-align: middle;

      font-size:20px;
      font-weight:bold;

      i {
        margin-left:10px;
        margin-right:10px;
        color:@color-grey2;
        font-size:35px;
      }
    }
  }
</style>
