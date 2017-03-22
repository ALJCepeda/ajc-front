<template>
  <div class='intro border'>
    <header class='row-nw ai-center'>
      <i class='material-icons'>&#xE80B;</i>
      <span>Intro</span>
    </header>

    <div class='content'>
      <div class='row'>
        <span>
          <i class="material-icons">&#xE8F9;</i>
          Self Employed as Software Engineer
        </span>
      </div>
      <div class='row'>
        <span>
          <i class="material-icons">&#xE8F9;</i>
          Senior Developer at <a href='https://urbanfort.com/' target='_blank'>URBANFORT Corps</a>
        </span>
      </div>

      <div class='row'>
        <span>
          <i class="material-icons">&#xE8F9;</i>
          Senior Developer at <a href='http://www.littlerocket.io/' target='_blank'>Little Rocket</a>
        </span>
      </div>

      <div class='row'>
        <span>
          <i class="material-icons">&#xE8F9;</i>
          Former Senior Developer at <a href='http://www.acappellamedia.com/' target='_blank'>Acapella Media</a>
        </span>
      </div>

      <div class='row'>
        <span>
          <i class="material-icons">&#xE8F9;</i>
          Former Senior Developer at <a href='http://www.reBaked.com' target='_blank'>reBaked</a>
        </span>
      </div>

      <div class='row'>
        <span>
          <i class="material-icons">&#xE8F9;</i>
          Former Junior Developer at <a href='http://www.asktrak.com' target='_blank'>Trustbuilders</a>
        </span>
      </div>

      <div class='row'>
        <span>
          <i class="material-icons">&#xE8F9;</i>
          Former Junior Developer at <a href='http://www.bonzicentral.com' target='_blank'>Bonzi Sports Software</a>
        </span>
      </div>

      <div class='row'>
        <span>
          <i class="material-icons">&#xE8F9;</i>
          Former Junior Developer at <a href='http://www.numedics.com' target='_blank'>Numedics</a>
        </span>
      </div>

      <div class='row'>
        <span>
          <i class="material-icons">&#xE88A;</i>
          Lives in <a href='https://goo.gl/maps/NfcWPHEqCuF2' target='_blank'>Port St Lucie, FL</a>
        </span>
      </div>

      <div class='row'>
        <span>
          <i class="material-icons">&#xE8B4;</i>
          From <a href='https://goo.gl/maps/QVckXpQgAPE2' target='_blank'>Yorktown Heights, New York</a>
        </span>
      </div>

      <div class='row'>
        <span>
          <i class="material-icons">&#xE050;</i>
          Pronounces name AL-fred si-PE-dah
        </span>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'intro',
    components: { }
  };
</script>

<style lang='less' scoped>
  @import './../less/flex.less';
  @import './../less/variables.less';

  .intro {
    align-self:flex-start;
    background:@color-white;
    width:38%;

    header {
      margin-left:12px;
      height:50px;

      .material-icons {
        color:#4267B2;
        margin-right:9px;
      }

      span {
        font-size:16px;
        line-height:20px;
        color:@color-black1;
      }
    }

    .content {
      padding: 8px 0px 5px 15px;
      border-top:1px solid #e9ebee;
      font-size:13px;
      color:@color-black2;

      .material-icons {
        position:relative;
        top:3px;

        margin-right:10px;
        font-size:17px;
        color:@color-grey1;
      }

      .row {
        height:26px;
      }
    }
  }

</style>
