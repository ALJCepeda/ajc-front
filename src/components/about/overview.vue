<template>
  <main class='overview row-nw'>
    <section class='entries'>
      <div class='row row-nw ai-center'>
        <div class='logo'>
          <img :src='api.key("jobs", 0).logo'></img>
        </div>

        <div class='description'>
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
            </a>
          </span>
        </div>
      </div>

      <hr>

      <div class='row row-nw ai-center'>
        <div class='logo'>
          <img :src='api.key("education", "college").logo'></img>
        </div>

        <div class='description'>
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

      <div class='row row-nw ai-center'>
        <div class='logo'>
          <img :src='api.key("homes", "first").logo'></img>
        </div>

        <div class='description'>
          <header>
            Lives in
            <a :href='api.key("homes", "last").address.city.href'>
              {{ api.key("homes", "last").address.city.name }}, {{ api.key("homes", "last").address.city.state }}
            </a>
          </header>

          <span class='caption'>
            From
            <a :href='api.key("homes", "first").address.city.href'>
              {{ api.key("homes", "first").address.city.name }}, {{ api.key("homes", "first").address.city.state }}
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
        <div class='icon-row row-nw ai-center caption'>
          <i class="material-icons">stay_current_portrait</i>

          <span>
            (813) 562-3862
          </span>
        </div>

        <div class='icon-row row-nw ai-center caption'>
          <i class="material-icons">email</i>

          <span>
            alfredjcepeda@gmail.com
          </span>
        </div>

        <div class='icon-row row-nw ai-center caption'>
          <i class="material-icons">cake</i>

          <span>
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
    .entries {
      width:62%;
      padding: 10px 20px 10px 20px;

      .row {
        width:100%;
        padding:20px 10px 20px 20px;
        margin-top:10px;
        margin-tobbomt:10px;

        &:hover {
          background-color:@color-grey3;
        }

        .logo {
          img {
            height: 32px;
            width: 32px;
            margin-right: 15px;
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

      .icon-row {
          margin-bottom:10px;
      }
    }
  }
</style>
