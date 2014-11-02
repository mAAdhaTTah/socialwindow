var gulp = require('gulp');                        // Gulp!
var sass = require('gulp-sass');                   // Sass
var prefix = require('gulp-autoprefixer');         // Autoprefixr
var minifycss = require('gulp-minify-css');        // Minify CSS
var concat = require('gulp-concat');               // Concat files
var uglify = require('gulp-uglify');               // Uglify javascript
var svgmin = require('gulp-svgmin');               // SVG minify
var imagemin = require('gulp-imagemin');           // Image minify
var rename = require('gulp-rename');               // Rename files
var notify = require("gulp-notify");               // Alerting stuff
var livereload = require('gulp-livereload');       // LiveReload
var jshint = require('gulp-jshint');               // jshint
var zip = require('gulp-zip');                     // Zip up dist

//
//    Compile all CSS for the site
//
//////////////////////////////////////////////////////////////////////
  gulp.task('sass', function (){
    return gulp.src([
      'bower_components/foundation/scss/normalize.scss',         // Gets normalize
      'assets/scss/app.scss'])                                   // Gets the apps scss
      .pipe(sass({
        includePaths: require('node-bourbon').includePaths,
        style: 'compressed', errLogToConsole: true
      }))                                                        // Compile sass
      .pipe(concat('main.css'))                                  // Concat all css
      .pipe(rename({suffix: '.min'}))                            // Rename it
      .pipe(minifycss())                                         // Minify the CSS
      .pipe(gulp.dest('assets/css/'))                            // Set the destination to assets/css
      .pipe(livereload())                                        // Reloads server
      .pipe(notify('Sass compiled & minified'));                 // Output to notification
  });

//
//    Get all the JS, concat and uglify
//
//////////////////////////////////////////////////////////////////////
  gulp.task('javascripts', function(){
    return gulp.src([
      'bower_components/jquery/dist/jquery.min.js',     // Gets Jquery
      'bower_components/fastclick/lib/fastclick.js',      // Gets fastclick
      // Gets Foundation JS change to only include the scripts you'll need
      'bower_components/foundation/js/foundation/foundation.js',
      'bower_components/foundation/js/foundation/foundation.abide.js',
      'bower_components/foundation/js/foundation/foundation.alert.js',
      'bower_components/foundation/js/foundation/foundation.clearing.js',
      'bower_components/foundation/js/foundation/foundation.equalizer.js',
      'bower_components/foundation/js/foundation/foundation.interchange.js',
      'bower_components/foundation/js/foundation/foundation.tooltip.js',
      'bower_components/foundation/js/foundation/foundation.topbar.js',
      // moving on...
      'assets/js/_*.js'])                                                 // Gets all the user JS _*.js from assets/js
      .pipe(concat('scripts.js'))                                         // Concat all the scripts
      .pipe(rename({suffix: '.min'}))                                     // Rename it
      .pipe(uglify())                                                     // Uglify(minify)
      .pipe(gulp.dest('assets/js/'))                                      // Set destination to assets/js
      .pipe(livereload())                                                 // Reloads server
      .pipe(notify('Javascripts compiled and minified'));                 // Output to notification
  });

//
//    Copy bower components to assets-folder
//
//////////////////////////////////////////////////////////////////////
  gulp.task('copy', function(){
    return gulp.src('bower_components/modernizr/modernizr.js')   // Gets Modernizr.js
    .pipe(uglify())                                       // Uglify(minify)
    .pipe(rename({suffix: '.min'}))                       // Rename it
    .pipe(gulp.dest('assets/js/'))                        // Set destination to assets/js
    .pipe(notify('Files copied'));                        // Output to notification
  });

//
//    JS hint
//
//////////////////////////////////////////////////////////////////////
  gulp.task('jshint', function() {
    return gulp.src('assets/js/_*.js')
      .pipe(jshint())
      .pipe(jshint.reporter('jshint-stylish'));
  });

//
//    Minify all SVGs and images
//
//////////////////////////////////////////////////////////////////////
  gulp.task('svgmin', function() {
    return gulp.src('assets/img/*.svg')                          // Gets all SVGs
    .pipe(svgmin())                                       // Minifies SVG
    .pipe(gulp.dest('assets/img_min/'))                   // Set destination to assets/img_min/
    .pipe(notify('SVGs minified'));                        // Output to notification
  });

  gulp.task('imagemin', function () {
    return gulp.src(['assets/img/*', '!assets/img/*.svg'])        // Gets all images except SVGs
    .pipe(imagemin())                                      // Minifies
    .pipe(gulp.dest('assets/img_min/'))                    // Set destination to assets/img_min/
    .pipe(notify('Images minified'));                        // Output to notification
  });

//
//    Builds the theme into a .zip
//
//////////////////////////////////////////////////////////////////////
  gulp.task('zip',['sass', 'jshint', 'javascripts', 'copy'], function() {
    var server = livereload.listen();

    return gulp.src([
      '!**/.*',
      '!**/*.md',
      '!node_modules/**',
      '!node_modules',
      '!bower_components/**',
      '!bower_components',
      '!assets/scss/**',
      '!assets/scss',
      '**/**',
    ]).pipe(zip('theme.zip'))
      .pipe(gulp.dest('.'))
      .pipe(notify('Theme zip built'));
  });

  gulp.task('build',['zip'], function() {
      process.exit(0);
  });

//
//    Default gulp task.
//
//////////////////////////////////////////////////////////////////////
gulp.task('watch', function(){
  var server = livereload();
  gulp.watch('**/*.php').on('change', function(file) {
        server.changed(file.path);
        util.log(util.colors.yellow('PHP file changed' + ' (' + file.path + ')'));
    });

  gulp.watch("bower_components/foundation/scss/**/*.scss", ['sass']); // Runs sass on foundation components change
  gulp.watch("assets/scss/**/*.scss", ['sass']);                      // Watch and run sass on changes
  gulp.watch("assets/js/_*.js", ['jshint', 'javascripts']);           // Watch and run javascripts on changes
  gulp.watch("assets/img/*", ['imagemin', 'svgmin']);                 // Watch and minify images on changes

});

gulp.task('default', ['sass', 'jshint', 'javascripts', 'copy', 'watch']);
