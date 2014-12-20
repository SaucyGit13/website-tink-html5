'use strict';

// Produces minified images in the destination folder

module.exports = {
    options: {
        optimizationLevel : 7
    },
    files: {
        expand: true,
        cwd: '<%= paths.dest %>/<%= paths.assets %>/img',
        src: [
            '**/*.{png,jpg,gif}'
        ],
        dest: '<%= paths.dest %>/<%= paths.assets %>/img'
    }
};