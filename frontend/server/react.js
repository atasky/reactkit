const ReactDOMServer = require('react-dom/server');
const React = require('react');

const getComponentElement = (component) => {
  return React.createElement(require(component.path).default, component.props);
};

const renderServerComponent = (component) => {
  let element = getComponentElement(component);

  if (component.static) {
    return ReactDOMServer.renderToStaticMarkup(element);
  }

  return ReactDOMServer.renderToString(element);
};

module.exports = {
  renderServerComponent
};
