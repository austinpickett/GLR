import React, { Component } from 'react'
import { render } from 'react-dom'
import styled from 'styled-components'
import serialize from 'form-serialize'
import Results from './results'

export default class Filters extends Component {
    constructor(props) {
        super(props)

        this.state = {
            results: []
        }

        this.handleSubmit = this.handleSubmit.bind(this)
    }

    handleSubmit(e) {
        e.preventDefault();
        let formData = serialize(e.target, { hash: true })

        fetch(`http://localhost:8000/wp/wp-json/wp/v2/posts?search=${formData.s}&_embed`)
        .then(response => {
            if (response.ok) {
                return Promise.resolve(response);
            } else {
                return Promise.reject(new Error('Failed to load')); 
            }
        })
        .then(response => {
            return response.json()
        })
        .then(results => {
            this.setState({ results })
        })
    }

    render() {
        return (
        <div>
        <form className="filters" action="/" onSubmit={this.handleSubmit}>
            <div className="wrapper">	
                <select>
                    <option>Sort By All</option>
                </select>
                <select>
                    <option>Sort By All</option>
                </select>
                <input type="text" id="search" className="search" name="s" />
            </div>
        </form>
        <Results results={this.state.results} />
        </div>
        )
    }
}

let $filter
if ($filter = document.getElementById('filters'))
    render(<Filters />, $filter)