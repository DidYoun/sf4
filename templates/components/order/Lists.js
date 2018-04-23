import React, {Component} from 'react';

class OrderList extends Component {
  render() {
    return (
      <div className="OrderList">
        <div className="OrderDate">
          <label className="Label">Date</label>
          <p>{this.props.OrderDate}</p>
        </div>
        <div className="OrderNumber">
          <label className="Label">Order Number</label>
          <p>{this.props.OrderNumber}</p>
        </div>
        <div className="OrderDetail">
          <label className="Label">Detail</label>
          <p>{this.props.OrderDetail}</p>
        </div>
        <div className="OrderTotal">
          <label className="Label">Total</label>
          <p>{this.props.OrderTotal}</p>
        </div>
      </div>
    );
  }
}

OrderList.defaultProps = {
  OrderDate: '1',
  OrderNumber: '1',
  OrderDetail: '1',
  OrderTotal: '1'
};

export default OrderList;
