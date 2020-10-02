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
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
var path = require('path');

const cssPath = './assets/sass';
const jsPath = './assets/js';

module.exports = {
  entry: {
    'bundle': jsPath + '/app.js',
    'my-editor': jsPath + '/my-editor.js',
    'style': cssPath + '/style.sass',
    'blog': cssPath + '/blog.sass',
    'my-admin': cssPath + '/my-admin.sass',
  },
  output: {
    path: path.resolve(__dirname, 'assets/dist'),
    filename: '[name].js',
  },
  plugins: [
    // new VueLoaderPlugin(),
    
    new BrowserSyncPlugin({
      proxy: 'http://lab.test', // Change this to your local domain
      files: [ 'assets/dist/*.css' ],
      injectCss: true,
    }, {
      reload: false,
    }),

    new MiniCssExtractPlugin({
      filename: '[name].css',
    }),
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
        use: 'url-loader?limit=100'
      }
    ]
  },
  
};