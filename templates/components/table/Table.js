import React, { Component } from 'react';
import PropTypes from 'prop-types';

export default class Table extends Component {
  
  /**
   * Create Table Head
   * 
   * @param {Array} criterion
   * @return {Array} 
   */
  createTableHead(criterion) {
    return criterion.map(c => {
      return (
        <tr>{c}</tr>
      );
    });
  }

  /**
   * Create Table
   * 
   * @param {Array} orders
   * @return {Array}
   */
  createTable(orders) {
    return orders.map(o => {
      return (
        <tr>
          <td>{o.date}</td>
          <td>{o.odn}</td>
          <td>{o.detail}</td>
          <td>{o.total}</td>
        </tr>
      );
    });
  }

  /**
   * Render
   */
  render() {
    return (
      <table className="table">
        <thead>
          <tr>
            {this.createTableHead(this.props.criterion)}
          </tr>
        </thead>
        <tbody>
          {this.createTable(this.props.orders)}
        </tbody>
      </table>
    );
  }
}

Table.PropTypes = {
  orders: {
    id: PropTypes.number,
    date: PropTypes.string,
    odn: PropTypes.string,
    detail: PropTypes.string,
    total: PropTypes.number
  }
};