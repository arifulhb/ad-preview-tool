import React, { Component } from 'react'
import _ from 'lodash'
const codeStyle = {
  backgroundColor: '#D1D1D0',
  fontFamily: 'Consolas, Monaco, sans-serif',
  color: 'blue',
  padding: '10px 15px'
}
export default class Share extends Component {
  handleCopyToClipboard (url) {
    const text = document.createElement('textarea')
    text.textContent = url
    document.body.appendChild(text)
    text.select()
    try {
      return document.execCommand('copy')
    } catch (ex) {
      return false
    } finally {
      document.body.removeChild(text)
    }
  }

  render () {
    const ids = this.props.ads
    const url = `${window.location.protocol}//${window.location.host}/advertise/preview?ids=${ids}`

    return (
      <div className='share-builder row mb-3'>
        <div className='col-lg-10 col-md-10 col-sm-12'>
          <label>Share URL:</label>&nbsp;
          <code style={codeStyle}>
            <label>
              {url}
            </label>
          </code>
          {
            ids.length > 0
              ? <button className='btn btn-copy btn-info btn-sm' onClick={() => this.handleCopyToClipboard(url)}>Copy URL</button>
              : ''
          }
        </div>
      </div>
    )
  }
}
