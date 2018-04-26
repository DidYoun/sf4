import { isEmpty } from 'lodash';

let instance = null;

/**
 * Api Manager
 */
class ApiManager {
  /**
   * Get Instance
   */
  static getInstance() {
    if (isEmpty(instance)) {
      instance = new ApiManager();
    }

    return instance;
  }

  /**
   * Get
   * 
   * @param {String} url 
   * @param {Array} qstr 
   */
  async get(url, qstr) {
    let q = '';

    if (!isEmpty(qstr)) {
      for (let idx = 0; idx < qstr.length; idx++) {
        if (idx === 0)
          q += '?';
        else
          q += '&';

        if (!isEmpty(qstr[idx].query) || !isEmpty(qstr[idx].param))
          q += `${qstr[idx].query}=${qstr[idx].param}`;
      }
    }

    try {
      const req = await fetch(`${url}${q}`);
      const res = await req.json();
      return res;
    } catch(e) {
      throw new Error(`API Manager error: ${e.message}`);
    }
  }

  /**
   * Post
   * 
   * @param {String} endpoint 
   * @param {Object} params 
   */
  async post(endpoint, params) {
    if (isEmpty(endpoint))
      throw new Error('Endpoint is empty, please provide a valid endpoint');

    let p = Object.assign({}, params);

    try {
      const req = await fetch(endpoint, {
        method: 'POST',
        body: JSON.stringify(p)
      });

      const res = await req.json();
      return res;
    } catch(e) {
      throw new Error(`API Manager error: ${e.message}`);
    }
  }
}

/**
 * Get Api Manager Instance
 * @return {Object} ApiManager
 */
export const getApiManagerInstance = () => ApiManager.getInstance();