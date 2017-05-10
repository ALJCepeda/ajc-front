<template>
  <main class='work'>
    <header>
      WORK
      <hr>
    </header>

    <section class='entries'>
      <div class='row row-nw ai-center' v-for='job in jobs'>
        <img :src='job.logo'></img>

        <div class='description'>
          <header>
            {{ job.company }}
          </header>

          <div class='body caption'>
            {{ job.title }} · {{ job.address.city.name }}, {{ job.address.city.state }}
          </div>

          <footer>
              {{ job.description }}
          </footer>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
  import api from './../../api.js';

  export default {
    name: 'work',
    data: function() {
      return {
        jobs: []
      };
    },
    created: function() {
      api.all('jobs').then((jobs) => {
        this.jobs = jobs;
      });
    }
  };
</script>

<style lang='less'>
  @import './../../less/variables.less';

  .work {
    padding: 15px;

    header {
      color: @color-grey4;
      font-weight: bold;
      font-size: 12px;
    }

    img {
      margin-right: 15px;
      height: 36px;
      width: 36px;
    }

    .entries {
      .row {
        margin-top: 15px;
      }

      header {
        color: @color-blue;
        font-weight: bold;
        font-size: 1.2em;

        &:hover {
          text-decoration: underline;
          cursor: pointer;
        }
      }

      .body {
        margin-top: 3px;
        color: @color-black1;
      }

      footer {
        font-size: 0.8em;
        margin-top: 5px;
        color: @color-grey4;
      }
    }
  }
</style>
