//{{{ Configuration
var pkg   = require('./package.json');
var paths = {
  fe_styles: {
    src      : "./app/assets/stylesheets/frontend",
    dest     : "./public/assets/css",
    files    : '/**/*.scss',
    mainfile : '/main.scss'
  },
  fe_scripts: {
    src   : "./app/assets/javascripts/frontend",
    dest  : "./public/assets/js",
    files : '/**/*.js'
  },
  be_styles: {
    src      : "./app/assets/stylesheets/backend",
    dest     : "./public/assets/css",
    files    : '/**/*.scss',
    mainfile : '/main.scss'
  },
  be_scripts: {
    src   : "./app/assets/javascripts/backend",
    dest  : "./public/assets/js",
    files : '/**/*.js'
  },
  apps: {
    files : './app/**/*.php'
  }
};
//}}}

//{{{ Plugins used
var gulp         = require('gulp');

// regular usage
var concat       = require('gulp-concat');
var rename       = require('gulp-rename');
var clean        = require('gulp-clean');
var size         = require('gulp-size');
var livereload   = require('gulp-livereload');

// for sass
var sass         = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

// for scripts
var uglify       = require('gulp-uglify');
var jshint       = require('gulp-jshint');
//}}}

//{{{ frontend styles
gulp.task('fe_sass', function() {
  return gulp.src(paths.fe_styles.src + paths.fe_styles.mainfile)
              // .pipe(concat( pkg.name + '.scss' ))
              .pipe(sass({
                outputStyle: 'compressed',
                includePahts: [paths.fe_styles.src]
              }))
              .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
              .pipe(size())
              .pipe(rename( pkg.name + '_fe.min.css' ))
              .pipe(gulp.dest(paths.fe_styles.dest))
              .pipe(livereload());
});
//}}}

//{{{ backend styles
gulp.task('be_sass', function() {
  return gulp.src(paths.be_styles.src + paths.be_styles.mainfile)
              // .pipe(concat( pkg.name + '.scss' ))
              .pipe(sass({
                outputStyle: 'compressed',
                includePahts: [paths.be_styles.src]
              }))
              .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
              .pipe(size())
              .pipe(rename( pkg.name + '_be.min.css' ))
              .pipe(gulp.dest(paths.be_styles.dest))
              .pipe(livereload());
});
//}}}

//{{{ frontend scripts
gulp.task('fe_js', function() {
  return gulp.src(paths.fe_scripts.src + paths.fe_scripts.files)
              .pipe(jshint('.jshintrc'))
              .pipe(jshint.reporter('default'))
              .pipe(concat( pkg.name + '_fe.js' ))
              .pipe(rename({ suffix: '.min' }))
              .pipe(uglify())
              .pipe(size())
              .pipe(gulp.dest(paths.fe_scripts.dest))
              .pipe(livereload());
});
//}}}

//{{{ backend scripts
gulp.task('be_js', function() {
  return gulp.src(paths.be_scripts.src + paths.be_scripts.files)
              .pipe(jshint('.jshintrc'))
              .pipe(jshint.reporter('default'))
              .pipe(concat( pkg.name + '_be.js' ))
              .pipe(rename({ suffix: '.min' }))
              .pipe(uglify())
              .pipe(size())
              .pipe(gulp.dest(paths.be_scripts.dest))
              .pipe(livereload());
});
//}}}

//{{{ clean
gulp.task('clean', function() {
  return gulp.src([paths.fe_styles.dest,
                  paths.fe_scripts.dest,
                  paths.be_styles.dest,
                  paths.be_scripts.dest], { read: false })
              .pipe(clean());
});
//}}}

//{{{ default
gulp.task('default', ['clean'], function() {
  gulp.start('fe_sass', 'fe_js', 'be_sass', 'be_js');
});
//}}}

//{{{ watch
gulp.task('watch', function () {
  gulp.watch( paths.fe_styles.src + paths.fe_styles.files, ['fe_sass']);
  gulp.watch( paths.be_styles.src + paths.be_styles.files, ['be_sass']);
  gulp.watch( paths.fe_scripts.src + paths.fe_scripts.files, ['fe_js']);
  gulp.watch( paths.be_scripts.src + paths.be_scripts.files, ['be_js']);

  var server = livereload();
  gulp.watch(paths.apps.files).on('change', function (file) {
    server.changed(file.path);
  });
});
//}}}
