<template>
  <main class='work'>
    <h5>
      WORK
    </h5>

    <section class='entries'>
      <div class='entry' v-for='job in jobs'>
        <img :src='job.logo'></img>

        <div class='description'>
          <header>
            {{ job.company }}
          </header>

          <div class='caption'>
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
    </h5>

    <section class='entries skills'>
      <div v-for='(skill, index) in skills'>
        {{ skill.name }}

        <div :id='"skill-" + index' class='mdl-progress mdl-js-progress' style='margin-top:8px;margin-bottom:15px;'></div>
      </div>
    </section>

    <h5>
      EDUCATION
    </h5>

    <section class='entries'>
      <div class='entry' v-for='education in education'>
        <img :src='education.logo'></img>

        <div class='description'>
          <header>
            {{ education.name }}
          </header>

          <div class='caption'>
            Class of {{ education.graduated.format("YYYY") }} · {{ education.address.city.name }}, {{education.address.city.state}}
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
  import data from './../../services/data';
  import toolbelt from 'aj-toolbelt';
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
      this.skills = toolbelt.shuffle(Object.keys(data.skills)).map((key) => {
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
    .entries {
      &.skills {
        color: @color-black2;
        font-weight: bold;
      }
    }
  }
</style>
