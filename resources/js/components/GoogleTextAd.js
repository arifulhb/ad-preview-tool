import React, { Component } from 'react'
import _ from 'lodash'

export default class GoogleTextAd extends Component {

  render () {
    const ad = this.props.ad
    return (
      <div className='google-text-ad mb-5'>
        <div className='headline'>
          <a className='headline__text' href='#'>
            <span className='headline_text_1'>{ad.headline1}</span>
            <span className={`headline_text_2 ${!_.isEmpty(ad.headline2) ? 'pipe' : ''}`}>
              {ad.headline2}
            </span>
            <span className={`headline_text_3 ${!_.isEmpty(ad.headline3) ? 'pipe' : ''}`}>
              {ad.headline3}
            </span>
          </a>
        </div>
        <div className='display-url'>
          <i className='fa fa-ad' /> <span className='display-url_text'>{ad.displayUrl}</span>
        </div>
        <div className='description'>
          <span className='description__block_1'>{ad.description1}</span>
          <span className={`description__block_2 ${!_.isEmpty(ad.description2) ? 'pipe' : ''}`}>
            {ad.description2}
          </span>
        </div>
      </div>
    )
  }
}
