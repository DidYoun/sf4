import React, { Component } from 'react';
import Profile from '../../containers/profile/Profile';
import Error from '../../components/error/Error';
import PropsTypes from 'prop-types';
import { isEmpty } from 'lodash';
import { getApiManagerInstance } from '../../../src/React/src/services/network/api_manager';
import './style/style.css';

class Users extends Component {
  /**
   * Constructor
   */
  constructor(props) {
    super(props);
    this.state = {
      users: {},
      error: {}
    };
    this.apiManager = getApiManagerInstance();
  }

  /**
   * Component Did Mount
   */
  componentDidMount() {
    this.apiManager
      .get('http://mysafeinfo.com/api/data?list=englishmonarchs&format=json')
      .then(res => {
        this.setState({
          users: res
        });
      })
      .catch(err => {
        this.setState({
          error: err
        });
      })
  }

  /**
   * Set Users Profile
   */
  setUsersProfile() {
    let profiles = [];
    for (let idx = 0; idx < this.state.users.length; idx++) {
      profiles.push(<Profile name={this.state.users[idx].nm} key={idx}/>);
    }

    return profiles;
  }

  /**
   * Render
   */
  render() {
    return (
      <div className="user">
        {isEmpty(this.state.error) ? (
          this.setUsersProfile()
        ) : (
          <Error title="network error" message={this.state.error.message}/>
        )}
      </div>
    );
  }
}

Users.PropsTypes = {
  id: PropsTypes.number
};

export default Users;