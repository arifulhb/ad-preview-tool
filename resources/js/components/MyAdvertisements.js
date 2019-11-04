import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import api from '../utils/api'
import _ from 'lodash'

export default class MyAdvertisements extends Component {
  constructor (props) {
    super(props)
    this.state = {
      advertisements: null,
      pagination: null
    }
  }

  componentDidMount () {
    api.get(`advertise/index`)
      .then(res => {
        this.setState({
          advertisements: _.values(res.data.data),
          pagination: res.data.pagination
        })
      })
  }

  renderTableRow () {
    if (!_.isNull(this.state.advertisements)) {
      return (
        <tbody>
          {
            this.state.advertisements.map((row) => {
              return (
                <tr key={`tr_${row.id}`}>
                  <td>{row.id}</td>
                  <td>{row.advertisement.publisher !== null ? row.advertisement.publisher.name : ''}</td>
                  <td>{row.advertisementType}</td>
                  <td>{row.title}</td>
                </tr>
              )
            })
          }
        </tbody>
      )
    } else {
      return (
        <tbody>
          <tr><td colSpan='4'>No record found</td></tr>
        </tbody>
      )
    }
  }

  render () {
    return (
      <div className='card border-light mb-3'>
        <div className='card-header'>{this.props.title}</div>
        <div className='card-body p-0'>
          <table className='table table-bordered table-sm table-hover'>
            <thead className='bg-light'>
              <tr>
                <th>Id</th>
                <th>Publisher</th>
                <th>Type</th>
                <th>Title</th>
              </tr>
            </thead>
            {this.renderTableRow()}
          </table>
        </div>
      </div>
    )
  }
}

if (document.getElementById('my-advertisements')) {
  const el = document.getElementById('my-advertisements')
  const props = Object.assign({}, el.dataset)
  ReactDOM.render(<MyAdvertisements {...props} />,
    document.getElementById('my-advertisements')
  )
}
