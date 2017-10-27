<template>
  <main class='work'>
    <h5>
      WORK
      <hr>
    </h5>

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

    <h5>
      PROFESSIONAL SKILLS
      <hr>
    </h5>

    <section class='entries skills'>
      <div v-for='(skill, index) in skills'>
        {{ skill.name }}

        <div :id='"skill-" + index' class='mdl-progress mdl-js-progress' style='margin-top:8px;margin-bottom:15px;'></div>
      </div>
    </section>

    <h5>
      EDUCATION
      <hr>
    </h5>

    <section class='entries'>
      <div class='row row-nw ai-center' v-for='education in education'>
        <img :src='education.logo'></img>

        <div class='description'>
          <header>
            {{ education.name }}
          </header>

          <div class='body caption'>
            Class of {{ education.graduated.format("YYYY") }} · {{ education.address.city.name }}, {{education.address.city.state}}
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
  import data from './../../services/data';
  import util from './../../services/util';
  import componentHandler from 'componentHandler';

  export default {
    name: 'work',
    data: function() {
      return {
        jobs: [],
        skills: [],
        education: []
      };
    },
    created: function() {
      this.jobs = data.jobs;
      this.skills = util.shuffle(Object.keys(data.skills)).map((key) => {
        return Object.assign({ name: key }, data.skills[key]);
      });
      this.education = data.education;
    },
    watch: {
      skills: function(skills) {
        setTimeout(() => {
          skills.forEach((skill, index) => {
            document.querySelector(`#skill-${index}`).addEventListener('mdl-componentupgraded', function() {
              this.MaterialProgress.setProgress(skill.outOfTen * 10);
            });
          });

          componentHandler.upgradeDom();
        });
      }
    }
  };
</script>

<style lang='less'>
  @import './../../less/variables.less';

  .work {
    img {
      margin-right: 15px;
      height: 36px;
      width: 36px;
      flex-shrink: 0;
    }

    .entries {
      margin-bottom: 25px;

      .row {
        margin-top: 15px;
        padding-bottom: 20px;
      }

      &.skills {
        color: @color-black2;
        font-weight: bold;
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
