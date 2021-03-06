var gulp = require( 'gulp' ),
	watch = require( 'gulp-watch' ),
	uglify = require( 'gulp-uglify' ),
	rename = require( 'gulp-rename' ),
	imagemin = require('gulp-imagemin'),
	sass     = require('gulp-sass'),
	flatten  = require('gulp-flatten'),
	runSequence  = require('run-sequence'),
	cleanCSS = require('gulp-clean-css'),
	zip = require('gulp-zip'),
	wpPot = require('gulp-wp-pot'),
	potToPO = require('gulp-pottopo'),
	poToMo = require('gulp-potomo'),
	prettify = require('gulp-jsbeautifier');

var pluginPathName = 'wp-blog-templates';
var assetsPath = './assets';
var distBasePath = './dist';
var releaseBasePath = './RELEASE';
var langBasePath = './languages';
var distPath = {
	js : distBasePath + '/js',
	css : distBasePath + '/css',
	font : distBasePath + '/fonts',
	img : distBasePath + '/images',
	vendor : distBasePath + '/vendor'
};
var adminAssetsPath = './assets/admin';
var adminDistBasePath = './dist/admin';
var adminDistPath = {
	js : adminDistBasePath + '/js',
	css : adminDistBasePath + '/css',
	font : adminDistBasePath + '/fonts',
	img : adminDistBasePath + '/images'
};

var jsFiles = [
	assetsPath + '/js/*.js'
];

var cssFiles = [
	assetsPath + '/css/*.css'
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
	assetsPath + '/images/**'
];

var adminJsFiles = [
	adminAssetsPath + '/js/*.js'
];

var adminCssFiles = [
	adminAssetsPath + '/css/*.css'
];

var adminScssFiles = [
	adminAssetsPath + '/scss/*.scss',
	adminAssetsPath + '/scss/**/*.scss',
	adminAssetsPath + '/scss/**/**/*.scss',
];

var adminFontFiles = [
	adminAssetsPath + '/fonts/**'
];

var adminImgFiles = [
	adminAssetsPath + '/images/**'
];

