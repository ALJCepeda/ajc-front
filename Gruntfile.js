module.exports = function(grunt) {
  var lessFiles = [
    'less/index.less'
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
    }
  });

  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-less');

  grunt.registerTask('default', ['concat', 'less']);
};
