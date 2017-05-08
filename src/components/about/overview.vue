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
          <span class='caption'>
            Past:
            <a :href='api.key("jobs", 1).href'>
              {{ api.key("jobs", 1).company }}
            </a> and <a :href='api.key("jobs", 2).href'>
              {{ api.key("jobs", 2).company }}
            </a>
          </span>
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
          <span class='caption'>
            Past:
            <a :href='api.key("education", "highschool").href'>
              {{ api.key("education", "highschool").name }}
            </a>
          </span>
        </div>
      </div>

      <hr>

      <div class='row row-nw'>
        <div class='logo row-nw ai-center jc-end'>
          <img :src='api.key("homes", "first").logo'></img>
        </div>
        <div class='description col-w ac-start jc-center'>
          <header>
            Lives in
            <a :href='api.key("homes", "last").city.href'>
              {{ api.key("homes", "last").city.name }}, {{ api.key("homes", "last").city.state }}
            </a>
          </header>
          <span class='caption'>
            From
            <a :href='api.key("homes", "first").city.href'>
              {{ api.key("homes", "first").city.name }}, {{ api.key("homes", "first").city.state }}
            </a>
              · Lived in
            <a :href='api.key("cities", "Independence, OR").href'>
              {{ api.key("cities", "Independence, OR").name }}, {{ api.key("cities", "Independence, OR").state }}
            </a>
          </span>
        </div>
      </div>
    </section>

    <section class='info'>
        <div class='row caption'>
          <span>
            <i class="material-icons">stay_current_portrait</i>
            (813) 562-3862
          </span>
        </div>

        <div class='row caption'>
          <span>
            <i class="material-icons">email</i>
            alfredjcepeda@gmail.com
          </span>
        </div>

        <div class='row caption'>
          <span>
            <i class="material-icons">cake</i>
            August 30, 1988
          </span>
        </div>
    </section>
  </main>
</template>

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
      padding:0px 20px 20px 10px;

      hr {
        width: 90%;
        border-top: 1px solid @color-greyHr;
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
      width:35%;
      padding: 20px;

      .row {
          margin-bottom:10px;
      }
    }
  }
</style>
