'use strict';

// Watches files for changes and runs tasks based on the changed files

module.exports = {
    options: {
        debounceDelay: 250,
        livereload: '<%= ports.livereload %>',
        spawn: false
    },
    gruntfile: {
        files: 'Gruntfile.js',
        tasks: [
            'newer:jshint',
            'newer:jscs'
        ]
    },
    assets: {
        files: [
            '<%= paths.src %>/<%= paths.assets %>/**/*'
        ],
        tasks: [
            'newer:copy:assets'
        ]
    },
    vendor: {
        files: [
            '<%= paths.src %>/<%= paths.patterns %>/<%= paths.vendor %>/**',
            '!<%= paths.src %>/<%= paths.patterns %>/<%= paths.vendor %>/_vendor.scss'
        ],
        tasks: [
            'newer:copy:vendor'
        ]
    },
    scss: {
        files: [
            '<%= paths.src %>/**/*.scss'
        ],
        tasks: [
            'sass:dev',
            'sass:prod',
            'csslint'
        ]
    },
    patternsComponentImg: {
        files: [
            '<%= paths.src %>/<%= paths.patterns %>/components/**/*.{png,jpg,gif}'
        ],
        tasks: [
            'newer:copy:patternsComponentImgs'
        ]
    },
    patternsJs: {
        files: [
            '<%= paths.src %>/<%= paths.patterns %>/components/**/*.js',
            '<%= paths.src %>/init.js'
        ],
        tasks: [
            'concat:js',
            'uglify:patterns',
            'newer:jshint',
            'newer:jscs'
        ]
    }
};