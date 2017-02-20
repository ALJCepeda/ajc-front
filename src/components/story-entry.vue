<template>
  <div class='story-entry border'>
    <div class='header'>
      <div class='img'>
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
        I've worked with enough companies to know better. If you can't invest the time to make sure you have a solid work environment then there's no way in hell you're going to invest in making my dreams come true.
      </p>

      <p>
        The truth is. you're just going to use the money you would have spent to treat me like a real employee to instead pay for pursuits that I'm going to have to do on my own time anyway. And that's a big assumption you'll even bother to fulfill your promises. How the hell is this a better deal for anyone?
      </p>
    </div>

  </div>
</template>

<script>
  export default {
    name: 'story-entry',
    props: ['name', 'image']
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
      .row-nw;
      padding:10px;

      .img {
        .row-nw;.c-center;
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
