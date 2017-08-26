<template>
  <main class='mainNav border'>
    <div class='cover-photo'></div>

    <div class='header row-nw'>
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
  </main>
</template>

<script>
  import API from './../api.js';
  const api = new API();

  export default {
    name: 'mainNav',
    data: function() {
      return {
        image: '',
        name: ''
      };
    },
    created: function() {
      var test = 1;

      api.key('general', ['firstname', 'lastname', 'image']).then((resp) => {
        debugger;
      });
    }
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

    padding:1px;
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
    position:relative;
    top:-134px;
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
      @nav-height:45px;
      height:@nav-height;
      border-left:1px solid #e9eaed;

      a {
        float:left;
        height:inherit;
        padding-left:20px;
        padding-right:20px;
        text-align:center;
        font-weight:bold;
        border-right:1px solid #e9eaed;
        line-height:@nav-height;

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
