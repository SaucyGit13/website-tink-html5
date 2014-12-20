'use strict';

// Validate files with JSHint

module.exports = {
    options: {
        jshintrc: '.jshintrc'
    },
    files: {
        src: [
            'Gruntfile.js',
            '<%= paths.src %>/<%= paths.patterns %>/components/**/*.js',
            '<%= paths.src %>/init.js'
        ]
    }
};