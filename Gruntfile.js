module.exports = function(grunt) {
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');

  var lessFiles = [
    'less/variables.less',
    'less/index.less',
    'less/home.less'
  ];

  grunt.initConfig({
    concat: {
      default: {
        src: lessFiles,
        dest: 'less/built.less'
      }
    },
    less: {
      default: {
        files: {
          'public/assets/css/styles.css':'less/built.less'
        }
      }
    },
    watch: {
      default: {
        files:lessFiles,
        tasks: ['concat', 'less']
      }
    }
  });

  grunt.registerTask('default', ['concat', 'less', 'watch']);
};
