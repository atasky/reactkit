import React, { Component } from 'react';

export default class Demo extends Component {
  constructor(props) {
    super(props);
    this.state = {
      count: 0
    }
  }
  handleClick() {
    this.setState({
      count: this.state.count + 1
    })
  }
  render() {
    return (
      <div className="App">
        <header className="App-header">
          <h1 className="App-title">Welcome to React {this.props.name} ({this.state.count})</h1>
        </header>
        <p className="App-intro">
          To get started, edit <code>src/Demo.js</code> and save to reload.
        </p>
        <p>
          <button onClick={this.handleClick.bind(this)}>+1</button>
        </p>
      </div>
    );
  }
};