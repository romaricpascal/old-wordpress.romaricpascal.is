var webpack = require('webpack');
var path = require('path');

var BUILD_DIR = path.resolve(__dirname, '.');
var APP_DIR = path.resolve(__dirname, 'js');

var config = {
  entry: [ APP_DIR + '/index.js'],
  output: {
    path: BUILD_DIR,
    filename: 'main.js'
  },
  devtool: 'source-map',
  resolve: {
    extensions: ['.js']
  },
  module : {
    rules : [
      {
        enforce: "pre",
        test: /\.js$/,
        exclude: /node_modules/,
        loader: "eslint-loader"
      }, {
        test : /\.jsx?/,
        include : APP_DIR,
        loader : 'babel-loader'
      }
    ]
  }
};

module.exports = config;