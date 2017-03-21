<template>
  <main class='overview'>
    <section class='content'>
      <div class='row'>
        <div class='logo'>

        </div>
        <div class='description'>

        </div>
      </div>
    </section>

    <section class='info'>

    </section>
  </main>
</template>

<script>
  export default {
    name: 'overview'
  };
</script>

<style lang='less' scoped>
  @import './../../less/flex.less';

  .overview {
    .row-nw;

    .content {
      width:62%;
      height:200px;
      padding:20px;
      background: blue;

      .row {
        .row-nw;
        width:100%;
        height:90px;
        background:yellow;

        .logo {
          width:20%;
          background:brown;
        }

        .description {
          width:80%;
          background:silver;
        }
      }
    }

    .info {
      width:38%;
      height:200px;
      background: green;
    }
  }
</style>
