const Encore = require('@symfony/webpack-encore');
process.env.NODE_ENV = 'development';

if (Encore.isProduction()) {
  process.env.NODE_ENV = 'production';
}

Encore
  // add the custom svg loader
  .addLoader({
    test: /\.svg$/,
    loader: 'svg-sprite-loader'
  })
  // the project directory where all compiled assets will be stored
  .setOutputPath('public/build/')

  // the public path used by the web server to access the previous directory
  .setPublicPath('/build')

  // will create public/build/app.js and public/build/app.css
  .addEntry('app', './src/React/src/index.js')

  // allow sass/scss files to be processed
  .enableSassLoader()

  // enable source maps
  .enableSourceMaps(!Encore.isProduction())

  // empty the outputPath dir before each build
  .cleanupOutputBeforeBuild()

  // show OS notifications when builds finish/fail
  .enableBuildNotifications();

  // create hashed filenames (e.g. app.abc123.css)
  // .enableVersioning()

const config = Encore.getWebpackConfig();

module.exports = config;