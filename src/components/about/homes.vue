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
  import data from './../../services/data';

  export default {
    name: 'homes',
    data: function() {
      return {
        homes: {}
      };
    },
    created: function() {
      
    }
  };
</script>

<style lang='less' scoped>
  @import './../../less/variables.less';
  @import './../../less/flex.less';

  .homes {

  }

</style>
