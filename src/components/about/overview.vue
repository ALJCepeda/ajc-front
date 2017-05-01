<template>
  <main class='overview row-nw'>
    <section class='content'>
      <div class='row row-nw'>
        <div class='logo row-nw ai-center jc-end'>
          <img :src='api.i("jobs", 0).logo'></img>
        </div>
        <div class='description col-w ac-start jc-center'>
          <header>{{api.i("jobs", 0).title}} at <a :href='api.i("jobs", 0).href'>{{api.i("jobs", 0).company}}</a></header>
          <label class='caption'>Past: <a :href='api.i("jobs", 1).href'>{{api.i("jobs", 1).company}}</a> and <a :href='api.i("jobs", 2).href'>{{api.i("jobs", 2).company}}</a></label>
        </div>
      </div>
    </section>

    <section class='info'>

    </section>
  </main>
</template>
24
<script>
  import api from './../../api.js';

  export default {
    name: 'overview',
    data: function() {
      return {
        api: api
      };
    }
  };
</script>

<style lang='less' scoped>
  @import './../../less/index.less';

  .overview {
    .content {
      width:62%;
      height:200px;
      padding:20px;

      .row {
        width:100%;
        height:90px;

        &:hover {
          background-color:@color-grey3;
        }

        .logo {
          width:20%;

          img {
            float:right;
            margin-right:20px;
            height:auto;
            max-width:100%;
          }
        }

        .description {
          width:80%;

          header {
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
