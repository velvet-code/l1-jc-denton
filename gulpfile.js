// Load plugins
var gulp = require('gulp')
var watch = require('gulp-watch')
var autoprefix = require('gulp-autoprefixer')
var sass = require('gulp-sass')
var sourcemaps = require('gulp-sourcemaps')
var notify = require('gulp-notify')
var plumber = require('gulp-plumber')
var svgSprite = require('gulp-svg-sprite')

// Task that compiles scss files down to good old css
gulp.task('pre-process', async function () {
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

gulp.task('default', gulp.series('pre-process'), async function () {
  gulp.watch('styles/sass/**/*.scss', ['pre-process'])
})


/**
 * Icons
 */

var svgSpriteConfig = {
  // Compile a single `icons.svg` file, with each icon asset included as a
  // <symbol> therein.
  mode: {
    symbol: {
      dest: '',
      sprite: 'icons.svg'
    }
  },

  shape: {
    // Include titles and descriptions from this file.
    meta: 'images/icons/src/icons.yaml',
    // Append `-icon` to ID names to avoid conflicts if polyfill injects sprite
    // directly into the document.
    id: {
      generator: '%s-icon'
    }
  }
};

gulp.task('build-svg-sprite', function () {
  return gulp.src('images/icons/src/**/*.svg')
    .pipe(svgSprite(svgSpriteConfig))
    .pipe(gulp.dest('images/icons/dist'))
});
