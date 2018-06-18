import React, { Component } from 'react';
import './App.css'
import logo from './logo.svg';

export default class App extends Component {
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
          <img src={logo} className="App-logo" alt="logo" />
          <h1 className="App-title">Welcome to React {this.props.name} ({this.state.count})</h1>
        </header>
        <p className="App-intro">
          To get started, edit <code>src/App.js</code> and save to reload.
        </p>
        <p>
          <button onClick={this.handleClick.bind(this)}>+1</button>
        </p>
      </div>
    );
  }
};
