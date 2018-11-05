require ('./style.css');
require('./style.scss');
require('./modulo1');
require('./modulo3');

console.log("Hola Mundo con un cambio con recarga automatica desde HMR");

import React from 'react';
import ReactDOM from 'react-dom';

ReactDOM.render(
  <h1>Hello, world from React from web server!</h1>,
  document.getElementById('root')
);