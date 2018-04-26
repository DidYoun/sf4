import '../../../public/styles/components/banner/style/banner.css';
import React, { Component } from 'react';

/** 
 * Banner
 *    Component use to display in which mode we are 
 */
class Banner extends Component {
  /** 
   * Render 
   */
  render() {
    return (
      <div className={`banner ${process.env.NODE_ENV}`}>
        <h4>Caution: {process.env.NODE_ENV} environment</h4>
      </div>
    );
  }
}

export default Banner;