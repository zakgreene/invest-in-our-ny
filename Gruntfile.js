module.exports = function(grunt) {

    // Load the tasks
    // grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            options: {
                // cssmin will minify later
                style: 'expanded',
                sourcemap: 'auto'
            },
            dist: {
                files: {
                    'assets/css/main.css': 'assets/scss/main.scss' // 'destination': 'source'
                }
            }
        },
        autoprefixer: {
            options: {
                browsers: ['last 2 version'],
                map: true
            },
            multiple_files: {
                expand: true,
                flatten: true,
                src: 'assets/css/*.css',
                dest: 'assets/css/'
            }
        },
        cssmin: {
            combine: {
                files: [{
                    expand: true,
                    cwd: 'assets/css',
                    src: ['*.css', '!*.min.css'],
                    dest: 'assets/css',
                    ext: '.min.css'
                }]
            }
        },
        watch: {
            options: {
                livereload: false,
            },
            // scripts: {
            //     files: ['assets/javascripts/*.js', 'assets/javascripts/**/*.js'],
            //     tasks: ['concat'],
            //     options: {
            //       //spawn: false,
            //     }
            // },
            css: {
                files: ['assets/scss/*.scss', 'assets/scss/**/*.scss'],
                tasks: ['sass', 'autoprefixer', 'cssmin'],
                options: {
                  //spawn: false,
                }
            }
        }
    });

    grunt.registerTask('default', ['sass', 'autoprefixer', 'cssmin']); //'concat', 'svgmin', 'svgstore', 'svg2png'

};