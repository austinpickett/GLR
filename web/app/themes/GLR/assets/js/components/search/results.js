import React, { PureComponent } from 'react'
import Post from './post'

const Results = props => 
    <div className="the-posts row wrapper news">
        <div className="articles">
            {props.results.map(x => {
                return <Post data={x} key={Math.random()} />
            })}
        </div>
    </div>

export default Results