const Encore = require('@symfony/webpack-encore');
process.env.NODE_ENV = 'development';

if (Encore.isProduction()) {
  process.env.NODE_ENV = 'production';
}

Encore
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

// add svg loader
const rules = config.module.rules;
// loop threw the rules 
// /!\ Mutation of the rules array
for (let idx = 0; idx < rules.length; idx++) {
  if (rules[idx].loader === 'file-loader') {
    // update the rules of the file loader
    rules[idx].test = /\.(png|jpg|jpeg|gif|ico|webp)$/;

    // add the svg loader
    rules.splice(idx, 0, {
      test: /\.svg$/,
      loader: 'svg-sprite-loader'
    });
    idx = rules.length;
  }
}

module.exports = config;