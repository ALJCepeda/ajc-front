<template>
  <main class='timeline-card border'>
    <div class='header row-nw'>
      <div class='img row-nw ai-center'>
        <img :src='model.image'></img>
      </div>

      <div class='content'>
        <div class='top'>
          <a href='#'>{{model.name}}</a><span v-if='model.type'> shared {{ model.type }}</span>
        </div>

        <div class='bottom'>
          {{ model.fromNow }}
        </div>
      </div>
    </div>

    <div class='message'>
      <p>
        {{ model.message }}
      </p>
    </div>
  </main>
</template>

<script>
  import data from './../../services/data';

  export default {
    name: 'card',
    props: [ 'model' ]
  };
</script>

<style lang='less' scoped>
  @import '~ajc-toolbelt/less/flex.less';
  @import './../../less/variables.less';

  .timeline-card {
    width:100%;
    max-width:550px;
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

        .bottom {
          color:#90949c;
          font-size:12px;
        }
      }
    }

    .message {
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
