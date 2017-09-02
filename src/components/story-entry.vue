<template>
  <main class='story-entry border'>
    <div class='header row-nw'>
      <div class='img row-nw ai-center'>
        <img :src='image'></img>
      </div>

      <div class='content'>
        <div class='top'>
          <a href='#'>{{name}}</a> shared something
        </div>

        <div class='bottom'>
          Yesterday at 12:06am
        </div>
      </div>
    </div>

    <div class='main'>
      <p>
        Timeline entries has not been completed yet
      </p>
    </div>

  </main>
</template>

<script>
  import API from './../services/api.js';
  const api = new API();

  export default {
    name: 'story-entry',
    data: function() {
      return {
        image: '',
        name: ''
      };
    },
    created: function() {
      api.keys('general', ['firstname', 'lastname', 'image']).then((resp) => {
        this.name = `${resp.firstname} ${resp.lastname}`;
        this.image = resp.image;
      });
    }
  };
</script>

<style lang='less' scoped>
  @import './../less/flex.less';
  @import './../less/variables.less';

  .story-entry {
    width:100%;
    background:@color-white;
    color:black;

    .header {
      padding:10px;

      .img {
        width:10%;

        img {
          width:100%;
          height:auto;
        }
      }

      .content {
        width:90%;
        height:100%;
        padding:6px;

        .top {
          margin-bottom:10px;
        }

        .bottom {
          color:#90949c;
          font-size:12px;
        }
      }
    }

    .main {
      padding-left:10px;
      padding-right:10px;
      padding-bottom:10px;

      p {
        margin-top:0px;
        margin-bottom:10px;
      }
    }
  }
</style>
