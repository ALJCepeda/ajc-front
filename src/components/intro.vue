<template>
  <div class='intro border'>
    <header>
      <i class='material-icons'>&#xE80B;</i>
      <span>Intro</span>
    </header>

    <div class='content'>
      <div class='w100'>
        <span>
          <i class="material-icons">&#xE8F9;</i>
          Former Senior Developer at <a href='#'>6-Bit Consulting</a>
        </span>
      </div>

      <div class='w100'>
        <span>
          <i class="material-icons">&#xE88A;</i>
          Lives in <a href='#'>Port St Lucie, FL</a>
        </span>
      </div>

      <div class='w100'>
        <span>
          <i class="material-icons">&#xE8B4;</i>
          From <a href='#'>Yorktown Heights, New York</a>
        </span>
      </div>

      <div class='w100'>
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
    .row-w;.m-center;
    align-self:flex-start;
    background:@color-white;
    width:38%;

    header {
      .row-nw;.c-center;
      margin-left:12px;
      height:50px;
      width:100%;

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
      border-top:1px solid #e9ebee;
      padding-top:8px;
      width:91%;
      font-size:13px;
      color:@color-black2;

      .material-icons {
        position:relative;
        top:3px;

        margin-right:10px;
        font-size:17px;
        color:@color-grey;
      }

      div {
        margin-bottom:10px;
      }
    }
  }

</style>
