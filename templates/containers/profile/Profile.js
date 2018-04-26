import React, { Component } from 'react';
import Avatar from '../../components/avatar/Avatar';
import Label from '../../components/label/Label';
import '../../../public/styles/containers/profile/style/style.css';

class Profile extends Component {
  /**
   * 
   */
  render() {
    return (
      <div className="profile">
        <Avatar/>
        <Label name={this.props.name}/>
      </div>
    );
  }
}

export default Profile;