import React, { Component } from 'react';
import { connect } from 'react-redux';
import Table from '../../components/table/Table';

/**
 * Get Filtered Orders
 * 
 * @param {Array} orders 
 * @param {String} filter
 * @return {Array} 
 */
const getFilteredOrders = (orders, filter) => {
  switch (filter) {
    case 'TOTAL':
      const ordersPrice = orders.sort((op, on) => {
        return op.price - on.price;
      });

      return ordersPrice.filter((o, idx) => idx < 5);
    default:
      return orders;
  }
};

/**
 * Map State To Props
 * 
 * @param {Array} state 
 */
const mapStateToProps = state => ({
  orders: getFilteredOrders(state.orders, state.visibilityFilter)
});

const criterion = [
  'date',
  'order number',
  'detail',
  'total'
];

/**
 * History container
 */
class History extends Component {
  
  /**
   * Render
   */
  render() {
    return (
      <div>
        <h3></h3>
        <Table criterion={criterion} orders={this.props.orders}/>
      </div>
    );
  }
}

export default connect(mapStateToProps)(History);

