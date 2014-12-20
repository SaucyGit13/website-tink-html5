'use strict';

// Copies files to destination directory

module.exports = {
    assets: {
        files: [{
            expand: true,
            cwd: '<%= paths.src %>/<%= paths.assets %>',
            src: '**',
            dest: '<%= paths.dest %>/<%= paths.assets %>'
        }]
    },
    vendor: {
        files: [{
            expand: true,
            cwd: '<%= paths.src %>/<%= paths.patterns %>',
            src: [
                '<%= paths.vendor %>/custom/**'
            ],
            dest: '<%= paths.dest %>/<%= paths.assets %>'
        }]
    },
    patternsComponentImgs: {
        files: [{
            expand: true,
            flatten: true,
            cwd: '<%= paths.src %>/<%= paths.patterns %>/components',
            src: [
                '**/*.{png,jpg,gif}'
            ],
            dest: '<%= paths.dest %>/<%= paths.assets %>/img'
        }]
    }
};