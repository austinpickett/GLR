import Post from './post'

export default ({ results }) => (
  <div className="the-posts row wrapper news">
      <div className="articles">
          {results.map(x => {
              return <Post data={x} key={Math.random()} />
          })}
      </div>
  </div>
)
