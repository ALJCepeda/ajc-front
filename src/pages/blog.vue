<template>
  <main class='blog border'>
    <header>
      <div class='title'>
        <i class="material-icons">&#xE02F;</i>Blog
      </div>

        <div class='row-nw jc-between ai-center' style='margin-top:20px;'>
          <nav class='links'>
              <router-link to='/blog/all' class='active'>All Blogs<span class='count'> 82</span></router-link>
              <router-link to='/blog/general'>General<span class='count'> 82</span></router-link>
              <router-link to='/blog/technology'>Technology<span class='count'> 82</span></router-link>
              <router-link to='/blog/development'>Development<span class='count'> 82</span></router-link>
          </nav>

          <div>
            <input type='text' placeholder='Search for blogs'>
          </div>
        </div>
      </header>

      <section class='blog-list'>
        Whatever dude
      </section>
  </main>
</template>

<script>
  export default {
    name: 'blog',
    components: { },
    props: [ ]
  };
</script>

<style lang='less' scoped>
  @import './../less/variables.less';
  @import './../less/flex.less';
</style>
