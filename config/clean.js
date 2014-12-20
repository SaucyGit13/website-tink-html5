'use strict';

// Empties folders to start fresh

module.exports = {
    options: {
        force: true
    },
    assets: [
        '<%= paths.dest %>/<%= paths.assets %>'
    ],
    patterns: [
        '<%= paths.dest %>/<%= paths.patterns %>'
    ],
    vendor: [
        '<%= paths.dest %>/<%= paths.assets %>/<%= paths.vendor %>'
    ],
    dest: [
        '<%= paths.dest %>'
    ]
};