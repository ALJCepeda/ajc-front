<template>
  <main class='overview row-nw'>
    <section class='entries'>
      <div class='row row-nw ai-center' v-if='jobs[0] && jobs[1]'>
        <div class='logo'>
          <img :src='jobs[0].logo'></img>
        </div>

        <div class='description'>
          <header>
            {{ jobs[0].title }} at
            <a :href='jobs[0].href'>
              {{ jobs[0].company }}
            </a>
          </header>

          <span class='caption'>
            Past:
            <a :href='jobs[1].href'>
              {{ jobs[1].company }}
            </a>
          </span>
        </div>
      </div>

      <hr>

      <div class='row row-nw ai-center' v-if='education["college"] && education["highschool"]'>
        <div class='logo'>
          <img :src='education["college"].logo'></img>
        </div>

        <div class='description'>
          <header>
            Studied at
            <a :href='education["college"].href'>
              {{ education["college"].name }}
            </a>
          </header>

          <span class='caption'>
            Past:
            <a :href='education["highschool"].href'>
              {{ education["highschool"].name }}
            </a>
          </span>
        </div>
      </div>

      <hr>

      <div class='row row-nw ai-center' v-if='homes["first"] && homes["last"]'>
        <div class='logo'>
          <img :src='homes["first"].logo'></img>
        </div>

        <div class='description'>
          <header>
            Lives in
            <a :href='homes["last"].address.city.href'>
              {{ homes["last"].address.city.name }}, {{ homes["last"].address.city.state }}
            </a>
          </header>

          <span class='caption'>
            From
            <a :href='homes["first"].address.city.href'>
              {{ homes["first"].address.city.name }}, {{ homes["first"].address.city.state }}
            </a>
              · Lived in
            <a :href='city.href'>
              {{ city.name }}, {{ city.state }}
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
  import API from './../../api.js';
  const api = new API();

  export default {
    name: 'overview',
    data: function() {
      return {
        jobs: [],
        education: {},
        homes: [],
        city: {}
      };
    },
    created: function() {
      /*
      api.slice('jobs', 0, 2).then((jobs) => {
        this.jobs = jobs;
      });
      */

      api.keys('education', [ 'college', 'highschool' ]).then((education) => {
        this.education = education;
      });

      api.keys('homes', [ 'first', 'last' ]).then((homes) => {
        this.homes = homes;
      });

      api.key('city', 'Independence, OR').then((city) => {
        this.city = city;
      });
    }
  };
</script>

<style lang='less' scoped>
  @import './../../less/index.less';

  .overview {
    .entries {
      width:62%;

      .row {
        width:100%;
        padding:20px 10px 20px 20px;
        margin-top:10px;
        margin-tobbomt:10px;

        &:hover {
          background-color:@color-grey3;
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
