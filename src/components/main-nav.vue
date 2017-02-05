<template>
  <div class='container'>
    <div class='cover-photo'></div>
    <div class='header'>
      <div class='main-photo'>
        <img src='./../assets/images/me.jpeg'></img>
      </div>
      <div class='content'>
        <div class='info'>
          <span>Alfred Cepeda</span>
        </div>

        <div class='nav'>
          <!--<ul>
            <li>Timeline</li>
            <li>About</li>
          </ul>-->
        </div>
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
    background:#fff;
  }

  .cover-photo {
    height:85%;
    background-image:url('../assets/images/workstation.png');
    background-size:cover;
    background-repeat:no-repeat;
    background-position:center center;
  }

  .header {
    .row-nw;

    position:relative;
    top:-130px;

    width:100%;
    height:46%;
  }

  .main-photo {
    .row-nw;.c-center;.m-center;

    height:100%;
    width:20%;

    img {
      height:155px;
      width:170px;

      border:4px solid #fff;
      border-radius:2px;
    }
  }

  .content {
    width:80%;
    height:100%;

    .info {
      position:relative;
      height:68%;

      span {
        position:absolute;
        bottom:10px;
        left:5px;

        color:#fff;
        font-family:Helvetica, Arial, sans-serif;
        font-size:24px;
        font-weight:500;
        line-height:30px;
      }
    }

    .nav {
      height:32%;
      width:100%;

      background:blue;
    }
  }
</style>
