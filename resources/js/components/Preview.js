import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import GoogleTextAd from './GoogleTextAd'

import api from '../utils/api'
import _ from 'lodash'

export default class Preview extends Component {
  constructor (props) {
    super(props)
    this.state = {
      advertisements: null
    }
  }

  componentDidMount () {
    const ids = this.props.ids.split(',')
    // get data from api in array and load the GoogleTextad in loop

    api.post('preview', { ids: ids })
      .then((response) => {
        const advs = _.values(response.data.data)
        this.setState({ advertisements: advs })
      })
      .catch((error) => {
        console.log('errors: ', error)
      })
  }

  /**
   * Render list of Google Ads
   * @param ads
   */
  renderAds (ads) {
    return (
      ads.map((item, key) => {
        return <GoogleTextAd key={`google-text-ad-${key}`} ad={item.advertisement} />
      })
    )
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
        {
          !_.isNull(this.state.advertisements) ? this.renderAds(this.state.advertisements) : ''
        }
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
