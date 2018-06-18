const path = require('path');
const http = require('http');
const express = require('express');
const app = express();
const { renderServerComponent } = require('./react');

app.use(express.json());
app.post('/', (req, res) => {
  const component = req.body;
  const parts = component.name.split('.');

  component.path = path.join(process.cwd(), 'src', parts[parts.length-1])

  try {
    const html = renderServerComponent(component);
    console.log(`Server rendering component: ${component.name}` );

    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/html; charset=utf-8;');
    res.end(html);
  } catch(e) {
    console.error(e);
    res.statusCode = 500;
    return res.end(`Exception on ${component.name}. ${e}`);
  }
});

module.exports = app;
