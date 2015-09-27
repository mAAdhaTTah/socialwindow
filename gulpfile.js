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
      'bower_components/fastclick/lib/fastclick.js',      // Gets fastclick
      'bower_components/foundation/js/vendor/modernizr.js',   // Get Modernizer
      'bower_components/bigfoot/dist/bigfoot.js',   // Get Bigfoot
      'bower_components/velocity/velocity.js',   // Get Velocity
      // Gets Foundation JS
      'bower_components/foundation/js/foundation/foundation.js',
      'bower_components/foundation/js/foundation/foundation.abide.js',
      'bower_components/foundation/js/foundation/foundation.alert.js',
      'bower_components/foundation/js/foundation/foundation.clearing.js',
      'bower_components/foundation/js/foundation/foundation.equalizer.js',
      'bower_components/foundation/js/foundation/foundation.interchange.js',
      'bower_components/foundation/js/foundation/foundation.tooltip.js',
      'bower_components/foundation/js/foundation/foundation.topbar.js',
      // moving on...
      'assets/js/plugins/*.js',                                           // Gets all the user plugins
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
  gulp.task('copy',['copy-jquery', 'copy-fa']);

  gulp.task('copy-jquery', function(){
    return gulp.src('bower_components/jquery/dist/jquery.min.js')     // Gets Jquery
    .pipe(gulp.dest('assets/js/'))                        // Set destination to assets/js
    .pipe(notify('jQuery copied'));                        // Output to notification
  });

  gulp.task('copy-fa', function(){
    return gulp.src('bower_components/font-awesome/fonts/**')     // Gets font-awesome
    .pipe(gulp.dest('assets/fonts/'))                        // Set destination to assets/fonts
    .pipe(notify('Font-Awesome copied'));                        // Output to notification
  });
//
//    JS hint
//
//////////////////////////////////////////////////////////////////////
  gulp.task('jshint', function() {
    return gulp.src('assets/js/_*.js')
      .pipe(jshint())
      .pipe(notify(function (file) {
        if (file.jshint.success) {
          // Don't show something if success
          return false;
        }

        var errors = file.jshint.results.map(function (data) {
          if (data.error) {
            return "(" + data.error.line + ':' + data.error.character + ') ' + data.error.reason;
          }
        }).join("\n");
        return file.relative + " (" + file.jshint.results.length + " errors)\n" + errors;
      }));
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
  gulp.task('prebuild',['sass', 'jshint', 'javascripts', 'copy', 'imagemin', 'svgmin']);

  gulp.task('zip', ['prebuild'], function() {
    return gulp.src([
      '!**/.*',
      '!**/*.md',
      '!**/*.sublime*',
      '!node_modules/**',
      '!node_modules',
      '!bower_components/**',
      '!bower_components',
      '!assets/scss/**',
      '!assets/scss',
      '**/**',
    ]).pipe(zip('socialwindow.zip'))
      .pipe(gulp.dest('.'))
      .pipe(notify('Theme zip built'));
  });

  gulp.task('build',['zip'], function() {
      process.exit(0);
  });

  gulp.task('deploy', ['prebuild'], function() {
      process.exit(0);
  });

//
//    Default gulp task.
//
//////////////////////////////////////////////////////////////////////
gulp.task('watch', function(){
  var server = livereload();
  gulp.watch('**/*.php').on('change', function(file) {
    var parts = file.path.split('/');
    var name = parts[parts.length - 1];

    server.changed(file.path);
    gulp.src(file.path)
      .pipe(notify('PHP file changed' + ' (' + name + ')'));
  });

  gulp.watch("bower_components/foundation/scss/**/*.scss", ['sass']); // Runs sass on foundation components change
  gulp.watch("assets/scss/**/*.scss", ['sass']);                      // Watch and run sass on changes
  gulp.watch(["assets/js/_*.js", "assets/js/plugins/*.js"], ['jshint', 'javascripts']);           // Watch and run javascripts on changes
  gulp.watch("assets/img/*", ['imagemin', 'svgmin']);                 // Watch and minify images on changes

});

gulp.task('default', ['sass', 'jshint', 'javascripts', 'copy', 'watch']);
