const gulp = require('gulp');
const minifyCSS = require('gulp-csso');
const concatCss = require('gulp-concat-css');
const concat = require('gulp-concat');
const filesExist = require('files-exist');
const uglify = require('gulp-uglify');
const ngAnnotate = require('gulp-ng-annotate');
const babel = require('gulp-babel');
const sourcemaps = require('gulp-sourcemaps');
const pump = require('pump');

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
    pump([
        gulp.src(filesExist(css_files)),
        concatCss('build.css'),
        minifyCSS(),
        gulp.dest('../public/css')
      ],
      (err) => {
        console.log(err)
      }
    );
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
        'plugins/zoom-master/jquery.zoom.min.js',
        'base/js/app.js',
        'system.js',
        'plugins/caleran.min.js',
        'plugins/caleran.obf.js'
    ];
    pump([
        gulp.src(filesExist(js_files)),
        sourcemaps.init(),
        concat('build.js'),
        uglify(),
        sourcemaps.write('../js'),
        gulp.dest('../public/js')
      ],
      (err) => {
        console.log(err)
      }
    );
})

gulp.task('angular', function(){
    var angular_files = [
        // 'app/lib/angular/angular.min.js', << NGMAP needs this first
        'app/lib/angular/angular-cookies.min.js',
        'app/lib/slim/slim.angular.js',
        'app/lib/ngGeolocation/ngGeolocation.js',
        // 'app/lib/ngMap/ng-map.js', << CANNOT BE MINIFIED
        'app/app.js',
        'app/controllers/components/modals/sign-in.js',
        'app/controllers/components/modals/sign-up.js',
        'app/controllers/components/header.js',
        'app/controllers/pages/profile_edit.js',
        'app/controllers/pages/cars_collection.js'
    ];
    pump([
        gulp.src(filesExist(angular_files)),
        sourcemaps.init(),
        concat('ng-min.js'),
        babel({
            presets: ["env"]
        }),
        ngAnnotate(),
        uglify(),
        sourcemaps.write('../js'),
        gulp.dest('../public/js')
      ],
      (err) => {
        console.log(err)
      }
    );
})


gulp.task('slider', function(){
    var slider_files = [
        'plugins/revo-slider/js/extensions/source/revolution.extension.kenburn.js',
        'plugins/revo-slider/js/extensions/source/revolution.extension.parallax.js'
    ];
    pump([
        gulp.src(filesExist(slider_files)),
        sourcemaps.init(),
        concat('slider.js'),
        uglify(),
        sourcemaps.write('../js'),
        gulp.dest('../public/js')
      ],
      (err) => {
        console.log(err)
      }
    );
})

gulp.task('faq', function(){
    var faq_files = [
        'demos/default/js/scripts/pages/faq.js'
    ];
    pump([
        gulp.src(filesExist(faq_files)),
        sourcemaps.init(),
        concat('faq.js'),
        uglify(),
        sourcemaps.write('../js'),
        gulp.dest('../public/js')
        ],
        (err) => {
        console.log(err)
        }
    );
})

gulp.task('default', [ 'css', 'js', 'slider', 'faq', 'angular' ]);