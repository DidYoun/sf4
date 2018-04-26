import '../../../public/styles/components/input/style/style.css';
import React, { Component } from 'react';
import PropTypes from 'prop-types';

/**
 * Input
 */
class Input extends Component {
  /**
   * 
   * @param {Object} props 
   */
  constructor(props) {
    super(props);
  }

  /**
   * Render
   */
  render() {
    return (
      <div className="form-group form-flex">
        <label>{this.props.inputLabel}</label>
        <input className="form-control" type={this.props.inputType} placeholder={this.props.placeHolder}/>
        <small className="form-text text-muted">{this.props.inputSmall}</small>
      </div>
    );
  }
}

Input.PropTypes = {
  inputType: PropTypes.string,
  inputSmall: PropTypes.string,
  inputLabel: PropTypes.string,
  placeholder: PropTypes.string
};

Input.defaultProps = {
  inputType: 'text',
  inputSmall: '',
  inputLabel: '',
  placeHolder: ''
};

export default Input;