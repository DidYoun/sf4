import React, { Component } from 'react';
import OrderList from '../../components/order/Lists';

class Order_List extends Component {
  /**
   *
   * @param {Object} props
   */
  constructor(props) {
    super(props);
  }

  /**
   *
   */
  render() {
    return (
      <div className="OrderList">
        <OrderList/>
      </div>
    );
  }
}

export default Order_List;