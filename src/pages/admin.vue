<template>
  <main class='about border'>
    <header class='title'>
      <div class='content'>
        <i class="material-icons">&#xE7FD;</i>Admin
        <i class="material-icons hide-downto-tablet" style='margin-left:10px;cursor:pointer;' @click='showNav()'>&#xE896;</i>
      </div>
    </header>

    <section class='row-nw'>
      <nav id='side-nav'>
        <router-link to='/admin/timeline'>Timeline</router-link>
      </nav>

      <div class='side-nav-content'>
        Welcome
      </div>
    </section>
  </main>
</template>

<script>
  export default {
    name: 'about',
    components: { },
    data: function() {
      return {
        isTablet: false,
        navShowing: true
      };
    },
    props: [ ],
    methods: {
      showNav: function() {
        $("#about-nav").animate({
          width:'toggle'
        }, 350);

        this.$data.navShowing = !this.$data.navShowing;
      }
    },
    created() {

    }
  };
</script>

<style lang='less' scoped>
  @import './../less/variables.less';
  @import '~ajc-toolbelt/dist/less/flex.less';

  #about-nav {

  }
  .about {
    background:blue;
  }
</style>
