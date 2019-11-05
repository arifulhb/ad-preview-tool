import React, { Component } from 'react'

export default class GoogleTextAd extends Component {
  constructor (props) {
    super(props)
    console.log('GTA props ', props)
  }

  render () {
    return (
      <div className='google-text-ad mb-5'>
        <div className='headline'>
          <a className='headline__text' href='#'>
            <span className='headline_text_1'>{this.props.ad.headline1}</span>
            <span className='headline_text_2 pipe'>{this.props.ad.headline2}</span>
            <span className='headline_text_3 pipe'>{this.props.ad.headline3}</span>
          </a>
        </div>
        <div className='display-url'>
          <i className='fa fa-ad' /> <span className='display-url_text'>{this.props.ad.displayUrl}</span>
        </div>
        <div className='description'>
          <span className='description__block_1'>{this.props.ad.description1}</span>
          <span className='description__block_2 pipe'>{this.props.ad.description2}</span>
        </div>
      </div>
    )
  }
}
