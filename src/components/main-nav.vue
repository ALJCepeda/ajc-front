<template>
  <div class='container'>
    <div class='cover-photo'></div>
    <div class='header'>
      <div class='main-photo'></div>
      <div class='content'>
        <div class='info'>
          <span>Alfred Cepeda</span>
        </div>

        <nav>
          <ul>
            <li>Timeline</li>
            <li>About</li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'mainNav'
  };
</script>

<style lang='less' scoped>
  @import './../less/flex.less';

  .container {
    width:100%;
    height:70%;
    background-color:blue;
  }

  .cover-photo {
    height:85%;
    background-color:cyan;
  }

  .header {
    .row-nw;

    position:relative;
    top:-130px;

    background-color:green;
    width:100%;
    height:185px;
  }

  .main-photo {
    height:100%;
    width:25%;
    min-height:150px;
    min-width:150px;

    background-color:yellow;
  }

  .content {
    background-color:purple;
    width:75%;
    height:100%;

    .info {
      position:relative;
      background-color:brown;
      height:75%;

      span {
        position:absolute;
        bottom:0;
        left:0;
      }
    }

    nav {
      height:25%;
      width:100%;
      
      ul {
        background:blue;
      }
    }
  }
</style>
