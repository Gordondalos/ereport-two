'use strict';

/* Node plugins */
var gulp 		= require('gulp'),					// Пакетный сборщик
	concat      	= require('gulp-concat'),			// Конкатинация содержимого файлов
	debug       	= require('gulp-debug'),	 		// Дебаггер
	googlefonts 	= require('gulp-google-webfonts'),	// Подгрузка Google Fonts
	preprocess  	= require('gulp-preprocess'),
	plumber     	= require('gulp-plumber'),
	gutil      	 	= require('gulp-util'),				// Утилиты
	watch 			= require('gulp-watch'),			// Наблюдатели
	prefixer 		= require('gulp-autoprefixer'), 	// Префиксы
	uglify 			= require('gulp-uglify'),
	sass 			= require('gulp-sass'),				// Компилятор SASS
	sourcemaps 		= require('gulp-sourcemaps'),
	rename      	= require('gulp-rename'),			// Переименование директорий/файлов
	rigger 			= require('gulp-rigger'),
	cssmin 			= require('gulp-cssnano'),			// Сжимает CSS
	jscs        	= require('gulp-jscs'),				// Проверка JS кода
	notify      	= require('gulp-notify'),
	zip         	= require('gulp-zip'),				// Сжатие файлов в ZIP
	rimraf 			= require('rimraf'),				// Удаляет папку/файлы
	Imagemin 		= require('imagemin'),				// Оптимизация изображений
	runSequence 	= require('run-sequence'),			// Последовательное выполнение тасков
	requireDir 		= require('require-dir'),			// Вложенные директории
	browserSync 	= require("browser-sync"),			// Синхронизация с браузером
	reload 			= browserSync.reload;				// Обновление содержимого браузера


// Development сборка: npm start 
// 	Сборка HTML [Шаблонизатор: Jade]
// 	Сборка CSS 	[Препроцессор: SASS, Префиксер: Autoprefixer]
// 	Сборка JS   [Проверка качества кода: jsHint]
// 	Графика		[Оптимизатор: Imagemin]
// 	

// Production сборка: gulp build
// 


/* PHP FILES */
var phpFiles = [
	'*.php',
	'inc/*.php',
	'inc/*/*.php',
	'config/*.php',
	'page-templates/*.php',
	'partials/*.php',
];

/* PHP OPTIONS */
var phpOptions = {
	bin:        './vendor/bin/phpcs',
	standard:   './codesniffer.ruleset.xml',
	colors:     true,
};

/* PATH */
var path = {

	/* SRC */
	src: {
		// superlative
		sass_superlative:  ['src/sass/main.scss','node_modules/font-awesome/scss/font-awesome.scss'],
		fonts_superlative: ['src/fonts/**/*.*',
			'node_modules/font-awesome/fonts/**/*.{otf,eot,svg,ttf,woff,woff2}',
			'node_modules/roboto-fontface/fonts/**/*.{otf,eot,svg,ttf,woff,woff2}'],
		fontsGoogle_superlative:   'src/*.css',
		html_superlative:  'src/*.html',
		icons_superlative: 'src/icons/**/*.{gif,jpg,png}',
		img_superlative:   'src/img/**/*.{gif,jpg,png}',
		js_superlative:   ['src/js/clipboard.min.js',
			'src/js/prettify.js',
			'src/js/main.js',
			'node_modules/jquery/dist/jquery.min.js',
			'node_modules/tether/dist/js/tether.min.js',
			'node_modules/bootstrap/dist/js/bootstrap.min.js'],
	},

	/* BUILD */
	build: {
		// superlative
		sass_superlative:   'web/css/',
		fonts_superlative:  'web/fonts/',
		fontsGoogle_superlative:   'web/css/',
		html_superlative:   'web/',
		icons_superlative:  'web/icons/',
		img_superlative:    'web/img/',
		js_superlative:     'web/js/',
		sites_superlative:  'web/sites/',
	},

	/* WATCH */
	watch: {
		// superlative
		fonts_superlative:  'src/fonts/**/*.*',
		fontsGoogle_superlative:  'src/*.css',
		html_superlative: 	'src/**/*.html',
		icons_superlative:  'src/icons/**/*.*',
		img_superlative:    'src/img/**/*.*',
		js_superlative: 	'src/js/**/*.js',
		sass_superlative: 	'src/sass/**/*.*',
	},

	/* CLEAN */
	clean: './web/css',
};

/* SASS SUPERLATIVE */
gulp.task('sass_superlative:build', function (callback) {
	gulp.src(path.src.sass_superlative)
		.pipe(preprocess({context: { NODE_ENV: 'production', DEBUG: true }}))
		.pipe(debug())
		.pipe(sourcemaps.init())
		.pipe(plumber())
		.pipe(sass({
			requireDir: ['src/sass',
				'node_modules/font-awesome/scss',
				'node_modules/bootstrap/scss'],
			outputStyle: 'compressed',
			sourceMap: true,
			errLogToConsole: true }))
		.on("error", notify.onError(function (error) {
			return "Error: " + error.message; }))
		//.pipe(prefixer())
		.pipe(cssmin())
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(path.build.sass_superlative))
		.pipe(reload({ stream: true }));
	callback();
});

