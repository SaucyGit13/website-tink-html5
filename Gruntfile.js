'use strict';

module.exports = function(grunt) {
    // Load grunt tasks automatically
    require('load-grunt-tasks')(grunt);

    // Time how long tasks take. Can help when optimizing build times
    require('time-grunt')(grunt);

    // Project settings
    var options = {
        // Configurable ports
        ports: {
            livereload: 35729,
            server: 9001
        },
        // Configurable paths
        paths: {
            'src': 'src',
            'dest': 'dist',
            'temp': '.tmp',
            // Assets path
            'assets': 'assets',
            // patterns paths
            'patterns': 'patterns',
            'vendor': 'vendor'
        }
    };

    // Load grunt configurations automatically
    var configs = require('load-grunt-configs')(grunt, options);

    // Define the configuration for all the tasks
    grunt.initConfig(configs);

    grunt.registerTask('default', 'watch', function() {
    /**
     * Defaut task
     * $ grunt
     */
        grunt.task.run([
            'watch'
        ]);
    });

    grunt.registerTask('build', 'Build all files', function() {
    /**
     * Build all files
     * $ grunt build
     */
        grunt.log.subhead('# => Running build!');

        grunt.task.run([
            'clean:dest',
            'assets',
            'version:release',
            'concurrent:build',
            'imagemin',
            'test'
        ]);
    });

    grunt.registerTask('assets', 'Build assets', function() {
    /**
     * Build assets
     * $ grunt assets
     */
        grunt.log.subhead('# => Building assets...');

        grunt.task.run([
            'clean:assets',
            'copy:assets'
        ]);
    });

    grunt.registerTask('patterns', 'Build patterns', function() {
    /**
     * Build patterns
     * $ grunt patterns
     */
        grunt.log.subhead('# => Building patterns...');

        grunt.task.run([
            'clean:patterns',
            'clean:vendor',
            'concurrent:patterns',
            'uglify:patterns'
        ]);
    });

    grunt.registerTask('test', 'Test HTML, CSS and JavaScript', function() {
    /**
     * Test code
     * $ grunt test
     */
        grunt.log.subhead('# => Running tests...');

        grunt.task.run([
            'concurrent:test',
            'parker'
        ]);
    });
};