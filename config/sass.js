'use strict';

// Compiles SCSS to CSS

module.exports = {
    dev: {
        options: {
            style: 'expanded'
        },
        files: {
            '<%= paths.dest %>/theme.css': ['<%= paths.src %>/theme.scss'],
            '<%= paths.dest %>/print.css': ['<%= paths.src %>/print.scss']
        }
    },
    prod: {
        options: {
            sourcemap: 'none',
            style: 'compressed'
        },
        files: {
            '<%= paths.dest %>/theme.min.css': ['<%= paths.src %>/theme.scss'],
            '<%= paths.dest %>/print.min.css': ['<%= paths.src %>/print.scss']
        }
    }
};