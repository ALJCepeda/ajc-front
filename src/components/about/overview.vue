<template>
  <main class='overview row-nw'>
    <section class='content'>
      <div class='row row-nw'>
        <div class='logo row-nw ai-center jc-end'>
          <img :src='api.key("jobs", 0).logo'></img>
        </div>
        <div class='description col-w ac-start jc-center'>
          <header>
            {{ api.key("jobs", 0).title }} at
            <a :href='api.key("jobs", 0).href'>
              {{ api.key("jobs", 0).company }}
            </a>
          </header>
          <label class='caption'>
            Past:
            <a :href='api.key("jobs", 1).href'>
              {{ api.key("jobs", 1).company }}
            </a> and <a :href='api.key("jobs", 2).href'>
              {{ api.key("jobs", 2).company }}
            </a>
          </label>
        </div>
      </div>

      <hr>

      <div class='row row-nw'>
        <div class='logo row-nw ai-center jc-end'>
          <img :src='api.key("education", "college").logo'></img>
        </div>
        <div class='description col-w ac-start jc-center'>
          <header>
            Studied at
            <a :href='api.key("education", "college").href'>
              {{ api.key("education", "college").name }}
            </a>
          </header>
          <label class='caption'>
            Past:
            <a :href='api.key("education", "highschool").href'>
              {{ api.key("education", "highschool").name }}
            </a>
          </label>
        </div>
      </div>

      <hr>

      <div class='row row-nw'>
        <div class='logo row-nw ai-center jc-end'>
          <img :src='api.key("addresses", "first").logo'></img>
        </div>
        <div class='description col-w ac-start jc-center'>
          <header>
            Lives in
            <a :href='api.key("addresses", "last").city.href'>
              {{ api.key("addresses", "last").city.name }}, {{ api.key("addresses", "last").city.state }}
            </a>
          </header>
          <label class='caption'>
            From
            <a :href='api.key("addresses", "first").city.href'>
              {{ api.key("addresses", "first").city.name }}, {{ api.key("addresses", "first").city.state }}
            </a>
            Lived in
            <a :href='api.key("cities", "last", 1).href'>
              {{ api.key("cities", "last", 1).name }}, {{ api.key("cities", "last", 1).state }}
            </a>
          </label>
        </div>
      </div>
    </section>

    <section class='info'>

    </section>
  </main>
</template>
24
<script>
  import api from './../../api.js';

  export default {
    name: 'overview',
    data: function() {
      return {
        api: api
      };
    }
  };
</script>

<style lang='less' scoped>
  @import './../../less/index.less';

  .overview {
    .content {
      width:62%;
      height:200px;
      padding:20px;

      hr {
        width: 90%;
      }

      .row {
        width:100%;
        height:90px;

        &:hover {
          background-color:@color-grey3;
        }

        .logo {
          width:17%;

          img {
            height: 32px;
            width: 32px;
            margin: auto;
          }
        }

        .description {
          width:80%;

          header {
            color:@color-black1;
          }
        }
      }
    }

    .info {
      width:38%;
      height:200px;
      background: green;
    }
  }
</style>
