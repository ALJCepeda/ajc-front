<template>
  <div class='mainNav border'>
    <div class='cover-photo'></div>
    <div class='header'>
      <div class='main-photo'>
        <div class='border'>
          <img src='./../assets/images/me.jpeg'></img>
        </div>
      </div>
      <div class='content'>
        <div class='info'>
          <span>Alfred Cepeda</span>
        </div>

        <nav>
          <ul>
            <li class='active'>Timeline</li>
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
  @import './../less/variables.less';
  @import './../less/flex.less';

  .mainNav {
    width:100%;
    height:360px;
    background:@color-white;

    margin-bottom:20px;
  }

  .cover-photo {
    height:315px;
    background-image:url('../assets/images/workstation.png');
    background-size:cover;
    background-repeat:no-repeat;
    background-position:center center;
  }

  .header {
    .row-nw;

    position:relative;
    top:-142px;

    width:100%;
    height:52%;
  }

  .main-photo {
    .row-nw;.c-center;.m-center;
    position:relative;
    top:-12px;

    height:100%;
    width:21%;

    .border {
      height:178px;
      width:178px;
    }

    img {
      height:170px;
      width:170px;

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

        color:@color-white;
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
        }

        li.active {
          color:@color-black1;
        }
      }
    }
  }
</style>
