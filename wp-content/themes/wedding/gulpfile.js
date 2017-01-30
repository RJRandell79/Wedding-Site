'use strict';

var gulp = require( 'gulp' ),
	concat = require( 'gulp-concat' ),
	uglify = require( 'gulp-uglify' ),
	rename = require( 'gulp-rename' ),
	sass = require( 'gulp-sass' ),
	maps = require( 'gulp-sourcemaps' ),
	//uncss = require( 'gulp-uncss' ),
	cleanCss = require( 'gulp-cleancss' ),
	del = require( 'del' ),
	imgMin = require( 'gulp-imagemin' ),
	ignore = require( 'gulp-ignore' ),
	gutil = require( 'gulp-util' );

// Concatenate all js first
gulp.task("concatScripts", function(){
	return gulp.src([
		'/src/js/wedding_theme.js',
	])
	.pipe(maps.init())
	.pipe(concat('scripts.js'))
	.pipe(maps.write('./'))
	.pipe(gulp.dest('dist/js'));
});

// Minify the concatenated js file from the task above!
gulp.task('minifyScripts', ['concatScripts'], function(){
	return gulp.src('src/js/*.js')
	.pipe(uglify().on('error', gutil.log))
	.pipe(rename('wedding_scripts.min.js'))
	.pipe(gulp.dest('dist/js'));
});

// Compile SASS files
gulp.task('compileSass', function(){
	return gulp.src('./src/scss/*.scss')
	.pipe(maps.init())
	.pipe(sass())
	.pipe(maps.write('./'))
	.pipe(gulp.dest('dist/css'));
});

// Minify the compiled CSS file created in the task above!
gulp.task('minifyStyles', ['compileSass'], function(){
	return gulp.src('dist/css/*.css')
	.pipe(cleanCss({compatibility: 'ie8'}))
	.pipe(rename('wedding_theme.min.css'))
	.pipe(gulp.dest('dist/css'));
});

// Optimise all images
gulp.task('optimiseImages', function() {
	return gulp.src('src/images/**')
	.pipe(imgMin())
	.pipe(gulp.dest('dist/img'))
});

// Watched Files
gulp.task('watchFiles', function(){
	gulp.watch(['src/scss/*.scss', 'src/scss/**/*.scss'], ['minifyStyles']);
	gulp.watch(['src/js/*.js'], ['minifyScripts']);
});

// Clean directory before build
gulp.task('clean', function(){
	del(['dist/css/**']);
});

// Defined tasks
gulp.task('build', ['minifyScripts', 'minifyStyles', 'optimiseImages'], function(){
	return gulp.src(["src/css/styles*.css", "src/js/scripts.js", "fonts/**", "**.ico", "**.php", "**.md", "**.png"], { base: './' })
	.pipe(gulp.dest('dist'));
});

// use 'gulp serve' to watch any js or sass changes
gulp.task('serve', ['watchFiles']);

// use 'gulp' to basically build the whole app but also clean the dir
gulp.task('default', ['clean'], function(){
	gulp.start('build');
});
