import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import GoogleTextAd from './GoogleTextAd'
import GoogleTextAdForm from './GoogleTextAdForm'
import api from '../utils/api'
import _ from 'lodash'

export default class EditAdvertisement extends Component {
  constructor (props) {
    super(props)

    this.state = {
      advertisement: null,
      message: ''
    }
    this.getAdvertisementData(props.id)
    this.handleSave.bind(this)
    this.markPublish.bind(this)
    this.formUpdated.bind(this)
  }

  renderGoogleTextAd (ad) {
    if (ad !== null) {
      return <GoogleTextAd ad={ad.advertisement} />
    }
  }

  getAdvertisementData (id) {
    api.get(`/advertise/${id}`).then((res) => {
      this.setState({ advertisement: res.data }, () => {
      })
    }).catch((error) => {
      console.log('getAdvertisementData::error ', error)
    })
  }

  /**
   * Send data to api for saving
   */
  handleSave = () => {
    const ad = this.state.advertisement.advertisement;
    let prepareData = {
      headline_1: ad.headline1,
      headline_2: ad.headline2,
      headline_3: ad.headline3,
      description_1: ad.description1,
      description_2: ad.description2,
      display_url: ad.displayUrl,
      title: ad.title,
      type: 'GoogleTextAd'
    }

    this.setState({
      message: 'Saving data'
    })

    api.post(`/advertise/update/${this.state.advertisement.id}`, prepareData)
      .then((response) => {
        console.log(response);
        this.setState({
          message: 'Saved Successfully!!'
        })

        setTimeout(()=> {
          this.setState({
            message: ''
          })
        }, 2000)
      })
      .catch((error) => {
        console.log('Update Error',error);
      });
  }

  /**
   * Send isPublished status to api for status change
   */
  markPublish = (data) => {
    // let prepareData = this.state.advertisement.advertisement;
    // console.log('mark publish: ', prepareData)
    // todo save the publish data
  }

  formUpdated = (data) => {
    let adv = {...this.state.advertisement}
    adv.advertisement[data.name]=data.value

    this.setState({advertisement: adv}, () => {
      this.renderGoogleTextAd(this.state.advertisement)
    })
  }

  render () {
    const advertise = this.state.advertisement
    return (
      <div className='row mb-4 mt-5'>
        <div className='col-lg-6'>
          <div key='preview-wrapper' className='preview-wrapper'>
            <p><strong>Preview</strong></p>
            {this.renderGoogleTextAd(this.state.advertisement)}
          </div>
        </div>
        <div className='col-lg-6'>
          <div className='row'>
            <div className='col-lg-6 text-left'>
              <strong>Edit Panel: </strong>
              {
                this.state.advertisement !== null
                  ? <label className='badge badge-success'>{advertise.advertisementType}</label>
                  : ''
              }
            </div>
            <div className='col-lg-6 text-right'>
              <span className={`${this.state.message !== '' ? 'badge badge-success' : ''}`}>
                {this.state.message}
              </span>
            </div>
          </div>
          <div key='form-wrapper' className='form-wrapper'>
            {
              this.state.advertisement !== null
                ? <GoogleTextAdForm
                    submitToEdit={this.formUpdated}
                    submitToPublish={this.markPublish}
                    submitToSave={this.handleSave}
                    ad={advertise.advertisement}
                  />
                : 'No records found to edit'
            }
          </div>
        </div>
      </div>
    )
  }
}

if (document.getElementById('edit-advertisement')) {
  const el = document.getElementById('edit-advertisement')
  const props = Object.assign({}, el.dataset)
  ReactDOM.render(<EditAdvertisement {...props} />,
    document.getElementById('edit-advertisement')
  )
}
