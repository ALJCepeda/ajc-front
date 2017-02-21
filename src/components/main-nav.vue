<template>
  <div class='mainNav border'>
    <div class='cover-photo'></div>
    <div class='header'>
      <div class='main-photo'>
        <div class='border'>
          <img :src='image'></img>
        </div>
      </div>
      <div class='content'>
        <div class='info'>
          <span>{{ name }}</span>
        </div>

        <nav>
          <router-link to='/timeline'>Timeline</router-link>
          <router-link to='/about'>About</router-link>
          <router-link to='/blog'>Blog <span class='subtitle'>71</span></router-link>
          <router-link to='/projects'>Projects</router-link>
          <router-link to='/more'>More <i class='material-icons'>&#xE5C5;</i></router-link>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'mainNav',
    props: ['image', 'name']
  };
</script>

<style lang='less' scoped>
  @import './../less/variables.less';
  @import './../less/flex.less';

  .clearfix:after {
    content: " ";
    display: block;
    clear: both;
  }

  .mainNav {
    width:100%;
    height:400px;
    background:@color-white;

    margin-bottom:20px;
  }

  .cover-photo {
    height:355px;
    background-image:url('../assets/images/workstation.png');
    background-size:cover;
    background-repeat:no-repeat;
    background-position:center center;
  }

  .header {
    .row-nw;
    position:relative;
    top:-138px;
    width:100%;
  }

  .main-photo {
    margin-left:15px;
    margin-right:18px;
    margin-bottom:15px;

    img {
      height:155px;
      width:170px;

      border:4px solid #fff;
      border-radius:2px;
    }
  }

  .content {
    width:75%;
    align-self:flex-end;

    .info {
      width:100%;
      margin-bottom:13px;
      span {
        color:@color-white;
        font-size:1.7em;
        font-weight:500;
        line-height:30px;
      }
    }

    nav {
      .row-nw;.c-center;
      border-left:1px solid #e9eaed;

      a {
        padding-left:20px;
        padding-right:20px;
        text-align:center;
        line-height:44px;
        border-right:1px solid #e9eaed;

        &:hover {
         background:#F6F7F9;
        }
        &.router-link-active {
          color:@color-black1;
        }

        i {
          position:relative;
          top:6px;
        }
      }
    }
  }
</style>
