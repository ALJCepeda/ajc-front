module.exports = function(grunt) {
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-mkdir');
  grunt.loadNpmTasks('grunt-vueify');

  let lessFiles = [
    'less/variables.less',
    'less/home.less',
    'less/index.less'
  ];

  let staticFiles = [
    'vue/dist/vue.js',
    'bluebird/js/browser/bluebird.js',
    'jquery/dist/jquery.js',
    'materialize-css/dist/css/materialize.css',
    'materialize-css/dist/js/materialize.js',
    'slick-carousel/slick/slick.css',
    'slick-carousel/slick/slick-theme.css',
    'slick-carousel/slick/slick.js',
    'slick-carousel/slick/ajax-loader.gif',
    'requirejs/require.js',
    'vueify/lib/insert-css.js'
  ];

  let fonts = [
    'slick-carousel/slick/fonts/**',
    'materialize-css/dist/fonts/**'
  ];

  grunt.initConfig({
    clean: [ 'public/libs/**' ],
    mkdir: {
      default: {
        options: {
          mode:0755,
          create:['public/libs/fonts', 'public/fonts' ]
        }
      }
    },
    copy: {
      default: {
        files: [{
          expand: true,
          flatten:true,
          cwd:'node_modules',
          src:staticFiles,
          dest:'public/libs/'
        }, {
          expand: true,
          flatten:true,
          src:'node_modules/materialize-css/dist/fonts/roboto/**.* ',
          dest:'public/fonts/roboto/'
        }, {
          expand: true,
          flatten:true,
          src:'node_modules/slick-carousel/slick/fonts/**.* ',
          dest:'public/libs/fonts/'
        }]
      }
    },
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
    vueify: {
      default: {
        files: [{
          expand: true,
          cwd:'components',
          src: '**/*.vue',
          dest: 'public/components',
          ext: '.vue.js'
        }]
      }
    },
    watch: {
      default: {
        files:lessFiles,
        tasks: ['concat', 'less']
      }
    }
  });

  grunt.registerTask('default', ['clean', 'mkdir', 'copy', 'concat', 'less', 'watch']);
};
