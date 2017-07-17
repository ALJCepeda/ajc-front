<template>
  <main class='homes'>
    <h5>CURRENT CITY AND HOMETOWN</h5>
    <hr>

    <section class='entries'>
      <div class='row row-nw ai-center'>
        <div class='logo'>
          <img :src='moocow'></img>
        </div>

        <div class='description'>
          <header>
            Header
          </header>

          <span class='caption'>
            Caption
          </span>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
  import api from './../../api';
  export default {
    name: 'homes',
    data: function() {
      return {
        homes: {}
      };
    },
    created: function() {
      api.keys('homes', ['$first', '$last']).then((response) => {
        this.homes = response;
      });

      api.keys('homes', { '$last': [3, 3] }).then((response) => {
        debugger;
      });
    }
  };
</script>

<style lang='less' scoped>
  @import './../../less/variables.less';
  @import './../../less/flex.less';

  .homes {

  }

</style>
