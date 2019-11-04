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
    api.get('advertise/index')
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

  renderPaginationPageItems (pagination) {
    if (pagination.total >= pagination.count) {
      // pagination logic taken from https://stackoverflow.com/a/11274294
      let startPage = pagination.current_page - 1
      let endPage = pagination.current_page + 1
      const pages = []

      if (startPage <= 0) {
        console.log('here')
        endPage -= (startPage - 1)
        startPage = 1
      }
      if (endPage > pagination.total_pages) {
        endPage = pagination.total_pages
      }

      for (let i = startPage; i <= endPage; i++) {
        pages.push(i)
      }

      return (
        <>
          {
            pages.map((p) => {
              return (
                <li key={`page_${p}`} className='pagination__body--item page-item'>
                  <a className='page-link pagination__body--item' href='#'>{p}</a>
                </li>
              )
            })
          }
        </>
      )
    }
  }

  renderPagination () {
    console.log(this.state.pagination)
    const pagination = this.state.pagination
    if (!_.isNull(this.state.pagination)) {
      return (
        <nav aria-label='navigation pagination'>
          <ul className='pagination__body pagination m-2'>
            <li className={`pagination__body--item page-item ${pagination.current_page === 1 ? 'disabled' : ''}`}>
              <a className='page-link pagination__body--item' href='#'>Previous</a>
            </li>
            {this.renderPaginationPageItems(pagination)}
            <li className={`pagination__body--item page-item ${pagination.total_pages <= pagination.current_page ? 'disabled' : ''}`}>
              <a className='page-link pagination__body--item' href='#'>Next</a>
            </li>
          </ul>
        </nav>
      )
    }
  }

  render () {
    return (
      <div className='card border-light mb-3'>
        <div className='card-header bg-dark text-white'>{this.props.title}</div>
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
        <div className='card-footer p-0'>
          {this.renderPagination()}
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
