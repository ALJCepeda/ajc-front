module.exports = function(grunt) {
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');

  var lessFiles = [
    'less/variables.less',
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
    },
    watch: {
      default: {
        files:lessFiles,
        tasks: ['concat', 'less']
      }
    }
  });

  let changed = [];
  var onChange = grunt.util._.debounce(function() {
    grunt.config('concat.default.src', changed);
    changed = [];
  }, 200);

  grunt.event.on('watch', function(action, filepath) {
    changed.push(filepath);
    onChange();
  });

  grunt.registerTask('default', ['concat', 'less', 'watch']);
};
