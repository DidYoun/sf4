import React, { Component } from 'react';
import Profile from '../../containers/profile/Profile';

export default class Settings extends Component {
  /**
   * Render
   */
  render() {
    return (
      <div className="settings">
        <h2>Settings ! below is my profile for eg</h2>
        <Profile/>
      </div>
    );
  }
}