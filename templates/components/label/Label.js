import React, { Component } from 'react';
import PropTypes from 'prop-types';
import '../../../public/styles/components/label/style/style.css';

class Label extends Component {
  /**
   * 
   * @param {Object} props 
   */
  constructor(props) {
    // Pass user info to component
    super(props);
  }

  /**
   * 
   */
  render() {
    return (
      <div className="userProperties form-group row">
        <label htmlFor="name" className="col-sm-4 col-htmlForm-label">Name :</label>
        <div className="col-sm-8">
          <p>{this.props.name}</p>
        </div>
        <label htmlFor="role" className="col-sm-4 col-htmlForm-label">Role :</label>
        <div className="col-sm-8">
          <p>{this.props.role}</p>
        </div>
        <label htmlFor="age" className="col-sm-4 col-htmlForm-label">Age :</label>
        <div className="col-sm-8">
          <p>{this.props.age}</p>
        </div>
        <label htmlFor="gender" className="col-sm-4 col-htmlForm-label">Gender :</label>
        <div className="col-sm-8">
          <p>{this.props.gender}</p>
        </div>
        <label htmlFor="name" className="col-sm-4 col-htmlForm-label">Tel :</label>
        <div className="col-sm-8">
          <p>{this.props.phone}</p>
        </div>
        <label htmlFor="name" className="col-sm-4 col-htmlForm-label">Detail :</label>
        <div className="col-sm-8">
          <p>{this.props.detail}</p>
        </div>
      </div>
    );
  }
}

Label.defaultProps = {
  name: '',
  role: 'delivery man',
  gender: 'M',
  phone: '',
  detail: 'nothing'
};

export default Label;