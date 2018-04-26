import React, { Component } from 'react';
import PropTypes from 'prop-types';

export default class UserCard extends Component {
  /**
   * Render
   */
  render() {
    return (
      <div className="card" style="width: 18rem;">
        <div className="card-body">
          <h5 className="card-title">
            <span>Name:</span>
            {this.props.user.name}
          </h5>
          <h5 className="card-title">
            <span>Role:</span>
            {this.props.user.role}
          </h5>
          <h5 className="card-title">
            <span>Age:</span>
            {this.props.user.age}
          </h5>
          <h5 className="card-title">
            <span>Gender:</span>
            {this.props.user.gender}
          </h5>
          <h5 className="card-title">
            <span>Tel:</span>
            {this.props.user.tel}
          </h5>
          <h5 className="card-title">
            <span>Age:</span>
            {this.props.user.detail}
          </h5>
        </div>
      </div>
    );
  }
}

UserCard.defaultProps = {
  user: {
    name: 'John Doe',
    role: 'delivery man',
    age: 33,
    gender: 'Mr',
    tel: '0685465667',
    detail: 'I love loc lac'
  }
};