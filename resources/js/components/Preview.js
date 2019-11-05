import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import GoogleTextAd from './GoogleTextAd'

import api from '../utils/api'
import _ from 'lodash'

export default class Preview extends Component {
  constructor (props) {
    super(props)
    this.state = {
      advertisements: null,
      pagination: null,
      page: 1
    }
  }

  render () {
    return (
      <>
        <div className='row'>
          <div className='col-lg-12'>
            <div className='mb-4'>
              <p className='m-0 p-0'>Preview</p>
              <hr className='p-0' />
            </div>
          </div>
        </div>
        <GoogleTextAd id='1'>1</GoogleTextAd>
        <GoogleTextAd id='2'>1</GoogleTextAd>
        <GoogleTextAd id='3'>1</GoogleTextAd>
      </>
    )
  }
}

if (document.getElementById('my-preview')) {
  const el = document.getElementById('my-preview')
  const props = Object.assign({}, el.dataset)
  ReactDOM.render(<Preview {...props} />,
    document.getElementById('my-preview')
  )
}
