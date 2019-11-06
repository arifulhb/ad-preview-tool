import React, { Component } from 'react'
import _ from 'lodash'
const codeStyle = {
  backgroundColor: '#D1D1D0',
  fontFamily: 'Consolas, Monaco, sans-serif',
  color: 'blue',
  padding: '10px 15px'
}
export default class Share extends Component {
  render () {
    const ids = this.props.ads
    return (
      <div className='share-builder row mb-3'>
        <div className='col-lg-10 col-md-10 col-sm-12'>
          <label>Share URL:</label>&nbsp;
          <code style={codeStyle}>
            <label>
              {`${window.location.protocol}//${window.location.host}/advertise/preview?ads=${ids}`}
            </label>
          </code>
        </div>
      </div>
    )
  }
}
