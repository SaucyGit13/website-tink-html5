'use strict';

// Validate files with CSS Lint

module.exports =  {
    options: {
        csslintrc: '.csslintrc',
        formatters: [
            {
                id: 'text',
                dest: '<%= paths.temp %>/csslint-report.txt'
            }
        ]
    },
    files: {
        src: [
            '<%= paths.dest %>/theme.css',
            '<%= paths.dest %>/print.css'
        ]
    }
};