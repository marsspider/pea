
var gulp = require('gulp');
var sass = require('gulp-sass');
var neat = require('node-neat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var notify = require('gulp-notify');
var minifycss = require('gulp-minify-css');
var concat = require('gulp-concat');
var plumber = require('gulp-plumber');
var browserSync = require('browser-sync');
var reload = browserSync.reload;

gulp.task('sass', function () {
	gulp.src('assets/css/scss/*.scss')
	.pipe(plumber())
	.pipe(sass({
		includePaths: ['scss'].concat(neat)
	}))
	.pipe(gulp.dest('assets/css'))
	.pipe(rename({suffix: '.min', extname:'.css'}))
	.pipe(minifycss())
	.pipe(gulp.dest('assets/css'))
	.pipe(reload({stream:true}));
});

gulp.task('bs-reload', function () {
	browserSync.reload();
});

gulp.task('browser-sync', function() {
	browserSync.init(['assets/css/*.css'], {
		proxy: 'pea.dev'
		/*
		server: {
			baseDir: './'
		}
		*/
	});
});

gulp.task('default', ['sass', 'browser-sync'], function () {
	gulp.watch(['assets/css/scss/*.scss', 'assets/css/scss/**/*.scss'], ['sass'])
	gulp.watch(['views/*.php', 'views/**/*.php', 'lang/**/*'], ['bs-reload']);
});
