import '../../../public/styles/containers/topbar/style/style.css';
import React, { Component } from 'react';
import Input from '../../components/input/Input';
import Avatar from '../../components/avatar/Avatar';
import SvgIcon from '../../components/svg/SvgComponent';
import { I18n } from 'react-i18next';
import i18n from '../../../src/React/src/services/locales/locale';

// import svg
import iconMail from '../../../public/resources/icons/icon-letter.svg';
import iconLogout from '../../../public/resources/icons/icon-logout.svg';
import iconSearch from '../../../public/resources/icons/icon-search.svg';

/**
 * Top Bar
 */
class Topbar extends Component {
  /**
   * Render
   */
  render() {
    return (
      <I18n>
        {
          (t, { i18n }) => (
            <div className="topbar">
              <div className="inputGroup">
                <SvgIcon icon={iconSearch}/>
                <Input placeHolder="Find everything..."/>
              </div>
              <div className="right">
                <Avatar name="Totoro"/>
                <div className="email">
                <SvgIcon icon={iconMail}/>
                </div>
                <div className="logout">
                  <p>{t('common.logout')}</p>
                  <SvgIcon icon={iconLogout}/>
                </div>
              </div>
            </div>
          )
        }
      </I18n>
    );
  }
}

export default Topbar;