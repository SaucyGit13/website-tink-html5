'use strict';

// Updates version numbers in files

module.exports = {
    release: {
        options: {
            prefix: '@version:\\s+[\'"]'
        },
        src: [
            '<%= paths.src %>/init.js',
            '<%= paths.src %>/theme.scss',
            '<%= paths.src %>/print.scss',
            'style.css'
        ]
    }
};