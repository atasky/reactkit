require('ignore-styles');
require('asset-require-hook')({
    extensions: ['jpg', 'svg', 'png', 'webp', 'gif'],
    name: '[name].[hash:8].[ext]',
    publicPath: '/static/media/'
});
require('babel-register')({
  ignore: [ /(node_modules)/ ],
  presets: [
    'es2015',
    'react-app',
  ],
  plugins: [
    'syntax-dynamic-import',
    'dynamic-import-node',
  ]
});
require('babel-polyfill');

const server = require('./server');
const port = process.env.PORT || 3000;

server.listen(port, () => {
    console.log(`Reactkit server running at http://localhost:${port}/`);
});
