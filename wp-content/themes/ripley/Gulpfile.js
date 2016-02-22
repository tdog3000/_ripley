'use strict';


/* --------------------------
# Dependencies
---------------------------*/

    var gulp     = require('gulp'), 
    sass         = require('gulp-sass') ,
    autoprefixer = require('gulp-autoprefixer'),
    notify       = require('gulp-notify'),
    concat       = require('gulp-concat'),
    rename       = require('gulp-rename'),
    uglify       = require('gulp-uglify');
     

/* --------------------------
# Configuration
---------------------------*/

var config = {
     sassPath: './sass',
     bowerDir: './bower_components' ,
    jsPath: './js'
}

/* --------------------------
# Sass Compilation
---------------------------*/

gulp.task('sass', function () {
    return gulp.src(config.sassPath + '/**/*.scss')
         .pipe(sass({
             style: 'expanded',
 
            includePaths: [
                 config.sassPath,
                config.bowerDir + '/bourbon/app/assets/stylesheets',
                 config.bowerDir + '/foundation-sites/scss',
                config.bowerDir + '/loaders.css/src',
             ],

         }) 
        .on("error", notify.onError(function (error) {
             return "Error: " + error.message;
         })))
        .pipe(autoprefixer({
          browsers: ['last 2 versions', 'ie >= 9']
        })) 
        .pipe(gulp.dest('.')); 
});

gulp.task('sass-admin', function () {
    return gulp.src(config.sassPath + '/admin/*.scss')
         .pipe(sass({
             style: 'expanded',
         }) 
        .on("error", notify.onError(function (error) {
             return "Error: " + error.message;
         }))) 
        .pipe(gulp.dest('./css')); 
});

/* --------------------------
# Watch Tasks
---------------------------*/

gulp.task('watch', function() {

    // Watch the input folder for change,
    // and run `sass` task when something happens
    gulp.watch( 'sass/**/*.scss', ['sass'])
    // When there is a change,
    // log a message in the console
    .on('change', function(event) {
      console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });

});

/* --------------------------
# Scripts
---------------------------*/

gulp.task('scripts', function(){

    var jsScripts = [ 
        config.jsPath + '/app.js'
    ];

    return gulp.src( jsScripts )
        .pipe( concat( 'global.min.js' ) )
        .pipe( uglify() )
        .pipe( gulp.dest( config.jsPath ) )
        .pipe(notify({ message: 'Finished minifying JavaScript'}));
});

gulp.task( 'scripts-foundation', function(){

    var foundationScripts = [
        config.bowerDir + '/foundation-sites/js/foundation.core.js',
        config.bowerDir + '/foundation-sites/js/foundation.util.box.js',
        config.bowerDir + '/foundation-sites/js/foundation.util.mediaQuery.js',
        config.bowerDir + '/foundation-sites/js/foundation.tooltip.js',
        config.bowerDir + '/foundation-sites/js/foundation.dropdownMenu.js',
        config.bowerDir + '/foundation-sites/js/foundation.util.keyboard.js',
        config.bowerDir + '/foundation-sites/js/foundation.util.nest.js',
        config.bowerDir + '/what-input/what-input.min.js'
    ];

    return gulp.src( foundationScripts )
        .pipe( concat( 'vendor.min.js' ) )
        //.pipe( uglify() )
        .pipe( gulp.dest( config.jsPath ) )
        .pipe( notify({ message: 'Finished minifying Foundation Scripts'}) );

});


/* --------------------------
# Tasks
---------------------------*/

gulp.task( 'build', [ 'sass', 'sass-admin', 'scripts', 'scripts-foundation' ] );
gulp.task( 'default', [ 'sass','watch' ]);