// Load plugins
var gulp = require('gulp')
var watch = require('gulp-watch')
var autoprefix = require('gulp-autoprefixer')
var sass = require('gulp-sass')
var sourcemaps = require('gulp-sourcemaps')
var notify = require('gulp-notify')
var plumber = require('gulp-plumber')

// Task that compiles scss files down to good old css
gulp.task('pre-process', function () {
  var onError = function (err) {
    notify.onError({
      title: 'Gulp',
      subtitle: 'Failure',
      message: 'Error: <%= error.message %>',
      sound: 'Beep'
    })(err)

    this.emit('end')
  }

  gulp.src('./styles/sass/global.scss')
    .pipe(plumber({errorHandler: onError}))
    .pipe(sourcemaps.init())
    .pipe(sass({ style: 'expanded' }))
    .pipe(autoprefix())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('styles/css'))
    .pipe(notify({ // Add gulpif here
      title: 'Gulp',
      subtitle: 'Sass',
      message: 'Success'
    }))
})

gulp.task('default', ['pre-process'], function () {
  gulp.watch('styles/sass/**/*.scss', ['pre-process'])
})
