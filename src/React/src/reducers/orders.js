/**
 * Populate State
 * 
 * @param {Array} state 
 * @param {Array} datas 
 * @return {Array} filteredData
 */
const getFilteredDatas = (datas) => {
  const filteredData = datas.map(d => {
    return {
      id: d.id,
      date: d.timestamp,
      odn: d.orderNumber,
      detail: d.detail,
      total: d.price
    }
  });

  return filteredData;
};

/**
 * Orders
 * 
 * @param {Array} state 
 * @param {Array} action 
 * @return {Array} state
 */
const orders = (state = [], action) => {
  switch(action.type) {
    case 'ADD_ORDER':
      const datas = getFilteredDatas(action.datas);
      return [
        ...state,
        ...datas
      ]
    case 'DELETE_ORDER':
      return state.filter(order => {
        if (order.id !== action.id)
          return order;
      });
    default:
      return state;
  }
};

export default orders;