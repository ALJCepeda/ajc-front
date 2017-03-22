<template>
  <main class='overview'>
    <section class='content'>
      <div class='row'>
        <div class='logo'>

        </div>
        <div class='description'>
          <label>Front End Developer at NIKAO Corporation</label>
          <br>
          <span class='caption'>Past: <a href='#'>6-Bit Consulting</a> and <a href='#'>Self-Employed</a></span>
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
  @import './../../less/index.less';

  .overview {
    .row-nw;

    .content {
      width:62%;
      height:200px;
      padding:20px;

      .row {
        .row-nw;
        width:100%;
        height:90px;

        .logo {
          width:20%;
        }

        .description {
          width:80%;

          label {
            color:@color-black1;
          }
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
