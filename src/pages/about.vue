<template>
  <main class='about border'>
    <header>
      <div class='title'>
        <i class="material-icons">&#xE7FD;</i>About
      </div>
    </header>

    <section class='row-nw'>
      <nav>
          <router-link to='/about/overview'>Overview</router-link>
          <router-link to='/about/work'>Work and Education</router-link>
          <router-link to='/about/homes'>Places You've Lived</router-link>
          <router-link to='/about/info'>Contact and Basic Info</router-link>
          <router-link to='/about/family'>Family and Relationships</router-link>
          <router-link to='/about/details'>Details About You</router-link>
          <router-link to='/about/events'>Life Events</router-link>
      </nav>

      <div class='content'>
        <overview v-if='$route.params.section === "overview"'></overview>
        <work v-if='$route.params.section === "work"'></work>
        <homes v-if='$route.params.section === "homes"'></homes>
        <info v-if='$route.params.section === "info"'></info>
      </div>
    </section>
  </main>
</template>

<script>
  import overview from './../components/about/overview.vue';
  import work from './../components/about/work.vue';
  import homes from './../components/about/homes.vue';
  import info from './../components/about/info.vue';

  export default {
    name: 'about',
    components: { overview, work, homes, info },
    props: [ ]
  };
</script>

<style lang='less' scoped>
  @import './../less/variables.less';
  @import './../less/flex.less';

  .about {
    background:blue;

    section {
      nav {
        width:30%;
        border-right:1px solid @color-greyHr;

        a {
          display:inline-block;
          width:100%;
          height:45px;
          line-height:45px;
          margin-left:15px;
          color:@color-grey4;
          font-weight:normal;

          &.router-link-active {
            color:@color-black2;
            font-weight:bold;
          }
        }
      }

      .content {
        width: 70%;
        padding: 20px;
      }
    }
  }
</style>
