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

        <nav>
          <ul>
            <li>Timeline</li>
            <li>About</li>
            <li>Friends <span class='subtitle'>71</span></li>
            <li>Photos</li>
            <li>More <i class='material-icons'>&#xE5C5;</i></li>
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
    height:50%;
    background:#fff;
  }

  .cover-photo {
    height:89%;
    background-image:url('../assets/images/workstation.png');
    background-size:cover;
    background-repeat:no-repeat;
    background-position:center center;
  }

  .header {
    .row-nw;

    position:relative;
    top:-35%;

    width:100%;
    height:46%;
  }

  .main-photo {
    .row-nw;.c-center;.m-center;

    height:100%;
    width:24%;

    img {
      position:absolute;
      bottom:8%;
      left:2%;

      height:auto;
      width:20%;
      max-width:170px;
      max-height:170px;

      border:4px solid #fff;
      border-radius:2px;
    }
  }

  .content {
    width:75%;
    height:100%;

    .info {
      position:relative;
      height:76%;

      span {
        position:absolute;
        bottom:7%;
        left:1%;

        color:#fff;
        font-family:Helvetica, Arial, sans-serif;
        font-size:1.7em;
        font-weight:500;
        line-height:30px;
      }
    }

    nav {
      height:24%;
      width:100%;

      ul {
        height:100%;
        margin:0;
        padding:0;

        list-style:none;
        border-left:1px solid #e9eaed;

        li {
          .row-nw;.m-center;.c-center;

          height:100%;
          padding:0 20px;
          float:left;

          font-size:1.1em;
          font-weight:bold;
          line-height:3.05;
          border-right:1px solid #e9eaed;
          color: #365899;

          .subtitle {
            margin-top:4px;
          }
        }
      }
    }
  }
</style>
