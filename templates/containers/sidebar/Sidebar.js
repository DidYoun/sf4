import './style/style.css';
import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import SvgIcon from '../../components/svg/SvgComponent';
import logo from '../../../public/resources/img/logo.png';

// Try to import phiset icons
import iconBag from '../../../public/resources/icons/icon-docs.svg';
import iconUsers from '../../../public/resources/icons/icon-users.svg';
import iconSetting from '../../../public/resources/icons/icon-setting.svg';
import iconCatalog from '../../../public/resources/icons/icon-catalog.svg';

const menuRoutes = [
  { name: 'orders',  icon: iconBag },
  { name: 'booking', icon: iconCatalog },
  { name: 'profile', icon: iconUsers },
  { name: 'setting', icon: iconSetting }
];

/**
 * Sidebar
 */
class Sidebar extends Component {
  /**
   * Item On Click
   *    Process actions when the user click on the sidebar
   * @param {Number} idx 
   */
  itemOnClick(idx) {
    console.log('clicked');
  }

  /**
   * Side Bar Menu
   *    Return the side bar menu items
   */
  sideBarMenu() {
    const menuItems = menuRoutes.map((item, idx) => {
      return (
        <div className="menuItems" key={idx} onClick={this.itemOnClick.bind(this, idx)}>
          <SvgIcon icon={item.icon} size="md"/>
          <Link to={`/${item.name}`}>{item.name}</Link>
        </div>
      );
    });

    return menuItems;
  }

  /**
   * Render
   */
  render() {
    return (
      <div className="sidebar">
        <img src={logo} alt="Logo of slabprea"/>
          {this.sideBarMenu()}
      </div>
    ); 
  }
}

export default Sidebar;