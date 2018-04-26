import '../../../public/styles/components/avatar/style/style.css';
import React, { Component } from 'react';
import PropsType from 'prop-types';
import { isEmpty } from 'lodash';

/**
 * Avatar Component
 */
class Avatar extends Component {
  /**
   * Get Style
   * @return {String}
   */
  getStyle() {
    return {
      backgroundImage: `url(${this.props.pic})`
    }
  }
  /**
   * Render
   */
  render() {
    const style = this.getStyle();
    return (
      <div className="avatar">
        {!isEmpty(this.props.name) && 
          <p>{this.props.name}</p>
        }
        <div className="pic" style={style}></div>
      </div>
    );
  }
}

Avatar.PropsType = {
  name: PropsType.string,
  pic: PropsType.string
};

Avatar.defaultProps = {
  name: '',
  pic: 'https://vignette.wikia.nocookie.net/studio-ghibli/images/1/1f/Totoro.gif/revision/latest/top-crop/width/480/height/480?cb=20130110181320'
};

export default Avatar;