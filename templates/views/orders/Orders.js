import React, { Component } from 'react';
import OrderList from '../../containers/order/Lists';
import '../../../public/styles/views/orders/style/style.css';

export default class Orders extends Component {
  /**
   * Render
   */
  render() {
    return (
      <div className="OrderContent">
        <h2>Orders !</h2>
        <OrderList/>
      </div>
    );
  }
}