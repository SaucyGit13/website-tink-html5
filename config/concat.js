'use strict';

// Concatenates files

module.exports = {
    js: {
        src: [
            '<%= paths.src %>/<%= paths.patterns %>/<%= paths.vendor %>/contrib/jquery/dist/jquery.min.js',
            '<%= paths.src %>/<%= paths.patterns %>/<%= paths.vendor %>/custom/jquery.hide-show/jquery.hideShow.min.js',
            '<%= paths.src %>/<%= paths.patterns %>/<%= paths.vendor %>/custom/accessible-html5-video-player/js/px-video.js',
            '<%= paths.src %>/<%= paths.patterns %>/components/**/*.js',
            '<%= paths.src %>/init.js'
        ],
        dest: '<%= paths.dest %>/init.js'
    }
};