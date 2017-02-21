<template>
  <main class='about border'>
    <header>
      <i class="material-icons">&#xE7FD;</i> About
    </header>

    <section>
      <nav>
        <router-link to='/about/overview'>Overview</router-link>
        <router-link to='/about/work'>Work and Education</router-link>
        <router-link to='#'>Places You've Lived</router-link>
        <router-link to='#'>Contact and Basic Info</router-link>
        <router-link to='#'>Family and Relationships</router-link>
        <router-link to='#'>Details About You</router-link>
        <router-link to='#'>Life Events</router-link>
      </nav>

      <div class='content'>
        <div class='overview' v-if='$route.params.section === "overview"'>
          <overview></overview>
        </div>

        <div class='work' v-if='$route.params.section === "work"'>
          <work></work>
        </div>
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
      .row-nw;.c-center;

      height:55px;
      width:100%;
      background:#f6f7f9;
      color:@color-black1;
      vertical-align: middle;

      font-size:20px;
      font-weight:bold;
      border-bottom:2px solid #e9eaed;

      i {
        margin-left:10px;
        margin-right:10px;
        color:@color-grey2;
        font-size:35px;
      }
    }

    section {
      .row-nw;
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
          color:@color-grey3;
          font-weight:normal;

          &.router-link-active {
            color:#000;
            font-weight:bold;
          }
        }
      }

      .content {
        width:70%;
      }
    }
  }
</style>
