import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import api from '../../utils/api'
import _ from 'lodash'

export default class MyAdvertisements extends Component {
  constructor (props) {
    super(props)
    this.state = {
      advertisements: null,
      pagination: null,
      page: 1
    }

    // this.handleDelete.bind(this)
  }

  componentDidMount () {
    this.getAdvertisements(this.state.page)
  }

  /**
   * Get Advertisement data from api
   *
   * @param int page
   */
  getAdvertisements (page) {
    api.get(`advertise/index?page=${page}`)
      .then(res => {
        this.setState({
          advertisements: _.values(res.data.data),
          pagination: res.data.pagination
        })
      })
      .catch((error) => {
        console.log('error: ', error)
      })
  }

  /**
   * Set Page state
   *
  */
  setPageNumber (page) {
    this.setState({
      page: page
    }, () => {
      this.getAdvertisements(this.state.page)
    })
  }

  /**
   *  Will be used in table
   * @param bool isPublished
   */
  renderPublished (isPublished) {
    if (isPublished === true) {
      return (
        <label className='badge badge-success p-1'><i className='fa fa-check' /> Published</label>
      )
    } else {
      return (
        <label className='badge badge-warning p-1'><i className='fa fa-edit' /> Draft</label>
      )
    }
  }

  /**
   * Delete Advertise
   * @param int id
   */
  handleDelete (id) {
    const answer = window.confirm('Are you sure to delete this item?')

    if (answer) {
      api.delete(`/advertise/${id}`, {})
        .then((response) => {
          if (response.status === 204) {
            // reset the table
            this.getAdvertisements(1)
          }
        })
        .catch((error) => {
          console.log('del err ', error)
        })
    }
  }

  renderShareButton (isPublished, id) {
    if (isPublished) {
      return (
        <button className='btn btn-link' onClick=''>
          <i className='fa fa-share' />&nbsp;Add to Share
        </button>
      )
    }
  }

  /**
   * Generate Table Row
   */
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
                  <td>{row.advertisement.title}</td>
                  <td>{this.renderPublished(row.isPublished)}</td>
                  <td>{row.lastUpdate}</td>
                  <td className='text-right'>
                    <div className='btn-group btn-group-sm' role='group'>
                      {this.renderShareButton(row.isPublished, row.id)}
                      <a
                        className='btn btn-link'
                        target='_blank'
                        rel='noopener noreferrer'
                        href={`/advertise/preview?ids=${row.id}`}
                      > Preview
                      </a>
                      <div className='btn-group btn-group-sm' role='group'>
                        <button
                          id='btnGroupDrop1'
                          type='button'
                          className='btn btn-default dropdown-toggle'
                          data-toggle='dropdown'
                          aria-haspopup='true'
                          aria-expanded='false'
                        >
                          Action
                        </button>
                        <div className='dropdown-menu' aria-labelledby='btnGroupDrop1'>
                          <a className='dropdown-item' href={`/advertise/edit/${row.id}`}>
                            <i className='fa fa-edit' /> Edit
                          </a>
                          <a
                            className='dropdown-item'
                            href='#'
                            onClick={() => this.handleDelete(row.id)}
                          >
                            <i className='fa fa-trash' /> Delete
                          </a>
                        </div>
                      </div>
                    </div>
                  </td>
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

  /**
   * Pagination page list items
   *
   * @param Object pagination
   */
  renderPaginationPageItems (pagination) {
    if (pagination.total >= pagination.count) {
      // pagination logic taken from https://stackoverflow.com/a/11274294
      let startPage = pagination.current_page - 1
      let endPage = pagination.current_page + 1
      const pages = []

      if (startPage <= 0) {
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
                  <a
                    onClick={this.setPageNumber.bind(this, p)}
                    className={`page-link pagination__body--item ${p === this.state.page ? 'bg-dark text-white' : ''}`}
                    href='#'
                  >{p}
                  </a>
                </li>
              )
            })
          }
        </>
      )
    }
  }

  /**
   * Generate Pagination Item
   */
  renderPagination () {
    const pagination = this.state.pagination
    if (!_.isNull(this.state.pagination)) {
      return (
        <nav aria-label='navigation pagination'>
          <ul className='pagination__body pagination m-2'>
            <li className={`pagination__body--item page-item ${pagination.current_page === 1 ? 'disabled' : ''}`}>
              <a
                onClick={this.setPageNumber.bind(this, 1)}
                className='page-link pagination__body--item'
                href='#'
              >
                First
              </a>
            </li>
            {this.renderPaginationPageItems(pagination)}
            <li className={`pagination__body--item page-item ${pagination.total_pages <= pagination.current_page ? 'disabled' : ''}`}>
              <a
                onClick={this.setPageNumber.bind(this, this.state.pagination.total_pages)}
                className='page-link pagination__body--item'
                href='#'
              >
                Last
              </a>
            </li>
          </ul>
        </nav>
      )
    }
  }

  render () {
    return (
      <div className='card border-light mb-3'>
        <div className='card-header bg-dark text-white'>{this.props.title}&nbsp;<span className='text-muted'>Total</span>&nbsp;
          {
            !_.isNull(this.state.pagination)
              ? <span className='badge badge-info'> {this.state.pagination.total} </span>
              : 0
          }
        </div>
        <div className='card-body p-0'>
          <table className='table table-bordered table-sm table-hover'>
            <thead className='bg-light'>
              <tr>
                <th width='2%'>Id</th>
                <th width='6%'>Publisher</th>
                <th width='6%'>Type</th>
                <th width='15%'>Title</th>
                <th width='5%'>Status</th>
                <th width='8%'>Last Update</th>
                <th width='5%'>...</th>
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
