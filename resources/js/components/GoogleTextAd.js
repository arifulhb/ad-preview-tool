import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import api from '../utils/api'
import _ from 'lodash'

export default class GoogleTextAd extends Component {
  constructor (props) {
    super(props)
    console.log('GTA props ', props)
    this.state = {
    }
  }

  render () {
    return (
      <div className='google-text-ad mb-5'>
        <div className='headline'>
          <a className='headline__text' href='#'>
            <span className='headline_text_1'>Awesome Headline 1</span>
            <span className='headline_text_2 pipe'>Awesome Headline 2</span>
            <span className='headline_text_3 pipe'>Awesome Headline 3</span>
          </a>
        </div>
        <div className='display-url'>
          <i className='fa fa-ad' /> <span className='display-url_text'>www.example.com/ppc-services</span>
        </div>
        <div className='description'>
          <span className='description__block_1'>Create Some Amazing Ad Copy Tod.</span>
          <span className='description__block_2 pipe'>Make Your Ad Stand Out!</span>
        </div>
      </div>
    )
  }
}
