'use strict';

// Checks JavaScript code style with jscs

module.exports = {
    options: {
        config: '.jscsrc'
    },
    files: {
        src: [
            'Gruntfile.js',
            '<%= paths.src %>/<%= paths.patterns %>/components/**/*.js',
            '<%= paths.src %>/init.js'
        ]
    }
};