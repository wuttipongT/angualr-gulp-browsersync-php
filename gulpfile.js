//npm install gulp gulp-sass gulp-livereload express --save-dev
//https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei
var gulp = require('gulp'),
    connect = require('gulp-connect-php'),
    browserSync = require('browser-sync'),
    livereload = require('gulp-livereload');

// gulp.task('connect-sync', function() {
//   connect.server({
//       base: './src',
//       bin:'C:/MAMP/bin/php/php5.6.0/php', 
//       ini: 'C:/MAMP/conf/php5.6.0/php.ini',
//       open: false
//   }, function (){
//     browserSync({
//       proxy: '127.0.0.1:8000'
//     });
//   });
 
//   gulp.watch('**/*.php').on('change', function () {
//     browserSync.reload();
//   });
// });

gulp.task('serve', function() {
  connect.server({
    base: './src',
    bin:'C:/MAMP/bin/php/php5.6.0/php', 
    ini: 'C:/MAMP/conf/php5.6.0/php.ini',
    open: true,
  });
});

gulp.task('php', function() {
  gulp.src('**/*.php')
    .pipe(livereload());
});

// gulp.task('sass', function() {
//   gulp.src('app/styles/*.sass')
//     .pipe(sass({
//       includePaths: ['app/styles'],
//       indentedSyntax : true,
//       errLogToConsole: true
//     }))
//     .pipe(gulp.dest('app/css'))
//     .pipe(livereload());
// });

// gulp.task('serve', function(done) {
//   var express = require('express');
//   var app = express();
//   app.use(express.static(__dirname + '/app'));
//   app.listen(4000, function () {
//      done();
//   });
// });

// gulp.task('html', function() {
//   gulp.src('app/**/*.html')
//     .pipe(livereload());
// });

gulp.task('watch', function() {
  //gulp.watch('app/styles/*.sass', ['sass']);
  gulp.watch('**/*.php', ['php']);
  livereload.listen();
});

gulp.task('default', ['watch','serve'], function(){

});