'use strict';

// Run some tasks in parallel to speed up build process

module.exports = {
    build: [
        'patterns'
    ],
    patterns: [
        'copy:vendor',
        'sass:dev',
        'sass:prod',
        'copy:patternsComponentImgs',
        'concat:js'
    ],
    test: [
        'newer:csslint',
        'newer:jshint',
        'newer:jscs'
    ]
};