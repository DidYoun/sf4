import React, { Component } from 'react';
import PropsType from 'prop-types';
import { isEmpty, isNaN } from 'lodash';
import './style/style.css';

// Define a constant for the icon size
const iconSize = {
  lg: '30px',
  md: '20px',
  sm: '10px',
};

/**
 * Svg Icon 
 *    Component to render SVG
 */
export default class SvgIcon extends Component {

  /**
   * Get Size
   *    Return the size of an icon in px
   * 
   * @param {String} inputSize
   * @return {String} size
   */
  getSize(inputSize) {
    let size = iconSize[inputSize];

    if (isEmpty(size)) {
      const tmpSize = parseInt(size);

      if (isNaN(tmpSize))
        return iconSize.md;

      return `${tmpSize}px`;
    }

    return size;
  }

  /**
   * Render
   */
  render() {
    console.log(this.props.icon);
    return (
      <svg viewBox={this.props.icon.viewBox} width={this.getSize(this.props.size)}>
        <use xlinkHref={`#${this.props.icon.id}`}/>
      </svg>
    );
  }
}

SvgIcon.defaultProps = {
  icon: {
    viewBox: '',
    id: '',
  },
  size:'md'
};

SvgIcon.PropsType = {
  icon: {
    viewBox: PropsType.string,
    id: PropsType.string
  },
  size: PropsType.string
};