var vendorFiles = [
	assetsPath + '/vendor/**'
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

// admin js minify
gulp.task( 'admin.js.min', function() {
	return gulp.src( adminJsFiles )
		.pipe( uglify() )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( gulp.dest( adminDistPath.js ) );
} );
// admin js
gulp.task( 'admin.js', function() {
	return gulp.src( adminJsFiles )
		.pipe(prettify({
			'indent_char' : '\t',
			'indent_size': 1,
			'space_in_paren' : true,
			'space_in_empty_paren' : false,
			'jslint_happy' : true,
			'space_after_anon_function' : true,
			'space_after_named_function' : true,
			'end_with_newline' : true
		}))
		.pipe( gulp.dest( adminDistPath.js ) );
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

// admin css minify
gulp.task('admin.css.min', function(){
	return gulp.src( adminCssFiles )
		.pipe(cleanCSS())
		.pipe( rename( { suffix: '.min' } ) )
		.pipe(gulp.dest( adminDistPath.css ));
});

// admin css
gulp.task('admin.css', function(){
	return gulp.src( adminCssFiles )
		.pipe(gulp.dest( adminDistPath.css ));
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


// admin scss minify
gulp.task('admin.scss.min', function(){
	return gulp.src( adminScssFiles )
		.pipe( sass({
			outputStyle: 'compressed'
		}))
		.pipe( rename( { suffix: '.min' } ) )
		.pipe(gulp.dest( adminDistPath.css ));
});

// admin scss
gulp.task('admin.scss', function(){
	return gulp.src( adminScssFiles )
		.pipe( sass({
			outputStyle: 'expanded'
		}))
		.pipe(gulp.dest( adminDistPath.css ));
});

// fonts
gulp.task('fonts', function(){
	return gulp.src( fontFiles )
		.pipe(flatten())
		.pipe(gulp.dest( distPath.font ));
});

// admin fonts
gulp.task('admin.fonts', function(){
	return gulp.src( adminFontFiles )
		.pipe(flatten())
		.pipe(gulp.dest( adminDistPath.font ));
});

// img
gulp.task('img', function(){
	return gulp.src(imgFiles)
		.pipe(imagemin({
			progressive: true,
			interlaced: true,
			svgoPlugins: [{removeUnknownsAndDefaults: false}, {cleanupIDs: false}]
		}))
		.pipe(gulp.dest( distPath.img ) ) ;
});

// admin img
gulp.task('admin.img', function(){
	return gulp.src(adminImgFiles)
		.pipe(imagemin({
			progressive: true,
			interlaced: true,
			svgoPlugins: [{removeUnknownsAndDefaults: false}, {cleanupIDs: false}]
		}))
		.pipe(gulp.dest( adminDistPath.img ) ) ;
});

// vendor
gulp.task('vendor', function(){
	return gulp.src( vendorFiles )
		.pipe(gulp.dest( distPath.vendor ));
});

// generate pot file
gulp.task('pot', function(){
	return gulp.src('./**/*.php')
        .pipe(wpPot({
            domain: 'wpbtpls'
        }))
        .pipe(gulp.dest(langBasePath + '/wpbtpls.pot'));
});

// generete po file
gulp.task('pot-to-po', function () {
    return gulp.src( langBasePath + '/*.pot')
        .pipe(potToPO({
			language : 'en_US'
        }))
        .pipe(gulp.dest(langBasePath));
});

// generete mo file
gulp.task('po-to-mo', function () {
    return gulp.src( langBasePath + '/*.po')
        .pipe(poToMo())
        .pipe(gulp.dest(langBasePath));
});

// translate plugin
gulp.task('translate', function( callback ) {
	runSequence(
		'pot',
		'pot-to-po',
		'po-to-mo',
		callback
	);
});

// clean the plugin files
gulp.task( 'pre-zip', function() {
	var files = [
		'!./package.json',
		'!./package-lock.json',
		'!./gulpfile.js',
		'!./assets{,/**}',
		'!./node_modules{,/**}',
		'!' + releaseBasePath + '{,/**}',
		'./**',
	]; 

	return gulp.src( files, { dot: false } ) // dot : false, ignore the hidden files 
		.pipe(gulp.dest( releaseBasePath + '/' + pluginPathName ));

} );

// clean the plugin files
gulp.task( 'zip', function() {
	return gulp.src( releaseBasePath + '/' + pluginPathName + '{,/**}')
		.pipe(zip( pluginPathName+'.zip' ))
		.pipe(gulp.dest( releaseBasePath ))

} );

gulp.task('clean', require('del').bind(null, [distBasePath,releaseBasePath,langBasePath]));

gulp.task('build', function(callback) {
	runSequence(
							[
								'js.min',
								'js',
								'admin.js.min',
								'admin.js',
								'css.min',
								'css',
								'admin.css.min',
								'admin.css',
								'scss.min',
								'scss',
								'admin.scss.min',
								'admin.scss',
								'fonts',
								'admin.fonts',
								'img',
								'admin.img',
								'vendor',
								'translate'
							],
							callback);
});

gulp.task( 'watch', function() {
	gulp.watch( jsFiles, [ 'js.min','js' ] )
	gulp.watch( adminJsFiles, [ 'admin.js.min','admin.js' ] )
	gulp.watch( cssFiles, [ 'css.min', 'css' ] )
	gulp.watch( adminCssFiles, [ 'admin.css.min', 'admin.css' ] )
	gulp.watch( scssFiles, [ 'scss.min', 'scss' ] )
	gulp.watch( adminScssFiles, [ 'admin.scss.min', 'admin.scss' ] )
	gulp.watch( fontFiles, [ 'fonts' ] )
	gulp.watch( adminFontFiles, [ 'admin.fonts' ] )
	gulp.watch( imgFiles, [ 'img' ] )
	gulp.watch( adminImgFiles, [ 'admin.img' ] )
	gulp.watch( vendorFiles, [ 'vendor' ] )

} );

gulp.task('default', ['clean'], function() {
	gulp.start('build');
	gulp.start('watch');
});

gulp.task('release', function( callback ) {
	runSequence(
		'clean',
		'build',
		'pre-zip',
		'zip',
		callback
	);
	
});