<template>
  <main class='about border'>
    <header>
      <i class="material-icons">&#xE7FD;</i> About
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
      </div>
    </section>
  </main>
</template>

<script>
  import overview from './../components/about/overview';
  import work from './../components/about/work';

  export default {
    name: 'about',
    components: { overview, work },
    props: [ ]
  };
</script>

<style lang='less' scoped>
  @import './../less/variables.less';
  @import './../less/flex.less';

  .about {
    background:blue;

    header {
      height:55px;
      width:100%;
      background:#f6f7f9;
      color:@color-black1;
      vertical-align: middle;

      font-size:20px;
      font-weight:bold;
      border-bottom:2px solid #e9eaed;

      i {
        position:relative;
        top:10px;
        margin-left:10px;
        margin-right:10px;
        color:@color-grey2;
        font-size:35px;
      }
    }

    section {
      background:@color-white;

      nav {
        width:30%;
        border-right:1px solid #e9eaed;

        a {
          display:inline-block;
          width:100%;
          height:45px;
          line-height:45px;
          margin-left:15px;
          color:@color-grey4;
          font-weight:normal;

          &.router-link-active {
            color:#000;
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
