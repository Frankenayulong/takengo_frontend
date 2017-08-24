var gulp = require('gulp');
var minifyCSS = require('gulp-csso');
var concatCss = require('gulp-concat-css');
var concat = require('gulp-concat');
var minify = require('gulp-minify');
var filesExist = require('files-exist');
var uglify = require('gulp-uglify');
var NgAnnotate = require('gulp-ng-annotate');
var babel = require('gulp-babel');

gulp.task('css', function(){
    var css_files = [
        'app.css',
        'spinner.css',
        'plugins/caleran.min.css',
        'plugins/socicon/socicon.css',
        'plugins/bootstrap-social/bootstrap-social.css',
        'plugins/font-awesome/css/font-awesome.css',
        'plugins/simple-line-icons/simple-line-icons.css',
        'plugins/animate/animate.css',
        'plugins/bootstrap/css/bootstrap.css',
        'plugins/revo-slider/css/settings.css',
        'plugins/revo-slider/css/layers.css',
        'plugins/revo-slider/css/navigation.css',
        'plugins/cubeportfolio/css/cubeportfolio.css',
        'plugins/owl-carousel/assets/owl.carousel.css',
        'plugins/fancybox/jquery.fancybox.css',
        'plugins/slider-for-bootstrap/css/slider.css',
        'demos/default/css/plugins.css',
        'demos/default/css/components.css',
        'demos/default/css/themes/default.css',
        'demos/default/css/custom.css'
    ];
    return gulp.src(filesExist(css_files))
    .pipe(concatCss('build.css'))
    .pipe(minifyCSS())
    .pipe(gulp.dest('../public/css'));  
});

gulp.task('js', function(){
    var js_files = [
        'plugins/jquery.min.js',
        'plugins/moment.min.js',
        'plugins/jquery-migrate.min.js',
        'plugins/bootstrap/js/bootstrap.js',
        'plugins/jquery.easing.min.js',
        'plugins/reveal-animate/wow.js',
        'demos/default/js/scripts/reveal-animate/reveal-animate.js',
        'plugins/revo-slider/js/source/jquery.themepunch.tools.min.js',
        'plugins/revo-slider/js/source/jquery.themepunch.revolution.js',
        'plugins/revo-slider/js/extensions/source/revolution.extension.slideanims.js',
        'plugins/revo-slider/js/extensions/source/revolution.extension.layeranimation.js',
        'plugins/revo-slider/js/extensions/source/revolution.extension.navigation.js',
        'plugins/revo-slider/js/extensions/source/revolution.extension.video.js',
        'plugins/revo-slider/js/extensions/source/revolution.extension.parallax.js',
        'plugins/cubeportfolio/js/jquery.cubeportfolio.js',
        'plugins/owl-carousel/owl.carousel.js',
        'plugins/counterup/jquery.waypoints.min.js',
        'plugins/counterup/jquery.counterup.js',
        'plugins/fancybox/jquery.fancybox.pack.js',
        'plugins/smooth-scroll/jquery.smooth-scroll.js',
        'plugins/typed/typed.min.js',
        'plugins/slider-for-bootstrap/js/bootstrap-slider.js',
        'plugins/js-cookie/js.cookie.js',
        'base/js/components.js',
        'base/js/components-shop.js',
        'base/js/app.js',
        'system.js',
        'plugins/caleran.min.js',
        'plugins/caleran.obf.js'
    ];
    return gulp.src(filesExist(js_files))
    .pipe(concat('build.js'))
    .pipe(uglify())
    .pipe(gulp.dest('../public/js'))
})

gulp.task('angular', function(){
    var angular_files = [
        'app/lib/angular/angular.min.js',
        'app/lib/angular/angular-cookies.min.js',
        'app/lib/slim/slim.angular.js',
        'app/lib/ngGeolocation/ngGeolocation.min.js',
        'app/lib/ngMap/ng-map.min.js',
        'app/app.js',
        'app/controllers/components/modals/sign-in.js',
        'app/controllers/components/modals/sign-up.js',
        'app/controllers/components/header.js',
        'app/controllers/pages/profile_edit.js',
        'app/controllers/pages/cars_collection.js'
    ];
    return gulp.src(filesExist(angular_files))
    .pipe(concat('ng-min.js'))
    .pipe(babel({
        presets: ["env"]
    }))
    .pipe(NgAnnotate())
    .pipe(uglify())
    .pipe(gulp.dest('../public/js'))
})


gulp.task('slider', function(){
    var slider_files = [
        'plugins/revo-slider/js/extensions/source/revolution.extension.kenburn.js',
        'plugins/revo-slider/js/extensions/source/revolution.extension.parallax.js'
    ];
    return gulp.src(filesExist(slider_files))
    .pipe(concat('slider.js'))
    .pipe(minify())
    .pipe(gulp.dest('../public/js'))
})

gulp.task('faq', function(){
    var faq_files = [
        'demos/default/js/scripts/pages/faq.js'
    ];
    return gulp.src(filesExist(faq_files))
        .pipe(concat('faq.js'))
        .pipe(minify())
        .pipe(gulp.dest('../public/js'))
})

gulp.task('default', [ 'css', 'js', 'slider', 'faq', 'angular' ]);
module.exports = gulp;