/* FONTS SUPERLATIVE */
gulp.task('fonts_superlative:build', function (callback) {
	gulp.src(path.src.fonts_superlative)
		.pipe(preprocess({context: { NODE_ENV: 'production', DEBUG: true }}))
		.pipe(debug())
		.pipe(gulp.dest(path.build.fonts_superlative));
	callback();
});

/* HTML SUPERLATIVE */
gulp.task('html_superlative:build', function (callback) {
	gulp.src(path.src.html_superlative)
		.pipe(rigger())
		.pipe(preprocess({context: { NODE_ENV: 'production', DEBUG: true }}))
		.pipe(debug())
		.pipe(gulp.dest(path.build.html_superlative))
		.pipe(reload({ stream: true }));
	callback();
});

/* ICONS SUPERLATIVE */
gulp.task('icons_superlative:build', function (callback) {
	new Imagemin()
		.src(path.src.icons_superlative)
		.dest(path.build.icons_superlative)
		.use(Imagemin.jpegtran({progressive: true}))
		.run(function (err, files) {
			debug()
		});
	callback();
});

/* IMAGES SUPERLATIVE */
gulp.task('img_superlative:build', function (callback) {
	new Imagemin()
		.src(path.src.img_superlative)
		.dest(path.build.img_superlative)
		.use(Imagemin.jpegtran({ progressive: true}))
		.run(function (err, files) {
			// console.log(files[0]);
		});
	callback();
});

/* JS SUPERLATIVE */
gulp.task('js_superlative:build', function (callback) {
	gulp.src(path.src.js_superlative)
		.pipe(rigger())
		.pipe(sourcemaps.init())
		.pipe(sourcemaps.write())
		.pipe(uglify())
		.pipe(preprocess({context: { NODE_ENV: 'production', DEBUG: true }}))
		.pipe(debug())
		.pipe(gulp.dest(path.build.js_superlative))
		.pipe(reload({stream: true}));
	callback();
});

/* FONT GOOGLE SUPERLATIVE */
gulp.task('fontsGoogle_superlative:build', function (callback) {
	gulp.src(path.src.fontsGoogle_superlative)
		.pipe(googlefonts())
		.pipe(preprocess({context: { NODE_ENV: 'production', DEBUG: true }}))
		.pipe(debug())
		.pipe(gulp.dest(path.build.fontsGoogle_superlative))
		.pipe(reload({stream: true}));
	callback();
});

/* #################### START WATCHERS #################### */

gulp.task('watch', function() {
	// sass superlative
	watch([path.watch.sass_superlative], function(event, cb) {
		gulp.start('sass_superlative:build');
		console.log('SASS [superlative] updated.');
	});
	// html superlative
	watch([path.watch.html_superlative], function(event, cb) {
		gulp.start('html_superlative:build');
		console.log('HTML [superlative] updated.');
	});
	// js superlative
	watch([path.watch.js_superlative], function(event, cb) {
		gulp.start('js_superlative:build');
		console.log('JS [superlative] updated.');
	});
	// img superlative
	watch([path.watch.img_superlative], function(event, cb) {
		gulp.start('img_superlative:build');
		console.log('IMG [superlative] updated.');
	});
	// fonts superlative
	watch([path.watch.fonts_superlative], function(event, cb) {
		gulp.start('fonts_superlative:build');
		console.log('FONTS [superlative] updated.');
	});
});

/* #################### START BUILD #################### */

/* SERVER */
var config = {
	server: {
		baseDir: "./web"
	},
	tunnel: false,
	host: 'localhost',
	port: 9000,
	logPrefix: "superlative"
};

/* BROWSERSYNC */
gulp.task('sync', function () {
	browserSync(config);
});

/* CLEAN */
gulp.task('clean', function (cb) {
	rimraf(path.clean, cb);
});

/* BUILD SUPERLATIVE */
gulp.task('superlative:build', function (callback) {
	runSequence (
		'js_superlative:build',
		'sass_superlative:build',
		'html_superlative:build',
		'icons_superlative:build',
		'img_superlative:build',
	//	'fonts_superlative:build',
		'fontsGoogle_superlative:build',
		callback
	);
});

/* BUILD TASK */
gulp.task('build', function (callback) {
	runSequence ('superlative:build', callback);
});

/* MAIN TASK */
gulp.task('default', function (callback) {
	//runSequence ('clean', 'build', 'sync', 'watch', callback);
	runSequence ('clean', 'build',  'watch', callback);
	//runSequence ('build',  callback);
});

// gutil.beep();
