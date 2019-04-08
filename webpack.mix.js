const mix = require('laravel-mix');
const publicBasePath = 'public/assets';
const frontEndBasePath = 'frontend/template';

const copyFiles = (files) => {
    const path = require('path');
    files.forEach(file => {
        mix.copy(file[0], path.join(publicBasePath, file[1]));
    });
}

const copyFolders = (folders) => {
    const path = require('path');
    folders.forEach(folder => {
        mix.copyDirectory(folder[0], path.join(publicBasePath, folder[1]));
        if (folder[2]) {
            mix.version(path.join(publicBasePath, folder[2]));
        }
    });
}
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.setPublicPath(publicBasePath)
    .setResourceRoot('/assets/')
    .options({
        processCssUrls: false
    });;

mix.js('resources/js/admin/admin.js', 'public/js/admin')
    .js('resources/js/admin/pages/user.js', 'public/js/admin/pages')
   .sass('resources/sass/app.scss', 'public/css');

copyFiles([
    [`${frontEndBasePath}/bower_components/bootstrap/dist/css/bootstrap.min.css`, 'public/css/admin/bootstrap.min.css'],
    [`${frontEndBasePath}/dist/css/AdminLTE.min.css`, 'public/css/admin/AdminLTE.min.css'],
    [`${frontEndBasePath}/dist/css/skins/_all-skins.min.css`, 'public/css/admin/_all-skins.min.css'],
    [`${frontEndBasePath}/bower_components/select2/dist/css/select2.min.css`, 'public/css/admin/select2.min.css'],
    [`${frontEndBasePath}/plugins/datetimepicker/jquery.datetimepicker.css`, 'public/css/admin/jquery.datetimepicker.css'],
]);

copyFolders([
    [`${frontEndBasePath}/bower_components/font-awesome`, 'public/css/admin/font-awesome'],
    [`${frontEndBasePath}/dist/img`, 'public/img'],
    [`${frontEndBasePath}/bower_components/Ionicons`, 'public/css/admin/Ionicons'],
    [`${frontEndBasePath}/plugins/iCheck`, 'public/plugins/iCheck'],
]);