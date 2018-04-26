import React, { Component } from 'react';
import PropsType from 'prop-types';

export default class Error extends Component { 
  /**
   * Render
   */
  render() {
    return (
      <div>
        <h3>Error: {this.props.title}</h3>
        <div className="alert alert-danger" role="alert">
          {this.props.message}
        </div>
        <p>Please contact the administrator at...</p>
      </div>
    );
  }
};

Error.PropsType = {
  title: PropsType.string,
  message: PropsType.string
};

Error.defaultProps = {
  title: 'An unexpected error happened',
  message: 'An unknown error happened without any following indication'
};

