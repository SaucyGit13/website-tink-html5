'use strict';

// Minifies files with UglifyJS

module.exports = {
    options: {
        //mangle: false,
        preserveComments: 'some'
    },
    patterns: {
        files: {
            '<%= paths.dest %>/init.min.js': ['<%= paths.dest %>/init.js']
        }
    }
};