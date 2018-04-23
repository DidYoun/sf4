import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route } from 'react-router-dom';
import Banner from '../../../templates/components/banner/Banner';
import Sidebar from '../../../templates/containers/sidebar/Sidebar';
import Topbar from '../../../templates/containers/topbar/Topbar';



// React router component
import Catalog from '../../../templates/views/catalog/Catalog';
import Orders from '../../../templates/views/orders/Orders';
import Users from '../../../templates/views/users/Users';
import Settings from '../../../templates/views/settings/Settings';


import './styles/base/reset.css';
import './styles/index.css';

let boilerPlate = null;

// Get the boiler plate depending of the ENV
if (process.env.NODE_ENV !== 'production') {
  boilerPlate = (
    <BrowserRouter>
      <div className="App">
        <Banner/>
        <header>
          <Sidebar/>
        </header>
        <div className="App-body">
          <Topbar/>
          <div className="app-content">
            <Route path="/orders" component={Orders}/>
            <Route path="/booking" component={Catalog}/>
            <Route path="/profile" component={Users}/>
            <Route path="/setting" component={Settings}/>
          </div>
        </div>
      </div>
    </BrowserRouter>
  );
} else {
  boilerPlate = (
    <BrowserRouter>
      <div className="App">
        <header>
          <Sidebar/>
        </header>
        <div className="App-body">
          <Topbar/>
          <div className="app-content">
            <Route path="/orders" component={Users}/>
            <Route path="/booking" component={Users}/>
            <Route path="/profile" component={Users}/>
            <Route path="/setting" component={Users}/>
          </div>
        </div>
      </div>
    </BrowserRouter>
  );
}

ReactDOM.render(boilerPlate, document.getElementById('root'));