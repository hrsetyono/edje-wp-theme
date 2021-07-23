/*
If you need Vue, add this in your dependencies:

  "vue": "^2.6.12",
  "vue-router": "^3.4.3"

And add this in devDependencies:

  "@vue/test-utils": "^1.1.0",
  "babel-jest": "^26.3.0",
  "jest": "^26.4.2",
  "puppeteer": "^5.3.1",
  "vue-jest": "^3.0.7",
  "vue-loader": "^15.9.3",
  "vue-style-loader": "^4.1.2",
  "vue-template-compiler": "^2.6.12"

Then uncomment all commented lines below
*/

// const { VueLoaderPlugin } = require('vue-loader');
const DependencyExtractionWebpackPlugin = require( '@wordpress/dependency-extraction-webpack-plugin' );
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
var path = require('path');

const cssPath = './assets/sass';
const jsPath = './assets/js';
const blockPath = './inc';

const outputPath = 'assets/dist';

const localDomain = 'http://shop.test/';
const entryPoints = {
  'app': jsPath + '/app.js',
  'gutenberg': cssPath + '/gutenberg.sass',
  'my-editor': jsPath + '/my-editor.js',
  'my-admin': jsPath + '/my-admin.js',

  'shop': cssPath + '/shop/shop.sass',
  'shop-editor': cssPath + '/shop/shop-editor.sass',

  'my-block': blockPath + '/my-block/index.jsx',
};

module.exports = {
  entry: entryPoints,
  output: {
    path: path.resolve(__dirname, outputPath),
    filename: '[name].js',
  },
  plugins: [
    // new VueLoaderPlugin(),
    
    new BrowserSyncPlugin({
      proxy: localDomain,
      files: [ outputPath + '/*.css' ],
      injectCss: true,
    }, { reload: false, }),

    new MiniCssExtractPlugin({
      filename: '[name].css',
    }),

    new DependencyExtractionWebpackPlugin( {
      injectPolyfill: true
    } ),
  ],
  module: {
    rules: [
      // {
      //   test: /\.vue$/,
      //   use: 'vue-loader',
      // },
      {
        test: /\.s?[ac]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader',
        ]
      },
      {
        test: /\.(jpg|jpeg|png|gif|woff|woff2|eot|ttf|svg)$/i,
        use: 'url-loader?limit=1024'
      },
      {
        test: /\.jsx$/i,
        use: [
					require.resolve( 'thread-loader' ),
					{
						loader: require.resolve( 'babel-loader' ),
						options: {
              cacheDirectory:	process.env.BABEL_CACHE_DIRECTORY || true,
              babelrc: false,
              configFile: false,
              presets: [
                require.resolve( '@wordpress/babel-preset-default' ),
              ],
						},
					},
				],
      }
    ]
  },
  
};