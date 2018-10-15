var gulp = require( 'gulp' ),
	watch = require( 'gulp-watch' ),
	stylish = require( 'jshint-stylish' ),
	uglify = require( 'gulp-uglify' ),
	rename = require( 'gulp-rename' ),
	imagemin = require('gulp-imagemin'),
	sass     = require('gulp-sass'),
	flatten  = require('gulp-flatten'),
	runSequence  = require('run-sequence'),
	cleanCSS = require('gulp-clean-css');

var assetsPath = './assets';
var distBasePath = './dist';
var distPath = {
	js : distBasePath + '/js',
	css : distBasePath + '/css',
	font : distBasePath + '/fonts',
	img : distBasePath + '/img'
};

var jsFiles = [
	assetsPath + '/js/*.js',
	assetsPath + '/vendor/**/**/*.js'
];

var cssFiles = [
	assetsPath + '/css/*.css',
	assetsPath + '/vendor/**/**/*.css'
];

var scssFiles = [
	assetsPath + '/scss/*.scss',
	assetsPath + '/scss/**/*.scss',
	assetsPath + '/scss/**/**/*.scss',
];

var fontFiles = [
	assetsPath + '/fonts/**'
];

var imgFiles = [
	assetsPath + '/images/**',
	assetsPath + '/vendor/**/images/*'
];

// js minify
gulp.task( 'js.min', function() {
	return gulp.src( jsFiles )
		.pipe( uglify() )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( gulp.dest( distPath.js ) );
} );
// js
gulp.task( 'js', function() {
	return gulp.src( jsFiles )
		.pipe( gulp.dest( distPath.js ) );
} );

// css minify
gulp.task('css.min', function(){
	return gulp.src( cssFiles )
		.pipe(cleanCSS())
		.pipe( rename( { suffix: '.min' } ) )
		.pipe(gulp.dest( distPath.css ));
});

// css
gulp.task('css', function(){
	return gulp.src( cssFiles )
		.pipe(gulp.dest( distPath.css ));
});


// scss minify
gulp.task('scss.min', function(){
	return gulp.src( scssFiles )
		.pipe( sass({
			outputStyle: 'compressed'
		}))
		.pipe( rename( { suffix: '.min' } ) )
		.pipe(gulp.dest( distPath.css ));
});

// scss
gulp.task('scss', function(){
	return gulp.src( scssFiles )
		.pipe( sass({
			outputStyle: 'expanded'
		}))
		.pipe(gulp.dest( distPath.css ));
});


// fonts
gulp.task('fonts', function(){
	return gulp.src( fontFiles )
		.pipe(flatten())
		.pipe(gulp.dest( distPath.font ));
});

// scss
gulp.task('img', function(){
	return gulp.src(imgFiles)
		.pipe(imagemin({
			progressive: true,
			interlaced: true,
			svgoPlugins: [{removeUnknownsAndDefaults: false}, {cleanupIDs: false}]
		}))
		.pipe(gulp.dest( distPath.img ) ) ;
});

gulp.task('clean', require('del').bind(null, [distBasePath]));

gulp.task('build', function(callback) {
	runSequence('js.min',
							'js',
							'css.min',
							'css',
							'scss.min',
							'scss',
							'fonts',
							'img',
							callback);
});

gulp.task( 'watch', function() {
	gulp.watch( jsFiles, [ 'js.min','js' ] )
	gulp.watch( cssFiles, [ 'css.min', 'css' ] )
	gulp.watch( scssFiles, [ 'scss.min', 'scss' ] )
	gulp.watch( fontFiles, [ 'fonts' ] )
	gulp.watch( imgFiles, [ 'img' ] )

} );

gulp.task('default', ['clean'], function() {
	gulp.start('build');
	gulp.start('watch');
});